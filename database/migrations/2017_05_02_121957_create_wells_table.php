<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wells', function (Blueprint $table) {
            $table->increments('id');
            $table->string('well_name');
            $table->integer('company_id');
            $table->string('type')->default('Not Applicable');
            $table->integer('area');
            $table->string('status');
            $table->integer('field_id');
            $table->string('capacity');
            $table->date('date_dicovered');
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
        Schema::dropIfExists('wells');
    }
}
