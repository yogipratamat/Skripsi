<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farm_workers', function (Blueprint $table) {
            $table->bigIncrements('id_farm_worker');

            $table->string('image');
            $table->string('name');
            $table->string('service_name');
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
        Schema::dropIfExists('farm_workers');
    }
}
