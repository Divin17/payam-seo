<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryUserTypeProviderServiceStp extends Model
{
    use HasFactory;

    protected $fillable = ["country_id", "usertype_id", "service_id", "provider_id", "slug", "image", "title", "description", "status"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
