<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->bigIncrements('id_buyer');

            $table->string('image');
            $table->string('name');
            $table->char('phone', 15);
            $table->double('price');
            $table->text('description');

            // $table->unsignedBigInteger('group_farm_id');
            // $table->foreign('group_farm_id')->references('id_group_farm')->on('group_farms')->onDelete('cascade');
            $table->unsignedBigInteger('id_group_farm');
            $table->foreign('id_group_farm')->references('id_group_farm')->on('group_farms')->onDelete('cascade');

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
        Schema::dropIfExists('buyers');
    }
}
