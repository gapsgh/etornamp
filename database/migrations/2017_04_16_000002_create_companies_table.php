<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registration_number')->nullable();
            $table->string('address')->nullable();
            $table->integer('account_type')->unsigned()->default('1');
            $table->foreign('account_type')->references('id')->on('account_types');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('logo');
            $table->string('working_hours')->nullable();
            $table->longText('other_description')->nullable();
            $table->integer('location_city')->unsigned();
            $table->foreign('location_city')->references('id')->on('locations');
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
        Schema::dropIfExists('companies');
    }
}
