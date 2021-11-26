<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function index(Request $request) {
        return User::all();
    }

    public function show(User $user) {
        return $user;
    }

    public function store(StoreUserRequest $request) {
        $securePassword = Hash::make($request->password);
        $user = User::create([
            'id' => $request->id,
            'username' => $request->username,
            'password' => $securePassword,
        ]);
        return $user;
    }

    public function delete(User $user) {
        $user->delete();
        return response()->json(['message' => 'Deleted'], 200);
    }
}
