<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryProviderUserType extends Model
{
    use HasFactory;



    protected $fillable = ["country_id", "provider_id", "slug", 'name', 'caption', 'caption_image', 'description', 'icon', 'status', 'setup_caption', 'setup_steps', 'metatags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
