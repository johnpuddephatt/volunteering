<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->boolean('active')->default(false);

            $table->string('email',150)->unique();
            $table->string('password');
            $table->string('name');
            $table->string('slug')->nullable();

            $table->string('contact_name');
            $table->string('contact_role');
            $table->string('phone');
            $table->string('website')->nullable();
            $table->text('info');
            $table->string('photo')->nullable();
            $table->string('logo')->nullable();

            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisations');
    }
}
