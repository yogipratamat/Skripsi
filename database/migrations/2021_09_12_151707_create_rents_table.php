<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->bigIncrements('id_rent');

            $table->date('date');
            $table->string('land_area');
            $table->tinyInteger('status');
            $table->double('price')->nullable();

            // $table->unsignedBigInteger('farmer_id');
            // $table->foreign('farmer_id')->references('id_farmer')->on('farmers')->onDelete('cascade');
            $table->unsignedBigInteger('id_farmer');
            $table->foreign('id_farmer')->references('id_farmer')->on('farmers')->onDelete('cascade');

            // $table->unsignedBigInteger('group_farm_id');
            // $table->foreign('group_farm_id')->references('id_group_farm')->on('group_farms')->onDelete('cascade');
            $table->unsignedBigInteger('id_group_farm');
            $table->foreign('id_group_farm')->references('id_group_farm')->on('group_farms')->onDelete('cascade');

            // $table->unsignedBigInteger('tool_id');
            // $table->foreign('tool_id')->references('id_tool')->on('tools')->onDelete('cascade');
            $table->unsignedBigInteger('id_tool');
            $table->foreign('id_tool')->references('id_tool')->on('tools')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rents');
    }
}
