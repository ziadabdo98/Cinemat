<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::all()->collect()->random(),
            'title' => $this->faker->word(),
            'image' => 'posters/4fmjEYxHifJKuldE0vvgJgMJ74AoiZrOludTdSge.jpg',
            'storyline' => $this->faker->realTextBetween(200, 400),
            'rating' => $this->faker->randomFloat(null, 0, 5),
            'language' => strtoupper($this->faker->languageCode()),
            'release_date' => $this->faker->dateTime(),
            'director' => $this->faker->word(),
            'maturity_rating' => $this->faker->randomElement(['PG-13', 'NC-17', 'R', 'G']),
            'running_time' => $this->faker->time('H:i:s', '+2 hours'),
        ];
    }
}
