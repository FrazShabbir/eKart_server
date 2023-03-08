<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToSubindustries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subindustries', function (Blueprint $table) {
            $table->text('data_store')->nullable();
            $table->text('data_stats')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subindustries', function (Blueprint $table) {
            $table->dropColumn('data_store');
            $table->dropColumn('data_stats');
        });
    }
}
