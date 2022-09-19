<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryUserType extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'country_id', 'name', 'caption', 'caption_image', 'description', 'icon', 'status', 'setup_caption', 'setup_steps', 'metatags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
