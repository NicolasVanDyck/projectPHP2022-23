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
            $table->foreignId('groups_id')->nullable(false)->constrained()->restrictOnDelete();
            $table->foreignId('tours_id')->nullable(false)->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('startDate')->nullable(false);
            $table->dateTime('endDate')->nullable(false);
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
