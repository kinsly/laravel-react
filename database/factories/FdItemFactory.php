<?php

namespace Database\Factories;

use App\Models\FdCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FdItem>
 */
class FdItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = FdCategory::factory()->create();
        $data = [
            'title' => fake()->name(), 
            'card_tag' => fake()->word(), 
            'card_info' => fake()->sentence(2, true), 
            'unit_price' => fake()->randomFloat(2, 5, 150),
            'ratings' => fake()->numberBetween(1,5),
            'summary' => fake()->paragraph(3, true),
            'description' => fake()->paragraphs(3, true),
            'isAvailable' => fake()->boolean(),
            'status' => true,
            'fd_category_id' =>  $category->id,
        ];
        
        if (!isset($this->attributes['fd_category_id'])) {
                // Create a category if not provided
                $category = FdCategory::factory()->create();
                $data['fd_category_id'] = $category->id;
        }
        
       

        return $data;
    }
}
