<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $id = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'vision',
        'mission',
        'motto',
        'photo'
    ];

    public function vote(){
        $this->hasMany(Vote::class,'candidate_id');
    }
}
