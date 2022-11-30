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
        return $this->hasMany(Employee::class,'session_id');
    }
    public function student(){
        return $this->hasMany(Student::class,'session_id');
    }
}
