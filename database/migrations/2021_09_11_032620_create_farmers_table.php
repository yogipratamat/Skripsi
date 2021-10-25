<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->bigIncrements('id_farmer');
            $table->string('name');
            $table->string('land_area');
            $table->char('phone', 15);
            $table->string('email')->unique();
            $table->string('address');
            $table->tinyInteger('gender');

            // $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('group_farm_id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_group_farm');

            // $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
            // $table->foreign('group_farm_id')->references('id_group_farm')->on('group_farms')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('farmers');
    }
}
