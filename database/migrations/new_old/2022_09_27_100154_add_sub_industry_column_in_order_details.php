<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubIndustryColumnInOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('subindustry_id')->nullable();
            $table->foreign('subindustry_id')->references('id')->on('subindustries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
}
