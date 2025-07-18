<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'technologies',
        'url',
        'is_visible',
        'order'
    ];
    
    protected $casts = [
        'is_visible' => 'boolean',
    ];
    
    // Scope to get only visible projects
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
