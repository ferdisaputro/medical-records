<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_name' => $this->faker->name(),
            'specialist' => $this->faker->name(),
            'doctor_address' => $this->faker->paragraph(),
            'doctor_number' => mt_rand(100000000000, 999999999999),
            'poly_code' => mt_rand(1000, 1005),
            'fee' => mt_rand(50000, 200000)
        ];
    }
}
