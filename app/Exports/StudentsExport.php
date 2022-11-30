<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Student::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'ID User',
            'ID Session',
            'Name',
            'NIS',
            'NISN',
            'Created At',
            'Updated At'
        ];
    }
}
