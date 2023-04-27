<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\PasswordResetRequest;
use App\Http\Requests\Auth\PasswordVerifyRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Mail\EmailVerification;
use App\Mail\PasswordResetMail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class AuthController extends Controller
{

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $payload = Crypt::encrypt([
            'user' => UserResource::make($user),
            'token' => $user->createToken($request->userAgent())->plainTextToken,
            'verified' => true,
        ]);

        $message = (new EmailVerification($user->email, $user->name, $payload));

        Mail::queue($message);

        return Response::json(["message" => "registered"], 200);
    }

    public function verify(Request $request): JsonResponse {
        try {
            $payload = Json::decode($request->getContent());
            $payload = Crypt::decrypt($payload->payload);

            if (!$payload['verified']) {
                return Response::json(['message' => 'Bad Payload'], 400);
            }

            $user = User::where('email', $payload['user']['email'])->first();
            $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();

            return Response::json([
                'user' => $payload['user'],
                'token' => $payload['token'],
            ], 200);
        }catch (JsonException $jsonException){
            return Response::json(['message' => 'Bad Payload'], 400);
        }
    }

    public function passwordReset(PasswordResetRequest $request): JsonResponse
    {
        $email = $request->input('email');
        $user = User::where('email', $email)->first();
        $token = $user->createToken($request->userAgent())->plainTextToken;

        $passwordReset = new PasswordReset();
        $passwordReset->email = $email;
        $passwordReset->token = $token;
        $passwordReset->created_at = new \DateTime('now');
        $passwordReset->save();

        $payload = Crypt::encrypt([
            'token' => $token,
        ]);

        $message = (new PasswordResetMail($email, $payload));

        Mail::queue($message);

        return Response::json(['message' => 'email_sent'], 200);
    }

    public function passwordVerify(PasswordVerifyRequest $request): JsonResponse
    {
        try {
            $payload = Crypt::decrypt($request->input('payload'));
            $password = $request->input('password');
            $passwordReset = PasswordReset::where('token', $payload['token'])->first();

            if (!$passwordReset) {
                return Response::json(['message' => 'bad_payload'], 400);
            }

            $user = User::where('email', $passwordReset->email)->first();
            $user->password = bcrypt($password);
            $user->save();

            $passwordReset->delete();

            return Response::json(['message' => 'password_reset'], 200);
        }catch (DecryptException $e){
            return Response::json(['message' => 'bad_payload'], 400);
        }
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if($request->input('email')){
            $user = User::whereEmail($request->input('email'))->first();
        }else{
            $user = User::whereName($request->input('name'))->first();
        }

        if(!$user) return Response::json(["message" => "Could not find User."], 404);

        if(Hash::check($request->input('password'), $user->password)){
            return Response::json([
                'user' => UserResource::make($user),
                'token' => $user->createToken($request->userAgent())->plainTextToken,
            ], 200);
        }else return Response::json(["message" => "Wrong User or Password."],422);
    }

    public function logout(Request $request): void
    {
        $request->user()->tokens()->delete();
    }

}
