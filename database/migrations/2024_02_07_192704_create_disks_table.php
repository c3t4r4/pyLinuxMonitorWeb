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
        Schema::create('disks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('disk');
            $table->string('percent_usage');
            $table->string('usage');
            $table->string('total');
            $table->timestamps();


            /** Foreign */
            $table->foreignUuid('log_id')->constrained('logs')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disks');
    }
};
