<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassMateriTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_materi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_materi');
            $table->foreign('id_materi')->references('id')->on('materi');
            $table->unsignedBigInteger('id_class');
            $table->foreign('id_class')->references('id')->on('class');
            $table->primary(['id_class','id_materi']);
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
        Schema::dropIfExists('class_materi');
    }
}
