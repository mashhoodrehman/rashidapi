<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_title');
            $table->string('clinic_name');
            $table->string('doctor_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->text('address', 500);
            $table->decimal('longitude', 15, 7)->nullable();
            $table->decimal('latitude', 15, 7)->nullable();
            $table->integer('slot')->default(30); // gap between appointment times, default 30 mins
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
        Schema::dropIfExists('settings');
    }
}
