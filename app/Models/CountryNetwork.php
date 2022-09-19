<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryNetwork extends Model
{
    use HasFactory;



    protected $fillable = ["country_id", "slug", "name", "image", "caption", "caption_image", "setup_caption", "setup_steps", "metatags"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

