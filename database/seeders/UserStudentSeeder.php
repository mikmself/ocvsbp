<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserStudentSeeder extends Seeder
{
    public function run()
    {
        $iduser = Str::uuid();
        User::create([
            'id' => $iduser,
            'name' => 'Dadang Mikarjo',
            'email' => 'dadang@gmail.com',
            'password' => Hash::make('student123'),
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
        Student::create([
            'id' => Str::uuid(),
            'user_id' => $iduser,
            'session_id' => '3',
            'name' => 'Dadang Mikarjo',
            'nis' => '18057',
            'nisn' => '8716728723',
        ]);
    }
}
