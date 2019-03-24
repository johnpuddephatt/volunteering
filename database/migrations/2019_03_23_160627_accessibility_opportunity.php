<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessibilityOpportunity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessibility_opportunity', function (Blueprint $table) {
            $table->unsignedBigInteger('opportunity_id')->nullable();
            $table->foreign('opportunity_id')->references('id')
                ->on('opportunities')->onDelete('cascade');

            $table->unsignedBigInteger('accessibility_id')->nullable();
            $table->foreign('accessibility_id')->references('id')
                ->on('accessibilities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessibility_opportunity');
    }
}
