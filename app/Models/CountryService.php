<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryService extends Model
{
    use HasFactory;

    protected $fillable = ["slug", "country_id", "icon", "name", "description", 'caption', 'caption_image', 'setup_caption', 'setup_steps', "usertypes", "providers", "metatags", "status"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
