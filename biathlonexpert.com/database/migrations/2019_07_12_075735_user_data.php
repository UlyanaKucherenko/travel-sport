<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');

            $table->unsignedInteger('purpose')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->unsignedInteger('hip')->nullable();
            $table->unsignedInteger('systolic')->nullable();
            $table->unsignedInteger('diastolic')->nullable();
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
        Schema::dropIfExists('user_data');
    }
}
