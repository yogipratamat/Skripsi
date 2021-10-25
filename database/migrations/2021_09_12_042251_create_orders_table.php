<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id_order');

            $table->string('date');
            $table->tinyInteger('status');
            $table->double('price');

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
        Schema::dropIfExists('orders');
    }
}
