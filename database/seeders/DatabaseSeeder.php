<?php

namespace Database\Seeders;

use App\Models\Role;
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
        DatabaseSeeder::seedRoles();
         \App\Models\User::factory(10)->create();
    }

    private function seedRoles()
    {
        Role::truncate();
        Role::create([
            'id' => 1,
            'code' => Role::ADMIN_CODE,
            'title' => 'Admin',
        ]);
        Role::create([
            'id' => 2,
            'code' => Role::MANAGER_CODE,
            'title' => 'Manager',
        ]);
        Role::create([
            'id' => 3,
            'code' => Role::CUSTOMER_CODE,
            'title' => 'Customer',
        ]);
    }
}
