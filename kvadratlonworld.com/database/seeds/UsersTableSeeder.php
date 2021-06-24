<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)->create([
            'email' => "admin@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(10)->format('Y-m-d H:i:s'),
            'plan_id' => 2,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "admin1@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(10)->format('Y-m-d H:i:s'),
            'plan_id' => 1,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "admin2@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(10)->format('Y-m-d H:i:s'),
            'plan_id' => 2,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "admin3@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(10)->format('Y-m-d H:i:s'),
            'plan_id' => 3,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "andrew@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
            'plan_id' => 2,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "bruce@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
            'plan_id' => 2,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "chris@test.com",
            'password' => bcrypt("123123"),
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(5)->format('Y-m-d H:i:s'),
            'plan_id' => 2,
            'role' => "admin",
            'created_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(29)->format('Y-m-d H:i:s'),

        ]);

        factory(User::class)->create([
            'email' => "test@test.test",
            'password' => bcrypt("123123"),
            'role' => "user",
            'subscribe_status' => true,
            'subscribe_date' => Carbon::now()->subDays(31)->format('Y-m-d H:i:s'),
            'created_at' => Carbon::now()->subDays(32)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->subDays(32)->format('Y-m-d H:i:s'),
        ]);

        factory(User::class, 10)->create();
    }
}