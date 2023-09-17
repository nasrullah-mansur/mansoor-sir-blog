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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->integer('p_id')->default('0');
            $table->string('label')->nullable();
            $table->string('slug')->default('/');
            $table->string('icon')->nullable();
            $table->string('class')->nullable();
            $table->integer('position')->nullable();
            $table->string('target')->default('_self');

            $table->string('set_location')->nullable();
            $table->string('status')->default(STATUS_INACTIVE);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
};
