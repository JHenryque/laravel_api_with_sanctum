<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // validate request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        // login attempt
        $email = $request->input('email');
        $password = $request->input('password');
        $attempt = auth()->attempt([
            'email' => $email,
            'password' => $password
        ]);

        if (!$attempt) {
            return ApiResponse::unauthorized();
        }

        // authenticate user
        $user = auth()->user();

        // assume o tempo de expiraçao que está comfigurado no Sanctum
        $token = $user->createToken($user->name)->plainTextToken;

        // difinir o tempo de expiração para token
        $token = $user->createToken($user->name, ['*'], now()->addHour())->plainTextToken;

        // return the access token for the api requests
        return ApiResponse::success(
            [
                'user' => $user->name,
                'email' => $user->email,
                'token' => $token,
            ]
        );

    }

    public function logout(request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::success('Logout with success!');
    }
}
