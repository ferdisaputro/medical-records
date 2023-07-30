<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $patientCode = 1000;
    public function definition()
    {
        return [
            'prsc_date' => now(),
            'doctor_code' => mt_rand(1000, 1005),
            'patient_code' => $this->patientCode++,
            'poly_code' => mt_rand(1000, 1002),
            'user_code' => mt_rand(1000, 1005),
            'total_payment' => mt_rand(30000, 400000),
        ];
    }
}
