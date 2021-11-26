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
        $newToken = $user->createToken('token')->plainTextToken;

        // Create cookie token
        $cookie = cookie('jwt', $newToken, 60 * 24); // Token last a day

        return response([
                'message' => 'Success',
                'access_token' => $newToken
            ])->withCookie($cookie);
    }

    public function me(Request $request) {
        return auth()->user();
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'Success']);
    }
}
