<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'image'
    ];
    
    // Get the active/latest hero
    public static function getActive()
    {
        return self::latest()->first();
    }
}