<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'total'
    ];

    protected $table = "order_item";

    public function product() {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
