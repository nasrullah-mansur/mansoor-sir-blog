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
        Schema::create('appearances', function (Blueprint $table) {
            $table->id();
            $table->string('theme_name');
            $table->string('admin_name');
            $table->string('logo');
            $table->string('favicon');
            $table->longText('address');
            $table->longText('meta')->nullable();
            $table->longText('custom_css')->nullable();
            $table->longText('custom_javascript')->nullable();
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
        Schema::dropIfExists('appearances');
    }
};
