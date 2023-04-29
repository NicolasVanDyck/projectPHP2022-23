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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            // Removed cascadeOnUpdate. This is not necessary I think.
            // Because the route_id is not updated.
            // Removed null on delete. This is not necessary I think.
            $table->foreignId('route_id')->constrained();
            $table->dateTime('start_date')->nullable(False);
            $table->dateTime('end_date')->nullable(False);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
