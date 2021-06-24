<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersBooksAddTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_books', function (Blueprint $table) {
            $table->timestamps();
        });
        dump(DB::delete("DELETE t1 FROM `users_books` t1
        INNER JOIN
    `users_books` t2 
            WHERE
    t1.id < t2.id AND t1.book_id = t2.book_id AND t1.user_id = t2.user_id;"));

        DB::update('UPDATE `users_books` SET `created_at` = NOW()');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_books', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
