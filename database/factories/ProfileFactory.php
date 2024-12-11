<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::Factory(),
            'image' => $this->faker->image(storage_path('app/public/images'), 300, 300, 'people', false),
            'video' => $this->faker->randomElement([
                'https://www.example.com/videos/video1.mp4',
                'https://www.example.com/videos/video2.mp4',
                'https://www.example.com/videos/video3.mp4',
            ]),
        ];
    }
}
