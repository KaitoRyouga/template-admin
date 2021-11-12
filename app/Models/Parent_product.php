<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'image_url',
        'category_id'
    ];

    protected $table = "parent_product";

    public function product_child() {
        return $this->hasMany(Products::class, 'parent_product_id');
    }
}
