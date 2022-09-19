<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryProvider extends Model
{
    use HasFactory;



    protected $fillable = [
        'id',
        'country_id',
        'name', 'description', 'caption', 'caption_image', 'image', 'status', 'setup_caption', 'setup_steps', 'slug', 'metatags'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
