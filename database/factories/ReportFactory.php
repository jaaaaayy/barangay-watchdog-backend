<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'type' => $this->faker->randomElement(['bribery', 'nepotism', 'theft', 'quality_violation', 'delayed']),
            'status' => $this->faker->randomElement(['submitted', 'under_review', 'resolved', 'dismissed']),
            'project_id' => Project::inRandomOrder()->value('id'),
        ];
    }
}
