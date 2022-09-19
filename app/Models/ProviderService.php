<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderService extends Model
{
    use HasFactory;



    protected $fillable = ["provider_id", "icon", "title", "description", "metatags", "status"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
