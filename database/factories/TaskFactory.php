<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'completed_at' => $this->faker->optional()->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
