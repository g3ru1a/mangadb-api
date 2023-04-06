<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Mail\EmailVerification;
use App\Models\User;
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

class AuthController extends Controller
{

    public function register(Request $request): array
    {
        if (User::where('email', $request->input('email'))->exists()) {
            return ['message' => 'user_exists'];
        }

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

        $message = (new EmailVerification($user->email, $payload));

        Mail::queue($message);

        return ["message" => "registered"];
    }

    public function verify(Request $request) {
        $payload = Json::decode($request->getContent());
        $payload = Crypt::decrypt($payload->payload);

        if (!$payload['verified']) {
            return [
                'message' => 'error'
            ];
        }

        $user = User::where('email', $payload['user']['email'])->first();
        $user->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
        $user->save();

        return [
            'user' => $payload['user'],
            'token' => $payload['token'],
        ];
    }

    public function login(LoginRequest $request): JsonResponse|array
    {
        if($request->input('email')){
            $user = User::whereEmail($request->input('email'))->first();
        }else{
            $user = User::whereName($request->input('name'))->first();
        }

        if(!$user) return Response::json(["message" => "Could not find User."], 404);

        if(Hash::check($request->input('password'), $user->password)){
            return [
                'user' => UserResource::make($user),
                'token' => $user->createToken($request->userAgent())->plainTextToken,
            ];
        }else return Response::json(["message" => "Wrong User or Password."],422);
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();
    }

}
