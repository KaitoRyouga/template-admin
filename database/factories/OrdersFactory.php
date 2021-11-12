<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrdersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Orders::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'address_id' => Address::all()->random()->id,
            'total' => 0,
            'link' => '/',
            'note' => $this->faker->paragraph,
            'phoneNumber' => $this->faker->phoneNumber,
        ];
    }
}
