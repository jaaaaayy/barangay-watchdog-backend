<?php

namespace Database\Seeders;

use App\Models\Evidence;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class EvidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleFiles = [
            'photo' => 'evidence/photo1.jpeg',
            'document' => 'evidence/document1.pdf',
        ];

        foreach (Project::all() as $project) {
            foreach ($sampleFiles as $type => $path) {
                if (Storage::disk('public')->exists($path)) {
                    Evidence::create([
                        'type' => $type,
                        'file_url' => Storage::url($path),
                        'description' => fake()->sentence(),
                        'project_id' => $project->id,
                    ]);
                }
            }
        }
    }
}
