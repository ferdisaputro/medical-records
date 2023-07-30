<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = ['male','female'];
        $number = "08";
        for ($i=0; $i < 10 ; $i++) { 
            $number .= mt_rand(0,9);
        }
        $status = ['waiting', 'consulting', 'finished'];
        return [
            'patient_name' => $this->faker->name(),
            'patient_address' => $this->faker->paragraph(),
            'patient_gender' => $gender[mt_rand(0,1)],
            'patient_age' => mt_rand(12, 60),
            'patient_status' => $status[mt_rand(0, 2)],
            'patient_number' => $number
        ];
    }
}
