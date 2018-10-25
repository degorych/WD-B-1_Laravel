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
                'index-form' => true,
                'show-form' => true,
                'edit-form' => true,
                'create-form' => true
            ]
        ]);
        $user = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => [
                'create-form' => true,
            ]
        ]);
    }
}
