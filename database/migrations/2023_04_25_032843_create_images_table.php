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
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->foreignId('image_type_id')->nullable()->constrained()->restrictOnDelete();
            $table->foreignId('tour_id')->nullable();
            $table->string('name')->unique()->nullable(false);
            $table->mediumText('description');
            $table->string('path')->unique()->nullable(false);
            $table->boolean('in_carousel')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
