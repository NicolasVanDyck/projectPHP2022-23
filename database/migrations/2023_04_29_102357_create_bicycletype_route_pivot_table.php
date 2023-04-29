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
            $table->unsignedBigInteger('bicycle_type_id')->index();
            $table->foreign('bicycle_type_id')->references('id')->on('bicycle_types')->cascadeOnDelete();
            $table->unsignedBigInteger('route_id')->index();
            $table->foreign('route_id')->references('id')->on('routes')->cascadeOnDelete();
            $table->primary(['bicycle_type_id', 'route_id']);
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
