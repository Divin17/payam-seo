<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStp extends Model
{
    use HasFactory;



    protected $fillable = ['id', 'service_id', 'title', 'description', 'slug', 'image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
