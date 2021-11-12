<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            PermissionSeeder::class,
            UsersSeeder::class,
            AdministratorSeeder::class,
            TransactionsSeeder::class,
            AddressSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            ParentProductSeeder::class,
            OrdersSeeder::class,
            OrderItemSeeder::class,
            ArticlesSeeder::class,
        ]);
    }
}
