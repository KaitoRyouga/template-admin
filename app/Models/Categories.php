<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $table = "categories";

    public function products()
    {
       return $this->hasMany(Products::class, 'category_id', 'id');
    }

    public function parent_product()
    {
       return $this->hasMany(Parent_product::class, 'category_id', 'id');
    }
}
