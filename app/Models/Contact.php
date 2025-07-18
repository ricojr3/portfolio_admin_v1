<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'value',
        'is_visible',
        'order'
    ];
    
    protected $casts = [
        'is_visible' => 'boolean',
    ];
    
    // Get visible contacts
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
    
    // Get contact type label
    public function getTypeLabel()
    {
        return ucfirst($this->type);
    }
}