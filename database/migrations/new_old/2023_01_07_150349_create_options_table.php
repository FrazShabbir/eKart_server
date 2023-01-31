<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('cr')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('insta')->nullable();
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
        Schema::dropIfExists('options');
    }
}
