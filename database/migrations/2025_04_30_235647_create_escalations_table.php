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
        Schema::create('escalations', function (Blueprint $table) {
            $table->id('escalation_id');
            $table->foreignId('report_id')->constrained('reports', 'report_id');
            $table->string('target_authority', 100);
            $table->integer('required_signatures')->default(100);
            $table->integer('current_signatures')->default(0);
            $table->enum('status', ['pending', 'escalated', 'resolved']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('escalations');
    }
};
