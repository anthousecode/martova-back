<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfrastructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->nullable();
            $table->string('ru_name')->default('-')->nullable();
            $table->string('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->string('ua_description')->default('-')->nullable();
            $table->string('image')->nullable();
            $table->integer('X')->nullable();
            $table->integer('Y')->nullable();
            $table->string('icon')->nullable();
            $table->time('timing')->nullable();
            $table->string('video')->nullable();
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
        Schema::dropIfExists('infrastructures');
    }
}
