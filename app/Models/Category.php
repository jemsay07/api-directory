<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
        'parent_id',
        'icon',
        'color',
        'sort_order',
    ];
    
    // public function apis(){
    //     return $this->hasMany(ApiDirectory::class);
    // }

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function scopeActive($query){
        return $query->where('is_active', true);
    }

}
