<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderVp extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'provider_id', 'title', 'description', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
