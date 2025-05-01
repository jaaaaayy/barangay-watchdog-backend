<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
           'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'budget' => $this->faker->randomFloat(2, 10000, 1000000),
            'contractor' => $this->faker->company,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['planned', 'ongoing', 'completed', 'delayed']),
            'created_by' => User::factory()
        ];
    }
}
