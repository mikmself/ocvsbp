<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    public function run()
    {
        Session::create([
            'name' => 'Kelas X',
            'status' => 'off'
        ]);
        Session::create([
            'name' => 'Kelas XI',
            'status' => 'off'
        ]);
        Session::create([
            'name' => 'Kelas XII',
            'status' => 'off'
        ]);
        Session::create([
            'name' => 'Guru Dan Karyawan',
            'status' => 'off'
        ]);
    }
}
