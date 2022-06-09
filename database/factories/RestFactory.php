<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $s_time = $this->faker->dateTimeBetween('10hour', '20hour');
        return [
            'attendance_id' => $this->faker->numberBetween(1, 5),
            'start_rest' => $s_time->format('H:i'),
            'end_rest' => $s_time->modify('+30minute')->format('H:i'),
        ];
    }
}
