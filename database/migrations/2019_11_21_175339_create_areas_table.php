<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status_id')->nullable();
            $table->string('number')->nullable();
            $table->float('square')->nullable();
            $table->float('price')->nullable();
            $table->string('image')->nullable();
            $table->string('plan')->nullable();
            $table->string('survey')->nullable();
            $table->string('color')->nullable();
            $table->string('default_color')->nullable();
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
        Schema::dropIfExists('areas');
    }
}
