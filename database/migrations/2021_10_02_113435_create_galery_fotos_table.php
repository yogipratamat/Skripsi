<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleryFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galery_fotos', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('title');
            $table->text('description');

            $table->unsignedBigInteger('farmer_id');
            $table->foreign('farmer_id')->references('id')->on('farmers')->onDelete('cascade');

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
        Schema::dropIfExists('galery_fotos');
    }
}
