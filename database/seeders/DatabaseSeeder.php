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
        // delete all tables
        $tables = ['users', 'leads', 'password_resets', 'personal_access_tokens', 'reservations', 'shows'];
        foreach ($tables as $table) {
            DB::table($table)->delete();
        }

        $this->seedRoles();
        $this->seedCategories();
        $this->seedRooms();

        // create admin user
        User::factory(1)->create([
            'first_name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@cinemat.com',
            'password' => 'adminpass',
            'role_id' => Role::firstWhere('code', Role::ADMIN_CODE),
            'wants_manager' => false,
        ]);

        // create manager user
        User::factory(1)->create([
            'first_name' => 'manager',
            'username' => 'manager',
            'email' => 'manager@cinemat.com',
            'password' => 'managerpass',
            'role_id' => Role::firstWhere('code', Role::MANAGER_CODE),
            'wants_manager' => false,
        ]);

        // create customer user
        User::factory(1)->create([
            'first_name' => 'customer',
            'username' => 'customer',
            'email' => 'customer@cinemat.com',
            'password' => 'customerpass',
            'role_id' => Role::firstWhere('code', Role::CUSTOMER_CODE),
            'wants_manager' => false,
        ]);

        // create 50 customers
        User::factory(50)->create([
            'role_id' => Role::firstWhere('code', Role::CUSTOMER_CODE),
            'wants_manager' => false,
        ]);

        // create 15 manager requests
        User::factory(15)->create([
            'role_id' => Role::firstWhere('code', Role::CUSTOMER_CODE),
            'wants_manager' => true,
        ]);

        $this->seedMovies();
        Show::factory(50)->create();
        Reservation::factory(50)->create();
    }

    private function seedMovies()
    {
        DB::table('movies')->delete();
        $categories = Category::all();
        $movies = [
            // The Dark Knight
            [
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'The Dark Knight',
                'image' => 'posters/Dark-Knight.webp',
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
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'The Shawshank redemption',
                'image' => 'posters/Shawshank.webp',
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
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'The Godfather',
                'image' => 'posters/The_Godfather.webp',
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
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'The Lord of the Rings: The Return of the King',
                'image' => 'posters/Lord_of_the_rings.webp',
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
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'Fight Club',
                'image' => 'posters/Fight_Club.webp',
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
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'Inception',
                'image' => 'posters/Inception.webp',
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
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'The Matrix',
                'image' => 'posters/The_Matrix.webp',
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
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'Goodfellas',
                'image' => 'posters/Goodfellas.webp',
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
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'Se7en',
                'image' => 'posters/Se7en.webp',
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
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'Interstellar',
                'image' => 'posters/Interstellar.webp',
                'storyline' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'rating' => 4.3,
                'language' => 'English',
                'release_date' => '2014-06-11',
                'director' => 'Christopher Nolan',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:49:00',

            ],
            //11 John Wick
            [
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'John Wick',
                'image' => 'posters/John-Wick.webp',
                'storyline' => 'An ex-hitman comes out of retirement to track down the gangsters that took everything from him.',
                'rating' => 4.4,
                'language' => 'English',
                'release_date' => '2014-10-24',
                'director' => 'Chad Stahelski',
                'maturity_rating' => 'R',
                'running_time' => '01:41:00',
            ],
            //12 Die Hard
            [
                'category_id' => $categories->firstWhere('title', 'Action')->id,
                'title' => 'Die Hard',
                'image' => 'posters/Die-Hard.webp',
                'storyline' => 'John McClane, an off-duty cop, tries to save his wife and several others taken hostage by terrorists during a Christmas party at the Nakatomi Plaza in Los Angeles.',
                'rating' => 4.3,
                'language' => 'English',
                'release_date' => '1988-07-15',
                'director' => 'John McTiernan',
                'maturity_rating' => 'R',
                'running_time' => '02:12:00',
            ],
            //13 Forrest Gump
            [
                'category_id' => $categories->firstWhere('title', 'Drama')->id,
                'title' => 'Forrest Gump',
                'image' => 'posters/Forrest-Gump.webp',
                'storyline' => 'Forrest Gump, while not intelligent, has accidentally been present at many historic moments, but his true love, Jenny Curran, eludes him.',
                'rating' => 4.6,
                'language' => 'English',
                'release_date' => '1994-07-06',
                'director' => 'Robert Zemeckis',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:22:00',
            ],
            //14 The Hangover
            [
                'category_id' => $categories->firstWhere('title', 'Comedy')->id,
                'title' => 'The Hangover',
                'image' => 'posters/Hangover.webp',
                'storyline' => 'Three buddies wake up from a bachelor party in Las Vegas, with no memory of the previous night and the bachelor missing. They make their way around the city in order to find their friend before his wedding.',
                'rating' => 3.9,
                'language' => 'English',
                'release_date' => '2009-06-05',
                'director' => 'Todd Phillips',
                'maturity_rating' => 'R',
                'running_time' => '01:40:00',
            ],
            //15 The Grand Budapest Hotel
            [
                'category_id' => $categories->firstWhere('title', 'Comedy')->id,
                'title' => 'The Grand Budapest Hotel',
                'image' => 'posters/Grand-Budapest-Hotel.webp',
                'storyline' => 'The adventures of Gustave H, a legendary concierge at a famous hotel from the fictional Republic of Zubrowka between the first and second World Wars, and Zero Moustafa, the lobby boy who becomes his most trusted friend.',
                'rating' => 4.2,
                'language' => 'English',
                'release_date' => '2014-02-06',
                'director' => 'Wes Anderson',
                'maturity_rating' => 'R',
                'running_time' => '01:40:00',
            ],
            //16 The Notebook
            [
                'category_id' => $categories->firstWhere('title', 'Romance')->id,
                'title' => 'The Notebook',
                'image' => 'posters/The-Notebook.webp',
                'storyline' => 'A poor yet passionate young man falls in love with a rich young woman, giving her a sense of freedom, but they are soon separated because of their social differences.',
                'rating' => 4.2,
                'language' => 'English',
                'release_date' => '2004-06-25',
                'director' => 'Nick Cassavetes',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:03:00',
            ],
            //17 Titanic
            [
                'category_id' => $categories->firstWhere('title', 'Romance')->id,
                'title' => 'Titanic',
                'image' => 'posters/Titanic.webp',
                'storyline' => 'A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.',
                'rating' => 4.4,
                'language' => 'English',
                'release_date' => '1997-12-19',
                'director' => 'James Cameron',
                'maturity_rating' => 'PG-13',
                'running_time' => '03:15:00',
            ],
            //18 The Exorcist
            [
                'category_id' => $categories->firstWhere('title', 'Horror')->id,
                'title' => 'The Exorcist',
                'image' => 'posters/The-Exorcist.webp',
                'storyline' => 'When a teenage girl is possessed by a mysterious entity, her mother seeks the help of two priests to save her daughter.',
                'rating' => 4.1,
                'language' => 'English',
                'release_date' => '1973-12-26',
                'director' => 'William Friedkin',
                'maturity_rating' => 'R',
                'running_time' => '02:02:00',
            ],
            //19 The Conjuring
            [
                'category_id' => $categories->firstWhere('title', 'Horror')->id,
                'title' => 'The Conjuring',
                'image' => 'posters/The-Conjuring.webp',
                'storyline' => 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse.',
                'rating' => 4.0,
                'language' => 'English',
                'release_date' => '2013-07-19',
                'director' => 'James Wan',
                'maturity_rating' => 'R',
                'running_time' => '01:52:00',
            ],
            //20 The Fault in Our Stars
            [
                'category_id' => $categories->firstWhere('title', 'Romance')->id,
                'title' => 'The Fault in Our Stars',
                'image' => 'posters/The-Fault-in-Our-Stars.webp',
                'storyline' => 'Two teenagers, both living with cancer, fall in love and embark on a journey to visit a reclusive author in Amsterdam.',
                'rating' => 4.2,
                'language' => 'English',
                'release_date' => '2014-06-06',
                'director' => 'Josh Boone',
                'maturity_rating' => 'PG-13',
                'running_time' => '02:06:00',
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

        $default_categories = Category::CATEGORIES;
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
