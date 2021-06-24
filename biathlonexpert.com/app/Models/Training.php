<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Array_;

class Training extends Model
{

    public function forUser(User $user, $date_start=null, $date_end=null){
        if($date_start===null){
            $date_start = Carbon::now()->subMonth();
        }
        if($date_end===null){
            $date_end = Carbon::now()->addMonth();
        }
        return $this->newQuery()
            ->where('booked_by', '=', $user->id)
            ->orWhere('booked_by', '=', null)
            ->where('date', '<', $date_end)
            ->where('date', '>', $date_start)
            ->get()
            ;
    }



    public function scopeWhereThreeYears(Builder $query, $today)
    {
        list($from, $to) = $this->getThreeYears(Carbon::parse($today));

        return $query->whereBetween('date', [$from, $to])
            ->orderBy('date')
            ->orderBy('time');
    }

    private function getThreeYears(Carbon $lastYear)
    {
        $afterThreeYears = clone $lastYear;
        $afterThreeYears->addYears(3);

        return [ $lastYear, $afterThreeYears ];
    }


    public function updateTraining(Array $data){

        $result = $this->where('date', '=', $data['date'])->where('time', '=', $data['time'])
            ->update(['booked_by'=> $data['booked_by']]);
        $newItem = $this->where('date', '=', $data['date'])->where('time', '=', $data['time'])->first(['date', 'time', 'booked_by']);
        return response()->json([
            'status'=>'Ok',
            'result' => $newItem,
        ]);
    }
    //
    /**
     * Get the relationships for the entity.
     *
     * @return array
     */
    public function getQueueableRelations()
    {
        // TODO: Implement getQueueableRelations() method.
    }
}
