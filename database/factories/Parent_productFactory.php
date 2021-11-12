<?php

namespace Database\Factories;

use App\Models\Parent_product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class Parent_productFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parent_product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = $this->faker->image('public/storage/images/parent_product/', 400, 400, null, false);
        Storage::copy('images/parent_product/' . $image, '/images/parent_product/thumb/' . $image);

        return [
            'name' => $this->faker->name,
            'image' => $image,
            'image_url' => "/storage/images/parent_product/" . $image,
            'category_id' => 1
        ];
    }
}
