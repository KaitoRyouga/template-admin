<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'discount',
        'quantity',
        'min',
        'max',
        'is_child',
        'parent_product_id',
        'image',
        'image_url',
        'category_id'
    ];

    protected $table = "products";

    public function parent() {
        return $this->belongsTo(Parent_product::class, 'parent_product_id');
    }
}
