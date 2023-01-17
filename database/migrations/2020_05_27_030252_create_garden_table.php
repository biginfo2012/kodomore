<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_garden', function (Blueprint $table) {
            $table->bigIncrements('garden_id');
            $table->string('garden_name');
            $table->bigInteger('prefecture_id');
            $table->bigInteger('city_id');
            $table->bigInteger('town_id');
            $table->string('address');
            $table->string('post_code');
            $table->string('type_garden_1');
            $table->string('type_garden_2');
            $table->string('religion');
            $table->string('elementary_school');
            $table->string('higher_school');
            $table->string('location');
            $table->string('bus_route');
            $table->string('bus_route_img');
            $table->string('status');
            $table->string('photo');
            $table->string('comment_title');
            $table->string('comment_description');
            $table->string('founding');
            $table->integer('capacity');
            $table->string('working_time');
            $table->string('close_day');
            $table->string('distribution_date');
            $table->string('reception_date');
            $table->double('entrance_fee');
            $table->string('reception_place');
            $table->string('document_request');
            $table->string('individual_conclusion');
            $table->string('mobile');
            $table->string('url');
            $table->string('contact_address');
            $table->string('education_policy_title');
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
        Schema::dropIfExists('t_garden');
    }
}
