<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanTextsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_texts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('plan_id');
            $table->string('locale');

            $table->string('title');
            $table->string('text1');
            $table->string('text2');
            $table->string('trial');

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
        Schema::dropIfExists('plan_texts');
    }
}
