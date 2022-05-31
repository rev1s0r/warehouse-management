<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stock>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'current_stock' => $this->faker->numberBetween($min = 15, $max = 60),
            'unit_price' => $this->faker->numberBetween($min = 15, $max = 60),
        ];
    }
}
