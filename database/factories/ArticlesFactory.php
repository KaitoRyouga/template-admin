<?php

namespace Database\Factories;

use App\Models\Articles;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        $slug = Str::slug($name);

        $image = $this->faker->image('public/storage/images/articles/', 400, 400, null, false);
        Storage::copy('images/articles/' . $image, '/images/articles/thumb/' . $image);

        return [
            'title' => $name,
            'slug'=> $slug,
            'keywords' => $name,
            'content' => $this->faker->paragraph,
            'view' => $this->faker->randomDigit,
            'image' => $image,
            'image_url' => "/storage/images/articles/" . $image,
        ];
    }
}
