<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
