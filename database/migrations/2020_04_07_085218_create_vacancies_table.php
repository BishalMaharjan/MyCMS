<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vacancy_title');
            $table->string('vacancy_position');
            $table->integer('vacancy_number');
            $table->string('vacancy_skill');
            $table->string('vacancy_email');
            $table->text('vacancy_description');
            $table->string('vacancy_status');
            $table->string('vacancy_deadline');
            $table->timestamp('posted_date')->default(DB::raw('CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
