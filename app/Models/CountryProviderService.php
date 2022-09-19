<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryProviderService extends Model
{
    use HasFactory;



    protected $fillable = ['id', 'slug', 'country_id', 'provider_id', 'icon', 'name', 'description', 'usertypes', 'status', 'caption', 'caption_image', 'setup_caption', 'setup_steps', 'metatags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
