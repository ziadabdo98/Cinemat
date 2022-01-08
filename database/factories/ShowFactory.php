<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Room;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_id' => Movie::all()->collect()->random(),
            'room_id' => Room::all()->collect()->random(),
            'price' => $this->faker->randomFloat(0, 50, 500),
            'date' => $this->faker->dateTimeBetween('-1 days', '+3 week'),
            'start_time' => $this->faker->dateTimeBetween('-3 hours', 'now'),
            'end_time' => $this->faker->dateTimeBetween('now', '+3 hours'),
            'remaining_seats' => function (array $attr) {return Room::find($attr['room_id'])->size;},
        ];
    }
}
