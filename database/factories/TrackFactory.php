<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid'=> 'trk-' . Str::uuid(),
            'title' => $this->faker->sentence(),
            'artist' => $this->faker->name(),
            'image' => 'public/images/default.png',
            'music'=> '',
            'display' => true,
            'play-count'=> 0,
        ];
    }
}
