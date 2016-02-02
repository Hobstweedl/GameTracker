<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LabelsColors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('roles', function($table)
        {
            $table->string('color');
            $table->string('icon');
        });

        Schema::create('labels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('color');
            $table->string('icon');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('playthrough_label', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('label_id');
            $table->smallInteger('playthrough_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('game_label', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('game_id');
            $table->smallInteger('label_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
