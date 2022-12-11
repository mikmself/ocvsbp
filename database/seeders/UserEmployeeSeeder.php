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
        $firstNip = 872873878273847231;
        for ($i=1; $i <= 50; $i++) {
            $iduser = Str::uuid();
            User::create([
                'id' => $iduser,
                'name' => 'Example Employee ' . $i,
                'email' => 'exampleemployee' .$i. '@gmail.com',
                'password' => Hash::make('employee123'),
                'is_voted' => 'false',
                'remember_token' => Str::random(100)
            ]);
            Employee::create([
                'id' => Str::uuid(),
                'user_id' => $iduser,
                'session_id' => '4',
                'name' => 'Example Employee ' . $i,
                'nip' => $firstNip+$i,
                'division' => 'Kurikulum',
            ]);
        }
    }
}
