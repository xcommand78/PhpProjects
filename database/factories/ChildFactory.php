<?php

namespace Database\Factories;

use App\Models\Father;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_id' => Father::factory(),
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(1, 70), 
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
