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
            'vision' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'mission' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'motto' => 'Hiduplah walau kamu tidak hidup',
            'photo' => '/candidate/photo.jpg',
        ]);
        Candidate::create([
            'id' => Str::uuid(),
            'name' => 'Sukoharjo Muhadi Sukarjo',
            'vision' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'mission' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'motto' => 'Hiduplah walau kamu tidak hidup',
            'photo' => '/candidate/photo2.jpg',
        ]);
        Candidate::create([
            'id' => Str::uuid(),
            'name' => 'Supratyo Dikinosojo',
            'vision' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'mission' => '<p>1. Mengembangkan sektor A</p><p>2. Mengembangkan sektor B</p><p>3. Mengembangkan sektor C</p><p>4. Mengembangkan sektor D</p>',
            'motto' => 'Hiduplah walau kamu tidak hidup',
            'photo' => '/candidate/photo3.jpg',
        ]);
    }
}
