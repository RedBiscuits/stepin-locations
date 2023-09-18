<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken(env("AUTH_TOKEN_NAME"))->plainTextToken;


            return response([
                'success' => true,
                'message' => 'Login successful',
                'data' => [
                    'token' => $token,
                ],
                'errors' => null,
            ], 201);
        }

        throw ValidationException::withMessages([
            'email' => ['Email does not exist.'],
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response([
            'success' => true,
            'message' => 'Logged out successfully',
            'data' => null,
            'errors' => null,
        ], 200);
    }
}
