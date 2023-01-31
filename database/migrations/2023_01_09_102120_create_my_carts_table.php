<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('subindustry_id')->nullable();
            $table->foreign('subindustry_id')->references('id')->on('subindustries')->onDelete('cascade');
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->string('type')->nullable(); 
            $table->string('qty')->nullable(); 
            $table->string('price')->nullable(); 
            $table->string('total')->nullable(); 
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
        Schema::dropIfExists('my_carts');
    }
}
