<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('report_id');
            $table->foreignId('reporter_id')->constrained('users', 'user_id');
            $table->foreignId('project_id')->nullable()->constrained('projects', 'project_id');
            $table->string('title', 100);
            $table->text('description');
            $table->enum('type', ['bribery', 'nepotism', 'theft', 'quality_violation']);
            $table->enum('status', ['submitted', 'under_review', 'resolved', 'dismissed'])->default('submitted');
            $table->char('submission_hash', 64);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
