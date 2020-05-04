<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpecialistFieldsToNeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('needs', function (Blueprint $table) {
          $table->text('contact_phone')->nullable();
          $table->text('contact_email')->nullable();
          $table->boolean('accepts_enquiries')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('needs', function (Blueprint $table) {
            //
        });
    }
}
