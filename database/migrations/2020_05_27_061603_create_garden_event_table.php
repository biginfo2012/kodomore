<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardenEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_garden_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('garden_id');
            $table->bigInteger('event_id');
            $table->integer('point');
            $table->string('point_detail');
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
        Schema::dropIfExists('t_garden_event');
    }
}
