<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceToken;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request) {
        return Course::all();
    }

    public function show(Request $request) {
        $course = Course::findOrFail($request->course);
        // Agregar aca los tokens de asistencia
        $course->attendance_tokens;
        return $course;
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
