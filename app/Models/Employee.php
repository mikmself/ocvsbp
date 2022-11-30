<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $id = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'session_id',
        'name',
        'nip',
        'division'
    ];

    public function user(){
        $this->belongsTo(User::class,'user_id');
    }
    public function session(){
        $this->belongsTo(Session::class,'session_id');
    }
}
