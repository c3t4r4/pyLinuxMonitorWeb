<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('hostname');
            $table->string('cpu_usage');
            $table->string('cpu_total');
            $table->string('ram_usage');
            $table->string('ram_total');
            $table->string('disk_usage');
            $table->string('disk_total');
            $table->timestamps();


            /** Foreign */
            $table->foreignUuid('node_id')->constrained('nodes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
