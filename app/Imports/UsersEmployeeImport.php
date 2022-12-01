<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Throwable;

class UsersEmployeeImport implements ToCollection, WithHeadingRow, SkipsOnError
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
                'password' => Str::random(10),
                'is_voted' => 'false'
            ]);
            Employee::create([
                'id' => Str::uuid(),
                'user_id' => $userId,
                'session_id' => $row['session_id'],
                'name' => $name,
                'nip' => $row['nip'],
                'division' => $row['division']
            ]);
        }
        return true;
    }
    public function onError(Throwable $e)
    {
        return false;
    }
}
