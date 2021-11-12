<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'DỊCH VỤ QUẢNG CÁO, TĂNG TƯƠNG TÁC FACEBOOK'
        ]);

        Categories::create([
            'name' => 'DỊCH VỤ SÁNG TẠO, THIẾT KẾ NỘI DUNG'
        ]);
    }
}
