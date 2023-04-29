<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBicycletypeRoutePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicycletype_routes', function (Blueprint $table) {
            $table->unsignedBigInteger('bicycle_types_id')->index();
            $table->foreign('bicycle_types_id')->references('id')->on('bicycle_types')->onDelete('cascade');
            $table->unsignedBigInteger('routes_id')->index();
            $table->foreign('routes_id')->references('id')->on('routes')->onDelete('cascade');
            $table->primary(['bicycle_types_id', 'routes_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bicycletype_routes');
    }
}
