<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidebars', function (Blueprint $table) {
            $table->id();
            $table->string('page_id');
            $table->string('category')->nullable();
            $table->string('comment')->nullable();
            $table->string('mini_course')->nullable();
            $table->longText('mini_course_title')->nullable();
            $table->longText('mini_course_link')->nullable();
            $table->string('advertizement')->nullable();
            $table->string('advertizement_id')->nullable();
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
        Schema::dropIfExists('sidebars');
    }
};
