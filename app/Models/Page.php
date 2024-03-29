<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'slug', 'name', 'route', 'status'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
