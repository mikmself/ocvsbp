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
            'name' => 'Yoga Willy Utomo',
            'email' => 'yogawilly@gmail.com',
            'password' => Hash::make('employee123'),
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
        Employee::create([
            'id' => Str::uuid(),
            'user_id' => $iduser,
            'session_id' => '4',
            'name' => 'Yoga Willy Utomo',
            'nip' => '872983782938789387',
            'division' => 'Kurikulum',
        ]);

        $iduser2 = Str::uuid();
        User::create([
            'id' => $iduser2,
            'name' => 'Supardi Mangkunegara',
            'email' => 'sprdimngkngr@gmail.com',
            'password' => Hash::make('employee123'),
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
        Employee::create([
            'id' => Str::uuid(),
            'user_id' => $iduser2,
            'session_id' => '4',
            'name' => 'Supardi Mangkunegara',
            'nip' => '87298378783748839',
            'division' => 'Kesiswaan',
        ]);

        $iduser3 = Str::uuid();
        User::create([
            'id' => $iduser3,
            'name' => 'Minu Prosaja',
            'email' => 'minuprosaja@gmail.com',
            'password' => Hash::make('employee123'),
            'is_voted' => 'false',
            'remember_token' => Str::random(100)
        ]);
        Employee::create([
            'id' => Str::uuid(),
            'user_id' => $iduser3,
            'session_id' => '4',
            'name' => 'Minu Prosaja',
            'nip' => '87298373874879389',
            'division' => 'Kurikulum',
        ]);
    }
}
