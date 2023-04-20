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
            'role_id' => Role::firstWhere('code', Role::MANAGER_CODE),
        ]);
        User::factory(50)->create();
        $this->seedMovies();
        Show::factory(50)->create();
        Reservation::factory(50)->create();
    }

    private function seedMovies()
    {
        DB::table('movies')->delete();
        $movies = [
            // The Dark Knight
            [
                'category_id' => 1,
                'title' => 'The Dark Knight',
                'image' => 'posters/Dark-Knight.jpg',
                'storyline' => 'Set within a year after the events of Batman Begins (2005), Batman, Lieutenant James Gordon, and new District Attorney Harvey Dent successfully begin to round up the criminals that plague Gotham City, until a mysterious and sadistic criminal mastermind known only as "The Joker" appears in Gotham, creating a new wave of chaos. Batman\'s struggle against The Joker becomes deeply personal, forcing him to "confront everything he believes" and improve his technology to stop him. A love triangle develops between Bruce Wayne, Dent, and Rachel Dawes',
                'rating' => 4.9,
                'language' => 'English',
                'release_date' => '2008-07-23',
                'director' => 'Christopher Nolan',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:32:00',
            ],
            //2 The shawshank redemption
            [
                'category_id' => 1,
                'title' => 'The Shawshank redemption',
                'image' => 'posters/Shawshank.jpg',
                'storyline' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.',
                'rating' => 4.65,
                'language' => 'English',
                'release_date' => '1994-01-12',
                'director' => 'Frank Darabont',
                'maturity_rating' => 'R',
                'running_time' => '02:22:00',

            ],
            //3 The Godfather
            [
                'category_id' => 2,
                'title' => 'The Godfather',
                'image' => 'posters/The_Godfather.jpg',
                'storyline' => 'The Godfather follows Vito Corleone, Don of the Corleone family, as he passes the mantel to his unwilling son, Michael.',
                'rating' => 4.6,
                'language' => 'English',
                'release_date' => '1972-07-11',
                'director' => 'Francis Ford Coppola',
                'maturity_rating' => 'R',
                'running_time' => '02:55:00',

            ],
            //4 The Lord of the Rings: The Return of the King
            [
                'category_id' => 1,
                'title' => 'The Lord of the Rings: The Return of the King',
                'image' => 'posters/Lord_of_the_rings.jpg',
                'storyline' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.',
                'rating' => 4.45,
                'language' => 'English',
                'release_date' => '2003-08-25',
                'director' => 'Peter Jackson',
                'maturity_rating' => 'PG-13',
                'running_time' => '03:21:00',

            ],
            //5 Fight Club
            [
                'category_id' => 1,
                'title' => 'Fight Club',
                'image' => 'posters/Fight_Club.jpg',
                'storyline' => 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.',
                'rating' => 4.4,
                'language' => 'English',
                'release_date' => '1999-12-01',
                'director' => 'David Fincher',
                'maturity_rating' => 'R',
                'running_time' => '02:19:00',

            ],
            //6 Inception
            [
                'category_id' => 2,
                'title' => 'Inception',
                'image' => 'posters/Inception.jpg',
                'storyline' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.',
                'rating' => 4.4,
                'language' => 'English',
                'release_date' => '2010-09-18',
                'director' => 'Christopher Nolan',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:28:00',

            ],
            //7 The Matrix
            [
                'category_id' => 1,
                'title' => 'The Matrix',
                'image' => 'posters/The_Matrix.jpg',
                'storyline' => 'When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.',
                'rating' => 4.35,
                'language' => 'English',
                'release_date' => '1999-03-09',
                'director' => 'Lana Wachowski',
                'maturity_rating' => 'R',
                'running_time' => '02:16:00',

            ],
            //8 Goodfellas
            [
                'category_id' => 2,
                'title' => 'Goodfellas',
                'image' => 'posters/Goodfellas.jpg',
                'storyline' => 'The story of Henry Hill and his life in the mob, covering his relationship with his wife Karen Hill and his mob partners Jimmy Conway and Tommy DeVito in the Italian-American crime syndicate.',
                'rating' => 4.35,
                'language' => 'English',
                'release_date' => '1990-05-18',
                'director' => 'Martin Scorsese',
                'maturity_rating' => 'R',
                'running_time' => '02:26:00',

            ],
            //9 Se7en
            [
                'category_id' => 2,
                'title' => 'Se7en',
                'image' => 'posters/Se7en.jpg',
                'storyline' => 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.',
                'rating' => 4.3,
                'language' => 'English',
                'release_date' => '1995-07-14',
                'director' => 'David Fincher',
                'maturity_rating' => 'R',
                'running_time' => '02:07:00',

            ],
            //10 Interstellar
            [
                'category_id' => 2,
                'title' => 'Interstellar',
                'image' => 'posters/Interstellar.jpg',
                'storyline' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'rating' => 4.3,
                'language' => 'English',
                'release_date' => '2014-06-11',
                'director' => 'Christopher Nolan',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:49:00',

            ],

        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
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
