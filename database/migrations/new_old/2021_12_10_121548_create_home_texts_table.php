<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_texts', function (Blueprint $table) {
            $table->id();
            $table->text('head1')->nullable();
            $table->text('subhead1')->nullable();
            $table->text('head2')->nullable();
            $table->text('subhead2')->nullable();
            $table->text('head3')->nullable();
            $table->text('subhead3')->nullable();
            $table->text('head4')->nullable();
            $table->text('subhead4')->nullable();
            $table->text('footerContent')->nullable();
            $table->text('serviceContent')->nullable();
            $table->text('industiryContent')->nullable();
            $table->text('insightsContent')->nullable();
            $table->text('analysisContent')->nullable();
            $table->text('head1img')->nullable();
            $table->text('head2img')->nullable();
            $table->text('head3img')->nullable();
            $table->text('head4img')->nullable();
            $table->text('logo')->nullable();
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
        Schema::dropIfExists('home_texts');
    }
}
