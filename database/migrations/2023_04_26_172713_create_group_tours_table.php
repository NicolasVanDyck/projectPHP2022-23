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
        Schema::create('group_tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->nullable(false)->constrained()->restrictOnDelete();
            $table->foreignId('tour_id')->nullable(false)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('start_date')->nullable(false);
            $table->time('start_time')->nullable(false);
            $table->date('end_date')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_tours');
    }
};
