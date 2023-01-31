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
            $table->unsignedBigInteger('orderId')->nullable();
            $table->foreign('orderId')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('total')->nullable();
            $table->date('date')->nullable();
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
