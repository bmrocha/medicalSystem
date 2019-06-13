<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->timestamps();
            //$table->integer('doctor_id');
            //$table->foreign('doctor_id')->references('id')->on('doctors');
            
            //fullcalendar
            $table->string('event_name');
            $table->date('start_date');
            $table->date('end_date');

            $table->integer('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('peoples');
            $table->integer('patients_id')->unsigned()->nullable();
            $table->foreign('patients_id')->references('id')->on('peoples');

            $table->integer('equipament_id')->unsigned()->nullable();
            $table->foreign('equipament_id')-> references('id')->on('equipaments');
            $table->integer('convenant_id');
            //$table->timestamp('event_date');
            //$table->time('event_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
