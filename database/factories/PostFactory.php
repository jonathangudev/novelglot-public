<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $user_id = rand(1,3);
            $category_id = 1;
    
            return [
                'user_id' => $user_id,
                'category_id' => 1,
                'title' => $this->faker->sentence(),
                'slug' => $this->faker->slug(),
                'content' => $this->faker->paragraph()
            ];
        
    }
}
