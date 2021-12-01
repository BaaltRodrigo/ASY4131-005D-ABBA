<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\AttendanceResource;

class AttendanceController extends Controller
{
    public function show(Request $request) {
        AttendaceResource::withoutWrapping();
        return new AttendanceResource($request->attendance);
    }
}
