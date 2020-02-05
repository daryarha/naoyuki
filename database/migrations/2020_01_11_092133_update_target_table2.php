<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTargetTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->string('name');
            $table->string('nickname');
            $table->date('birth_date');
            $table->string('origin_city');
            $table->string('domicile');
            $table->string('job');
            $table->string('education');
            $table->string('institution');
            $table->string('phone', 12);
            $table->string('email', 100);
            $table->string('id_line');
            $table->string('id_instagram');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target', function (Blueprint $table) {
            //
        });
    }
}
