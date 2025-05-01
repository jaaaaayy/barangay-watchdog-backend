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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            // Self-reference (optional, nullable if it can be a root project)
            $table->unsignedBigInteger('parent_project_id')->nullable();

            // Add FK after declaring column
            $table->foreign('parent_project_id')
                ->references('project_id')
                ->on('projects')
                ->onDelete('cascade');

            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->decimal('budget', 12, 2);
            $table->string('contractor', 100)->nullable();

            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('status', ['planned', 'ongoing', 'completed', 'delayed']);
            $table->foreignId('created_by')->constrained('users', 'user_id');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
