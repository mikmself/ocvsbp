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
        $firstNis = 18000;
        $firstNisn = 8727583748;
        for ($i=1; $i <= 200; $i++) {
            $iduser = Str::uuid();
            User::create([
                'id' => $iduser,
                'name' => 'Example Student ' . $i,
                'email' => 'examplestudent' .$i. '@gmail.com',
                'password' => Hash::make('student123'),
                'is_voted' => 'false',
                'remember_token' => Str::random(100)
            ]);
            Student::create([
                'id' => Str::uuid(),
                'user_id' => $iduser,
                'session_id' => rand(1,3),
                'name' => 'Example Student ' . $i,
                'nis' => $firstNis+$i,
                'nisn' => $firstNisn+$i,
            ]);
        }
    }
}
