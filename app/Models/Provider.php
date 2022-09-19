<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;



    protected $fillable = [
        'slug', 'name', 'image', 'status', 'description', 'caption', 'setup_caption', 'setup_steps', 'slug', 'metatags'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
