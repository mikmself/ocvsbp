<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserEmployeeSeeder extends Seeder
{
    public function run()
    {
        $iduser = Str::uuid();
        User::create([
            'id' => $iduser,
            'name' => 'Sukirman Sujatmiko',
            'email' => 'sukirman@gmail.com',
            'password' => Hash::make('employee123'),
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
        Employee::create([
            'id' => Str::uuid(),
            'user_id' => $iduser,
            'session_id' => '4',
            'name' => 'Sukirman Sujatmiko',
            'nip' => '872983782938789387',
            'division' => 'Kurikulum',
        ]);
    }
}
