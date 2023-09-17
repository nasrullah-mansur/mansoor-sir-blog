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
        Schema::create('custom_pages', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('title');
            $table->string('image')->nullable();
            $table->text('slug');
            $table->string('status')->default(STATUS_ACTIVE);
            $table->longText('html')->nullable();
            $table->longText('css')->nullable();
            $table->longText('javascript')->nullable();
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
        Schema::dropIfExists('custom_pages');
    }
};
