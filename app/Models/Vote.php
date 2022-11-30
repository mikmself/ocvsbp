<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $id = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'candidate_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function candidate(){
        return $this->belongsTo(Candidate::class,'candidate_id');
    }
}
