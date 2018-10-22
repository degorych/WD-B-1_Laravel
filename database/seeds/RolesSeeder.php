<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'show-user-info' => true,
                'update-user-info' => true,
                'show-form' => true,
                'update-form' => true,
                'fill-form' => true
            ]
        ]);
        $user = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => [
                'fill-form' => true,
            ]
        ]);
    }
}
