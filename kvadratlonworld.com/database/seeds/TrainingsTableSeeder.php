<?php

use App\Models\Training;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class TrainingsTableSeeder extends Seeder
{
    use WithFaker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $times = [8, 10, 12, 14, 16, 18, 20, 22, 0];
        $period = CarbonPeriod::create(Carbon::now()->subWeek(), Carbon::now()->addYear());
        foreach ($period as $date) {
            foreach ($times as $time) {
                if(mt_rand(0, 100) <80) {
                    factory(Training::class)->create([
                        'date' => $date,
                        'time' => $time,
                    ]);
                }
            }
        }

    }
}
