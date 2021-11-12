<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email', 'test@gmail.com')->first();
        $count = User::count();

        if (empty($user)) {

            User::create([
                'name' => 'test',
                'password' => bcrypt('kaito'),
                'email' => 'test@gmail.com',
                'firstName' => "kaito",
                'lastName' => "ryouga",
                "balance" => 1000000
            ]);
        }

        if ($count == 0) {
            User::factory()->count(10)->create();
        }
    }
}
