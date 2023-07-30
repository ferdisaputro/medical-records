<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\detail>
 */
class DetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prsc_number' => mt_rand(1000, 1005),
            'medicine_code' => mt_rand(1000,1005),
            'dose' => mt_rand(1, 5)."/d",
            'pcs' => mt_rand(1, 5),
            'sub_total' => mt_rand(50000, 200000),
        ];
    }
}
