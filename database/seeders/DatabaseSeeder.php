<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\Room;
use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedRoles();
        $this->seedCategories();
        $this->seedRooms();
        User::factory(1)->create([
            'first_name' => 'root',
            'username' => 'root',
            'email' => 'test@gmail.com',
            'password' => '2010',
            'role_id' => Role::firstWhere('code', Role::ADMIN_CODE),
        ]);
        User::factory(50)->create();
        Movie::factory(50)->create();
        Show::factory(50)->create();
        Reservation::factory(25)->create();
    }

    private function seedRooms()
    {
        DB::table('rooms')->delete();

        $default_sizes = [20, 30];
        foreach ($default_sizes as $size) {
            Room::create(['size' => $size]);
        }
    }

    private function seedCategories()
    {
        DB::table('categories')->delete();

        $default_categories = ['Action', 'Drama', 'Comedy', 'Romance', 'Horror'];
        foreach ($default_categories as $category) {
            Category::create(['title' => $category]);
        }
    }

    private function seedRoles()
    {
        DB::table('roles')->delete();

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
