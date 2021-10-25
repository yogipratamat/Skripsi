<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidyFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidy_farmers', function (Blueprint $table) {
            $table->bigIncrements('id_subsidy_farmer');

            $table->integer('qty');
            $table->tinyInteger('status');
            $table->double('price');

            // $table->unsignedBigInteger('subsidy_id');
            // $table->foreign('subsidy_id')->references('id_subsidy')->on('subsidies')->onDelete('cascade');
            $table->unsignedBigInteger('id_subsidy');
            $table->foreign('id_subsidy')->references('id_subsidy')->on('subsidies')->onDelete('cascade');

            // $table->unsignedBigInteger('farmer_id');
            // $table->foreign('farmer_id')->references('id_farmer')->on('farmers')->onDelete('cascade');
            $table->unsignedBigInteger('id_farmer');
            $table->foreign('id_farmer')->references('id_farmer')->on('farmers')->onDelete('cascade');

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
        Schema::dropIfExists('subsidy_farmers');
    }
}
