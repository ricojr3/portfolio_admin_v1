<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'category',
        'proficiency',
        'is_visible',
        'order'
    ];
    
    protected $casts = [
        'is_visible' => 'boolean',
        'proficiency' => 'integer',
        'order' => 'integer'
    ];
    
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}