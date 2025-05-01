<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectEvidence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProjectEvidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectEvidence::factory(10)->create();
    }
}
