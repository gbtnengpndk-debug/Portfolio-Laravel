<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        Skill::create([
            'name' => 'Laravel',
            'category' => 'Backend',
            'icon' => 'laravel',
        ]);

        Skill::create([
            'name' => 'PHP',
            'category' => 'Backend',
            'icon' => 'php',
        ]);

        Skill::create([
            'name' => 'HTML',
            'category' => 'Frontend',
            'icon' => 'html5',
        ]);

        Skill::create([
            'name' => 'CSS',
            'category' => 'Frontend',
            'icon' => 'css3',
        ]);

        Skill::create([
            'name' => 'JavaScript',
            'category' => 'Frontend',
            'icon' => 'javascript',
        ]);

        Skill::create([
            'name' => 'PostgreSQL',
            'category' => 'Database',
            'icon' => 'postgresql',
        ]);
    }
}