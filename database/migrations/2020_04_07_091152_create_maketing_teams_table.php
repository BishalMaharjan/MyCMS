<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaketingTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketing_teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mt_name');
            $table->integer('mt_phone');
            $table->string('mt_designation');
            $table->string('mt_sector');
            $table->string('mt_email')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maketing_teams');
    }
}
