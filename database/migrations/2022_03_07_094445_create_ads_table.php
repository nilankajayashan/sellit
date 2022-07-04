<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->integer('ad_id')->autoIncrement();
            $table->integer('user_id')->nullable();
            $table->string('user_type')->nullable();
            $table->integer('category_id');
            $table->string('tittle');
            $table->text('description');
            $table->integer('price')->default(0);
            $table->string('city');
            $table->string('town');
            $table->string('images');
            $table->integer('main_image')->default(0);
            $table->text('ad_info')->nullable();
            $table->integer('status')->default(0);
            $table->integer('reject')->default(0);
            $table->string('reject_reason')->nullable();
            $table->string('ad_option')->nullable();
            $table->string('payment_status')->default('failed');
            $table->timestamps();
            //$table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
           // $table->foreign('category_id')->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
