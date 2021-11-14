<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $securePassword = Hash::make('password');
        User::create(['id' => '19', 'username' => 'admin', 'password' => $securePassword]);
        User::create(['id' => '27', 'username' => 'admin2', 'password' => $securePassword]);
        User::create(['id' => '1K', 'username' => 'admin3', 'password' => $securePassword]);
    }
}
