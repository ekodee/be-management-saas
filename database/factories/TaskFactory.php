<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
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
            'title' => fake()->sentence(),
            'status' => fake()->randomElement(['todo', 'in_progress', 'done']),
            'project_id' => Project::inRandomOrder()->first()->id ?? Project::factory(),
            'assigned_to' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
