<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $type = ['tablet','caplet','capsule','pil','syrup','ointment','supositoria','cream','drops'];
        $category = ['free medicine','limited free','drugs','herbs'];
        return [
            'medicine_name' => implode(" ", $this->faker->words()),
            'category' => $category[mt_rand(0,3)],
            'medicine_type' => $type[mt_rand(0,8)],
            'medicine_price' => mt_rand(5000, 100000),
            'stock' => mt_rand(4, 140),
        ];
    }
}
