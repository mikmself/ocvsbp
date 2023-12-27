<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(){
        $this->call([
            SessionSeeder::class,
            // UserStudentSeeder::class,
            // UserEmployeeSeeder::class,
            CandidateSeeder::class,
            UserSeeder::class
        ]);
    }
}
