<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('middle_name')->nullable();
            $table->string('firstname');
            $table->string('idcardnumber')->nullable();
            $table->string('passportnumber')->nullable();
            $table->string('gender');
            $table->string('staff_id');
            $table->string('email')->unique()->nullable();
            $table->string('work_email')->unique()->nullable();
            $table->boolean('registered')->default(false);
            $table->boolean('active')->default(false);
            $table->string('password');
            $table->integer('departement_id')->unsigned();
            $table->integer('leadership_position_id')->unsigned();
            $table->integer('academic_position_id')->unsigned();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
