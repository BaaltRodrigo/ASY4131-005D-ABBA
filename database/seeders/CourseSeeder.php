<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['id' => 'PGY4121', 'nombre' => 'Programacion de aplicaciones Mobiles']);
        Course::create(['id' => 'MAT4140', 'nombre' => 'Estadistica Descriptiva']);
        Course::create(['id' => 'CSY4111', 'nombre' => 'Calidad de Software']);
    }
}
