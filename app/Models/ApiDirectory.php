<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiDirectory extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'base_url',
        'category',
        'is_public',
    ];
}
