<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'link',
        'note',
        'phone'
    ];

    protected $table = "orders";

    public function order_item() {
        return $this->hasMany(Order_item::class, 'order_id');
    }

    public static function total() {
        $data = Orders::all();
        $total = 0;
        foreach ($data as $key => $value) {
            $total += $value->total;
        }
        return $total;
    }
}
