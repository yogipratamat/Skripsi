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
            $table->id();

            $table->date('date');
            $table->string('land_area');
            $table->tinyInteger('status');
            $table->double('price')->nullable();

            $table->unsignedBigInteger('farmer_id');
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');

            $table->unsignedBigInteger('group_farm_id');
            $table->foreign('group_farm_id')->references('id')->on('group_farms')->onDelete('cascade');


            $table->unsignedBigInteger('tool_id');
            $table->foreign('tool_id')->references('id')->on('tools')->onDelete('cascade');

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
