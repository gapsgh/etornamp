<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('code')->unique();
            $table->double('single_price');
            $table->double('bulk_price');
            $table->double('bonus_percentage_single');
            $table->double('bonus_percentage_bulk');
            $table->integer('active_status')->default('1');
            $table->integer('approval_status')->default('0');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('certification_status')->default('0');
            $table->integer('premiun_status')->default('0');
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
        Schema::dropIfExists('products');
    }
}
