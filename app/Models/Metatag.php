<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'slug', 'title', 'description', 'keywords'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
