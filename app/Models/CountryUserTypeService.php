<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryUserTypeService extends Model
{
    use HasFactory;



    protected $fillable = ["country_id", "slug", "usertype_id", "icon", "name", "description", "caption", "caption_image", "setup_caption", "setup_steps", "providers", "metatags", "status"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
