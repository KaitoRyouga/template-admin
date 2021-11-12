<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Transactions;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'setting_key' => 'logo',
            'setting_value' => '/assets/wp-content/uploads/2021/08/Logo-dichvuquangcao.png',
            'type' => 3
        ]);

        Setting::create([
            'setting_key' => 'banner',
            'setting_value' => '/assets/img/slide.jpg',
            'type' => 3
        ]);

        Setting::create([
            'setting_key' => 'phone',
            'setting_value' => '0382.300.533',
            'type' => 1
        ]);
    }
}
