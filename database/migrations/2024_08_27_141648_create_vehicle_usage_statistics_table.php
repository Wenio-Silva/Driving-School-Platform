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
        Schema::create('vehicle_usage_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_usage_id')->constrained()->cascadeOnDelete();
            $table->integer('total_lesson');
            $table->integer('total_mileage');
            $table->decimal('average_mileage_per_lesson');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_usage_statistics');
    }
};
