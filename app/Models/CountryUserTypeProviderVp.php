<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryUserTypeProviderVp extends Model
{
    use HasFactory;



    protected $fillable = ['id', 'country_id', 'usertype_id', 'provider_id', 'title', 'description', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
