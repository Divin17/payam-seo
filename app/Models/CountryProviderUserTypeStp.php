<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryProviderUserTypeStp extends Model
{
    use HasFactory;



    protected $fillable = ['id', 'country_id', 'provider_id', 'usertype_id', 'title', 'description', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
