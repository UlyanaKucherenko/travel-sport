<?php

use App\Models\UsersBook;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersBooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UsersBook::class, 200)->create();
    }
}
