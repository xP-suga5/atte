<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $s_date = $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+3 day');
        $s_time = $this->faker->dateTimeBetween('7hour', '10hour');
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'date' => $s_date->format('Y-m-d'),
            'start_time' => $s_time->format('H:i'),
            'end_time' => $s_time->modify('+8hour')->format('H:i'),
        ];
    }
}
