<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->unsignedBigInteger('subindustry_id')->nullable();
            $table->foreign('subindustry_id')->references('id')->on('subindustries')->onDelete('cascade');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->text('description')->nullable(); 
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
        Schema::dropIfExists('requirements');
    }
}
