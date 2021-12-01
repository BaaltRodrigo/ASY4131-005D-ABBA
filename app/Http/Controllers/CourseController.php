<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceToken;
use App\Models\Course;
use App\Http\Resources\CourseResource;
use App\Http\Resources\CourseShortCollection;
use App\Http\Resources\CourseShortResource;

class CourseController extends Controller
{
    public function index(Request $request) {
        return new CourseShortCollection(Course::all());
    }

    public function show(Request $request) {
        CourseResource::withoutWrapping();
        $course = Course::findOrFail($request->course);
        // Agregar aca los tokens de asistencia
        return new CourseResource($course);
    }

    public function attendances(Request $request) {
        $course = Course::findOrFail($request->course);
        return $course->attendance_tokens()->get();
    }

    public function createAttendance(Request $request) {
        $course = Course::findOrFail($request->course);
        $attendance_token = AttendanceToken::create(['course_id' => $course->id]);
        return $attendance_token;
    }
}
