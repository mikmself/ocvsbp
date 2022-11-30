<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'id' => Str::uuid(),
            'name' => 'Muhamad Irga Khoirul Mahfis',
            'email' => 'mikmself@gmail.com',
            'password' => Hash::make('superadmin123'),
            'level' => 'superadmin',
            'is_voted' => 'false'
        ]);
        User::create([
            'id' => Str::uuid(),
            'name' => 'Administrator Umum',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'level' => 'admin',
            'is_voted' => 'false'
        ]);
    }
}
