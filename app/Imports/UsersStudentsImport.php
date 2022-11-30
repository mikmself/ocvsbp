<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Throwable;

class UsersStudentsImport implements ToCollection, WithHeadingRow, SkipsOnError
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $userId = Str::uuid();
            $name = $row['name'];
            User::create([
                'id' => $userId,
                'name' => $name,
                'email' => $row['email'],
                'password' => Hash::make($row['password']),
                'is_voted' => 'false'
            ]);
            Student::create([
                'id' => Str::uuid(),
                'user_id' => $userId,
                'session_id' => $row['session_id'],
                'name' => $name,
                'nis' => $row['nis'],
                'nisn' => $row['nisn']
            ]);
        }
        return true;
    }
    public function onError(Throwable $e)
    {
        return false;
    }
}
