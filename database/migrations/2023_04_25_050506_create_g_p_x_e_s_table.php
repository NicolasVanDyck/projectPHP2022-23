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
        Schema::create('g_p_x_e_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(false)->constrained()->restrictOnDelete()->restrictOnUpdate();
            $table->string('path')->unique()->nullable(false);
            $table->string('start_location')->nullable(false);
            $table->string('end_location')->nullable(false);
            $table->float('amount_of_km')->nullable(false);
            $table->string('name')->unique()->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('g_p_x_e_s');
    }
};
