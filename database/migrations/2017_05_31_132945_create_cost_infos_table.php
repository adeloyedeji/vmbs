<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cost_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EF');
            $table->string('CE');
            $table->string('DF');
            $table->string('CD');
            $table->string('ETR');
            $table->string('IRR');
            $table->string('NCF');
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
        Schema::dropIfExists('cost_infos');
    }
}
