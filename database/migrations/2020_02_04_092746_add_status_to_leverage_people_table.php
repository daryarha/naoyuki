<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToLeveragePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leverage_people', function (Blueprint $table) {
            //
            
            $table->unsignedTinyInteger('id_status');
            $table->foreign('id_status')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leverage_people', function (Blueprint $table) {
            //
        });
    }
}
