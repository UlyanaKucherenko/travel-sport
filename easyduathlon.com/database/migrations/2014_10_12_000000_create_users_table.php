<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 100);
            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->string('address');
            $table->string('city');
            $table->string('country',100);
            $table->string('phone',20);
            $table->string('postal_code',10);
            $table->boolean('subscribe_status')->default(false);
            $table->timestamp('subscribe_date')->nullable();
            $table->smallInteger('plan_id')->default(1);
            $table->enum('role', ['admin', 'manager','user'])->default('user');
            $table->string('orderId')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
