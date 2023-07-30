<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $patient_code = 1000;
    public function definition()
    {
        $totalPayment = [0, mt_rand(20000, 200000)];
        $totalResult = $totalPayment[mt_rand(0,1)];
        // $cash = null;
        // $change = null;
        // if (!$totalResult) {
        //     $cash = $totalResult;
        //     $change = $cash - $totalResult;
        // }
        return [
            'prsc_number' => $this->patient_code++,
            'payment_date' => now(),
            'total_payment' => $totalResult,
            'cash' => $totalResult,
            'change' => 0,
        ];
    }
}
