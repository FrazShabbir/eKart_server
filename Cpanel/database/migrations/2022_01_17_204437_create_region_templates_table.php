<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_templates', function (Blueprint $table) {
            $table->id();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('banner')->nullable();
            $table->longText('expert')->nullable();
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
        Schema::dropIfExists('region_templates');
    }
}
