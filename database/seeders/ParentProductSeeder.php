<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Parent_product;
use App\Models\Products;
use Illuminate\Database\Seeder;

class ParentProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Parent_product::factory()->count(3)->create();

        $child_product = Products::where("is_child", 1)->get();
        
        foreach ($child_product as $key => $value) {

            $value->parent_product_id = Parent_product::all()->random()->id;
            $value->category_id = Categories::all()->random()->id;
            $value->save();
        }
    }
}
