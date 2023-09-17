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
        Schema::create('main_course_blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('main_course_id');
            $table->integer('main_course_blog_category_id');
            $table->string('title');
            $table->string('image');
            $table->string('thumbnail');
            $table->string('slug');
            $table->string('status');
            $table->longText('content');
            $table->longText('details');
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();
            $table->string('button_text')->default('Read More');
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
        Schema::dropIfExists('main_course_blogs');
    }
};
