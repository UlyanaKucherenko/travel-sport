<?php

namespace App\Http\Controllers;

use App\Http\Requests\Training\BookingRequest;
use App\Http\Requests\Training\UpdateTrainingRequest;
use App\Models\Queries\BookingInfoQuery;
use App\Models\Training;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TrainingsController extends Controller
{

    public function bookingInfo(Request $request, BookingInfoQuery $query)
    {

        return [
            'data' => $query->query(Carbon::now()->subYear()),
        ];
    }

    public function updateBooking(UpdateTrainingRequest $request, Training $training)
    {
        return $training->updateTraining($request->only(['date', 'time', 'booked_by']));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Trainings $trainings
     * @return \Illuminate\Http\Response
     */
    public function show(Training $trainings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Trainings $trainings
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $trainings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Trainings $trainings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $trainings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Trainings $trainings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $trainings)
    {
        //
    }
}
