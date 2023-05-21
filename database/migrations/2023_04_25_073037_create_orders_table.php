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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('user_id')->nullable(false)->constrained()->restrictOnDelete();
//            $table->foreignId('product_id')->nullable(false)->constrained()->restrictOnDelete();
//            $table->foreignId('product_size_id')->nullable(false)->references('id')->on('product_size')->restrictOnDelete();
            $table->foreignId('user_id')->nullable(false)->constrained()->restrictOnDelete();
            $table->foreignId('product_size_id')->nullable(false)->constrained('product_size')->restrictOnDelete();
            $table->dateTime('order_date')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
