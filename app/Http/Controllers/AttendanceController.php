<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AttendanceResource;
use App\Models\AttendanceToken;

class AttendanceController extends Controller
{
    public function show(Request $request) {
        AttendanceResource::withoutWrapping();
        $attendance = AttendanceToken::findOrFail($request->attendance);
        return new AttendanceResource($attendance);
    }

    public function addUser(Request $request) {
        try {
            $attendance = AttendanceToken::findOrFail($request->attendance);
            
            $attendance->users()->attach([auth()->user()->id]);
            return response()->json([
                'message' => 'User attendance Created',
                'status' => 201
            ], 201);
        } catch(\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'User attendance already exists',
                'status' => 400
            ],400);
        }
    }
}
