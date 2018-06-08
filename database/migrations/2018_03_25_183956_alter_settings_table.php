<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('about_1')->nullable();
            $table->text('about_2')->nullable();
            $table->string('about_count_1')->nullable();
            $table->string('about_count_2')->nullable();
            $table->string('about_count_3')->nullable();
            $table->text('service_title')->nullable();
            $table->text('service_body')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['about_1', 'about_2', 'about_count_1', 'about_count_2', 'about_count_3',
                'service_title', 'service_body']);
        });
    }
}
