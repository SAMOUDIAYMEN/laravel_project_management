<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(maxNbChars:500),
            'customer_id' => fake()->numberBetween(int1:1,int2:10),
            'user_id' => fake()->numberBetween(int1:1,int2:10),
            'created_date' => fake()->date(),
            'end_date' => fake()->date(),
            'progress' => fake()->numberBetween(int1:0,int2:100),
            'status' => fake()->text(maxNbChars:10),
        ];
    }
}
