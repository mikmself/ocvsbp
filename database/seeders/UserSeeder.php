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
            'name' => 'Root User',
            'email' => 'root@gmail.com',
            'password' => Hash::make('root'),
            'level' => 'superadmin',
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
    }
}
