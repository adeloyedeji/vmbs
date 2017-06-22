<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWellcompletionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wellcompletions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('well_id');
            $table->string('completiontype');
            $table->string('equipmentused');
            $table->integer('is_initial_completion')->default(0);
            $table->string('lower_interval');
            $table->string('upper_interval');
            $table->date('datecompleted');
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
        Schema::dropIfExists('wellcompletions');
    }
}
