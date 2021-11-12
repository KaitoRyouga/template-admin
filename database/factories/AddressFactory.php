<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'country' => "001",
            'district' => "001",
            'province' => "001",
            'ward' => "001",
            'companyName' => $this->faker->company,
            'zipCode' => "700000",
            'address' => $this->faker->address,
            'apartment' => $this->faker->numberBetween(1, 100)
        ];
    }
}
