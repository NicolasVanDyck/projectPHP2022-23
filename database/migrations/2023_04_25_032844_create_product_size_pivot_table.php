<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSizePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_size', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger('product_id')->index();
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
//            $table->unsignedBigInteger('size_id')->index();
//            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('restrict');
//            $table->primary(['product_id', 'size_id']);

            // Hier een destrict on delete toegevoegd, in plaats van cascade. Als de maat wordt verwijderd, kan het zijn
            // ....dat deze nog in een order table staat. Historisch gezien moeten we hier dus een soft delete doen.

            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->restrictOnDelete();
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_size');
    }
}
