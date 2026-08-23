<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolio Laravel',
            'slug' => 'portfolio-laravel',
            'description' => 'Website portfolio personal menggunakan Laravel 13 dan Supabase.',
            'image' => null,
            'github_url' => null,
            'demo_url' => null,
            'featured' => true,
        ]);

        Project::create([
            'title' => 'Sistem Informasi Sekolah',
            'slug' => 'sistem-informasi-sekolah',
            'description' => 'Sistem informasi sekolah dengan fitur pengelolaan data.',
            'image' => null,
            'github_url' => null,
            'demo_url' => null,
            'featured' => false,
        ]);
    }
}