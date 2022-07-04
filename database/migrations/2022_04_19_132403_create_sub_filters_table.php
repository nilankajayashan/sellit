<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_filters', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('category_name');
            $table->string('filter');
            $table->string('filter_list')->nullable();
            $table->string('additional_text')->nullable();
            $table->integer('steps')->default(0);
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
        Schema::dropIfExists('sub_filters');
    }
}
