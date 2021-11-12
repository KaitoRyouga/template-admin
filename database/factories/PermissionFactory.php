<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Permission;

class PermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listPermission = [];

        $config = config('permission.list');
        if (!empty($config)) {
            foreach ($config as $key => $value) {
                foreach ($value as $k => $v) {
                    $listPermission[] = [
                        'guard_name' => 'admin',
                        'name' => $v
                    ];
                }
            }
        }

        return $listPermission;
    }
}
