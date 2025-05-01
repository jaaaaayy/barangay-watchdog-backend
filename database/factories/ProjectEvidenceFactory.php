<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectEvidence>
 */
class ProjectEvidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $files = [
            "project-evidence/blueprint1.png",
            "project-evidence/contact1.png",
        ];

        return [
            'type' => fake()->randomElement(['blueprint', 'contract', 'permit', 'budget', 'report']),
            'file_url' => fake()->randomElement($files),
            'project_id' => Project::inRandomOrder()->value('id'),
        ];
    }
}
