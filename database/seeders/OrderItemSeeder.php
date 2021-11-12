<?php

namespace Database\Seeders;

use App\Models\Order_item;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order_item::factory()->count(10)->create();

        $orders = Orders::all();

        foreach ($orders as $keyOrder => $valueOrder) {

            $product = Products::all();
            $flag = 0;
            $total = 0;

            if ($valueOrder->order_item()->count() != 0) {

                foreach ($product as $keyProduct => $valueProduct) {

                    $priority = $product->count() - $valueOrder->order_item()->count();
                    $min_random_priority = rand(0, $priority - 1);

                    if ($keyProduct >= $min_random_priority && $flag < $valueOrder->order_item()->count()) {

                        do {
                            $quantity = rand(1, 100);
                        } while ($quantity > $valueProduct->quantity);

                        $price =  $quantity * $valueProduct->price;
                        $total +=  $quantity * $valueProduct->price;

                        $valueOrder->order_item[$flag]->quantity = $quantity;
                        $valueOrder->order_item[$flag]->total = $price;
                        $valueOrder->order_item[$flag]->product_id = $keyProduct + 1;

                        $valueOrder->order_item[$flag]->save();
                        $flag++;
                    }
                }

                $valueOrder->total = $total;
                $valueOrder->save();
                $total = 0;
            } else {
                $valueOrder->delete();
            }
        }
    }
}
