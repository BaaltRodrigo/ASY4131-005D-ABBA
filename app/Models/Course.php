<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre'
    ];

    public $incrementing = false;

    public function attendance_tokens() {
        return $this->hasMany(AttendanceToken::class);
    }
}
