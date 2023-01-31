<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndustryTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_templates', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->text('content');
            $table->text('solution');
            $table->text('banner');
            $table->text('expert');
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
        Schema::dropIfExists('industry_templates');
    }
}
