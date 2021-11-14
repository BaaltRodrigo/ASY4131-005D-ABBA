<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) {
        // Try credentials
        if(!auth()->attempt(request(['username', 'password']))) {
            return response(['message' => 'Unauthorized'], 401);
        }

        // Credentials OK
        $user = auth()->user();
        $newToken = $user->createToken('access_token')->plainTextToken;

        // Create cookie token
        $cookie = cookie('jwt', $newToken, 60 * 24); // Token last a day

        return response(['message' => 'Success'])
            ->withCookie($cookie);
    }

    public function me(Request $request) {
        return auth()->user();
    }
}
