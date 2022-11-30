<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CandidateSeeder extends Seeder
{
    public function run()
    {
        Candidate::create([
            'id' => Str::uuid(),
            'name' => 'Supardi Joko Kusumo',
            'vision' => 'apa aja yang penting visi',
            'mission' => 'apa aja yang penting misi',
            'motto' => 'apa aja yang penting motto',
            'photo' => '/candidate/photo.jpg',
        ]);
        Candidate::create([
            'id' => Str::uuid(),
            'name' => 'Sukoharjo Muhadi Sukarjo',
            'vision' => 'apa aja yang penting visi 2',
            'mission' => 'apa aja yang penting misi 2',
            'motto' => 'apa aja yang penting motto 2',
            'photo' => '/candidate/photo2.jpg',
        ]);
        Candidate::create([
            'id' => Str::uuid(),
            'name' => 'Supratyo Dikinosojo',
            'vision' => 'apa aja yang penting visi 3',
            'mission' => 'apa aja yang penting misi 3',
            'motto' => 'apa aja yang penting motto 3',
            'photo' => '/candidate/photo3.jpg',
        ]);
    }
}
