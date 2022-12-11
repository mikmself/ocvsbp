<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VoteSeeder extends Seeder
{
    public function run()
    {
        $candidatesId = [];
        $candidates = Candidate::get();
        foreach ($candidates as $candidate) {
            $candidateId = $candidate->id;
            array_push($candidatesId,$candidateId);
        }

        $users = User::where('level','user')->get();
        $i = 1;
        foreach ($users as $user) {
            if($i == 151){
                break;
            }

            Vote::create([
                'id' => Str::uuid(),
                'user_id' => $user->id,
                'candidate_id' => collect($candidatesId)->random()
            ]);
            User::whereId($user->id)->update([
                'is_voted' => 'true'
            ]);

            $i++;
        }
    }
}
