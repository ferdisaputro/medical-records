<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $patient_code = 1000;
    public function definition()
    {
        $regist = [
            'doctor_code' => mt_rand(1000, 1005),
            'prsc_number' => $this->patient_code,
            'patient_code' => $this->patient_code,
            'poly_code' => mt_rand(1000,  1002),
            'user_code' => mt_rand(1000, 1005),
            'fee' => 5000,
            'description' => $this->faker->paragraph(5),
        ];
        $this->patient_code++;
        return $regist;
    }
}
