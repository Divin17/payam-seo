<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'name', 'description', 'icon', 'status', 'caption', 'caption_image', 'setup_caption', 'setup_steps', 'metatags'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
