<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ru_title')->default('-')->nullable();
            $table->longText('ru_content')->default('-')->nullable();
            $table->string('ua_title')->default('-')->nullable();
            $table->longText('ua_content')->default('-')->nullable();
            $table->text('ru_meta_description')->default('-')->nullable();
            $table->text('ua_meta_description')->default('-')->nullable();
            $table->integer('order')->default(0);
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('pages');
    }
}
