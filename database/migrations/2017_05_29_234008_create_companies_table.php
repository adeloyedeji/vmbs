<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rc_number');
            $table->string('cac_number');
            $table->string('tax_number');
            $table->string('company');
            $table->string('street');
            $table->string('city');
            $table->integer('country');
            $table->string('logo');
            $table->string('contact_firstname');
            $table->string('contact_lastname');
            $table->string('contact_mobile');
            $table->string('contact_email');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
