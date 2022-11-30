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
            'name' => 'Eko Susilo',
            'email' => 'ekosusilo@gmail.com',
            'password' => Hash::make('student123'),
            'is_voted' => 'false'
        ]);
        Student::create([
            'id' => Str::uuid(),
            'user_id' => $iduser,
            'session_id' => '3',
            'name' => 'Eko Susilo',
            'nis' => '18057',
            'nisn' => '8716728723',
        ]);

        $iduser2 = Str::uuid();
        User::create([
            'id' => $iduser2,
            'name' => 'Didi Prasetyo',
            'email' => 'didiprasetyo@gmail.com',
            'password' => Hash::make('student123'),
            'is_voted' => 'false'
        ]);
        Student::create([
            'id' => Str::uuid(),
            'user_id' => $iduser2,
            'session_id' => '2',
            'name' => 'Didi Prasetyo',
            'nis' => '18058',
            'nisn' => '2767638948',
        ]);

        $iduser3 = Str::uuid();
        User::create([
            'id' => $iduser3,
            'name' => 'Amar Al-Farizi',
            'email' => 'amaralfarizi@gmail.com',
            'password' => Hash::make('student123'),
            'is_voted' => 'false'
        ]);
        Student::create([
            'id' => Str::uuid(),
            'user_id' => $iduser3,
            'session_id' => '1',
            'name' => 'Amar Al-Farizi',
            'nis' => '18059',
            'nisn' => '2874929849',
        ]);
    }
}
