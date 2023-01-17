<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_event', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_title');
            $table->string('event_time');
            $table->string('event_location');
            $table->string('event_detail');
            $table->string('event_img');
            $table->string('event_source');
            $table->string('event_source_edit_by');
            $table->string('event_source_detail');
            $table->string('event_photo_under');
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
        Schema::dropIfExists('t_event');
    }
}
