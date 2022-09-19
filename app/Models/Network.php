<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Network extends Model
{
    use HasFactory;

    protected $fillable = ["slug", "name", "image", "caption", "caption_image", "setup_caption", "setup_steps", "metatags"];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
