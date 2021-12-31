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
            'price' => $this->faker->randomFloat(2, 50, 500),
            'date_time' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'remaining_seats' => function (array $attr) {return Room::find($attr['room_id'])->size;},
        ];
    }
}
