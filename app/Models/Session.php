<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status'
    ];

    public function employee(){
        $this->hasMany(Employee::class,'session_id');
    }
    public function student(){
        $this->hasMany(Student::class,'session_id');
    }
}
