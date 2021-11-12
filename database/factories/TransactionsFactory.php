<?php

namespace Database\Factories;

use App\Models\Transactions;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transactions::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'input' => $this->faker->numberBetween(10000, 100000),
            'phone' => $this->faker->phoneNumber,
            'details' => $this->faker->paragraph,
        ];
    }
}
