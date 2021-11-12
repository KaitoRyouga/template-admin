<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Products::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_discount = $this->faker->numberBetween(0, 1);
        $is_child = $this->faker->numberBetween(0, 1);

        if ($is_child == 0) {
            $image = $this->faker->image('public/storage/images/product/',400,400, null, false);
            Storage::copy('images/product/' . $image, 'images/product/thumb/' . $image);
        }

        return [
            'name' => $this->faker->name,
            'price' => $this->faker->numberBetween(10000, 100000),
            'category_id' =>  Categories::all()->random()->id,
            'discount' => $is_discount == 0 ? $this->faker->numberBetween(0, 100) : 0,
            'quantity' => $this->faker->numberBetween(10, 1000),
            'min' => $this->faker->numberBetween(0, 100),
            'max' => $this->faker->numberBetween(1000, 10000),
            'is_child' => $is_child,
            'image' => $is_child == 0 ? $image : "",
            'image_url' => $is_child == 0 ? "/storage/images/product/" . $image : "",
        ];
    }
}
