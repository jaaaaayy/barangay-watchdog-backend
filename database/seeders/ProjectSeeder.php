<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create(
        [
            'title' => 'Installation of Solar Street Lights – Zone 6',
            'description' => 'Installation of 20 solar-powered street lights to improve safety.',
            'budget' => 180000.00,
            'contractor' => 'SunBright Solar Solutions',
            'start_date' => '2025-01-10',
            'end_date' => '2025-03-10',
            'status' => 'completed',
            'created_by' => User::inRandomOrder()->value('id'),
        ]);
    }
}
