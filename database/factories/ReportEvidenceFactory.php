<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReportEvidence>
 */
class ReportEvidenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $files = [
            "project-evidence/contract1.pdf",
            "project-evidence/photo1.jpg",
        ];

        return [
            'type' => fake()->randomElement(['image', 'video', 'document', 'audio']),
            'file_url' => fake()->randomElement($files),
            'report_id' => Report::inRandomOrder()->value('id'),
        ];
    }
}
