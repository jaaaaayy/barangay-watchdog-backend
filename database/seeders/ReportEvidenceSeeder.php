<?php

namespace Database\Seeders;

use App\Models\ReportEvidence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportEvidenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportEvidence::factory(4)->create();
    }
}
