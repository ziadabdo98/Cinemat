<?php

namespace Database\Factories;

use App\Models\Show;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'show_id' => Show::where('remaining_seats', '>', 1)->get()->random(),
            'user_id' => User::all()->random(),
            'seat_number' => function (array $attr) {
                $show = Show::find($attr['show_id']);
                $show->remaining_seats--;
                $show->save();
                return $this->faker->numberBetween(0, $show->room->size - 1);
            },
        ];
    }
}
