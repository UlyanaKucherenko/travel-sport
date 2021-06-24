<?php

use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Seeder;

class UserDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (User::all() as $user){
            factory(UserData::class)->create([
                'user_id'=> $user->id
            ]);
        }
    }
}
