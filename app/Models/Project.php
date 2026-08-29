<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'github_url',
        'demo_url',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value, array $attributes) {
                $image = $attributes['image'] ?? null;

                if (!$image) {
                    return null;
                }

                // Gambar lama yang masih berada di public/
                if (str_starts_with($image, 'uploads/projects/')) {
                    return asset($image);
                }

                // Gambar baru dari Supabase Storage
return rtrim(config('filesystems.disks.s3.public_url'), '/') . '/' . ltrim($image, '/');
            },
        );
    }
}