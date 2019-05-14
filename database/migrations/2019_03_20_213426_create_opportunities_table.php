<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            $table->boolean('active')->default(true);
            $table->timestamp('validated_at')->useCurrent();

            // User
            $table->bigInteger('organisation_id')->unsigned();
      		$table->foreign('organisation_id')->references('id')->on('organisations')->onDelete('cascade');

            //General
            $table->string('title',50);
            $table->string('slug')->nullable();
            $table->text('description');
            $table->string('intro', 120);

            $table->integer('places')->nullable();
            $table->integer('minimum_age')->nullable();
            $table->text('expenses')->nullable();
            $table->text('requirements')->nullable();
            $table->json('skills_needed');
            $table->json('skills_gained');

            // Location
            $table->boolean('from_home');
            $table->json('address');
            $table->text('address_ward')->nullable();
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();

            // Contact
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Timing
            $table->string('frequency')->nullable();
            $table->integer('hours')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opportunities');
    }
}
