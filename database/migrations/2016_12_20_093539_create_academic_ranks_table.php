<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_ranks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('teaching_hours');
            $table->integer('research_hours');
            $table->integer('academic_administration_hours');
            $table->integer('community_engagement_hours');
            $table->integer('total');
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
        Schema::dropIfExists('academic_ranks');
    }
}
