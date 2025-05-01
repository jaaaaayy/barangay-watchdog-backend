<?php

namespace Database\Seeders;

use App\Models\Report;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Report::factory()->create([
            'title' => 'Suspicion of Substandard Solar Materials Used',
            'description' => 'Several residents have reported that some street lights are not functioning after just a few weeks. There are concerns that low-quality solar panels were installed despite the high project budget.',
            'type' => 'quality_violation',
            'status' => 'submitted',
            'priority' => 'high',
            'project_id' => 1,
        ]
        );
    }
}
