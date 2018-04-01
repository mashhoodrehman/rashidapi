<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('status', ['RESERVED', 'CONFIRMED', 'CANCELED', 'SERVED'])->default('RESERVED');
            $table->dateTime('scheduled_on');
            $table->integer('service_id')->unsigned();
            $table->timestamps();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id', 'foreign_appointment_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('service_id', 'foreign_appointment_services')
                ->references('id')
                ->on('services')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
