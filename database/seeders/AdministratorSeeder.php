<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Administrator::where('email', 'kaito@gmail.com')->first();
        $collab = Administrator::where('email', 'collab@gmail.com')->first();
        $count = Administrator::count();

        if (empty($admin)) {

            $admin = Administrator::create([
                'name' => 'kaito',
                'password' => bcrypt('kaito'),
                'email' => 'kaito@gmail.com'
            ]);

            $admin->assignRole('Administrator');
        }

        if (empty($collab)) {

            $collab = Administrator::create([
                'name' => 'collab',
                'password' => bcrypt('kaito'),
                'email' => 'collab@gmail.com'
            ]);

            $collab->assignRole('Collaborator');
        }

        if ($count == 0) {
            Administrator::factory()->count(100)->create()->each(function ($admin) {

                $role = ['Administrator', 'Collaborator'];
                $admin->assignRole($role[array_rand($role)]);
            });
        }
    }
}
