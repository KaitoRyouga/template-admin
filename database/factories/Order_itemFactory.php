<?php

namespace Database\Factories;

use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

class Order_itemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order_item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'order_id' => Orders::all()->random()->id,
            'product_id' => 1,
            'quantity' => 1,
            'total' => 1,
        ];

    }
}
