<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');

            $table->unsignedBigInteger('subindustry_id')->nullable();
            $table->foreign('subindustry_id')->references('id')->on('subindustries')->onDelete('cascade');

            $table->string('price')->nullable(); 
            $table->string('qty')->nullable(); 
            $table->string('type')->nullable(); 
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
        Schema::dropIfExists('order_details');
    }
}
