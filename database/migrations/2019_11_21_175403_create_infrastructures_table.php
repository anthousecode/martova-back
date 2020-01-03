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
            $table->text('ru_description')->default('-')->nullable();
            $table->string('ua_name')->default('-')->nullable();
            $table->text('ua_description')->default('-')->nullable();
            $table->string('image')->nullable();
            $table->integer('X')->nullable();
            $table->integer('Y')->nullable();
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
