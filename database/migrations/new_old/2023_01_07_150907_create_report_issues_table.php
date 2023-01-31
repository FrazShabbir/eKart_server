<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('report_id')->nullable();
            $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('create_by')->nullable();
            $table->foreign('create_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('resolve_by')->nullable();
            $table->foreign('resolve_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('report_issues');
    }
}
