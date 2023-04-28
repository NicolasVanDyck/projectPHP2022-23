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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('image_id')->nullable(false)->constrained();
            $table->string('startLocation')->nullable(false);
            $table->string('endLocation')->nullable(false);
            $table->float('amountOfKM')->nullable(false);
            $table->string('name')->nullable(false);
            $table->dateTime('createdAt')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
