<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('field_name');
            $table->integer('company_id');
            $table->integer('block_id');
            $table->integer('number_wells');
            $table->string('zone_name');
            $table->string('terrain_name');
            $table->string('technical_allowable');
            $table->char('status');
            $table->date('discovery');
            $table->date('production_start');
            $table->integer('quantity_oil');
            $table->integer('quantity_gas');
            $table->integer('quantity_condensate');
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
        Schema::dropIfExists('fields');
    }
}
