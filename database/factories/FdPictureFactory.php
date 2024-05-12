<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FdPicture>
 */
class FdPictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {  
        return [
            'url' => fake()->imageUrl(640, 480, 'animals', true),
            'alt'=> fake()->words(3, true),
            'thumbnail_url' => fake()->imageUrl(640, 480, 'animals', true),
            'fd_item_id' => null,
        ];
    }
}
