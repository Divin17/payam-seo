<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryProviderUserTypeService extends Model
{
    use HasFactory;

    protected $fillable = [
        "country_id", "usertype_id", "provider_id", "slug", "icon", "name", "description", "metatags", "caption", "caption_image", "setup_caption", "setup_steps", "status"
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
