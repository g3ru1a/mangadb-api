<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{

    public function register(RegisterRequest $request): array
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return [
            'user' => UserResource::make($user),
            'token' => $user->createToken($request->userAgent())->plainTextToken,
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
