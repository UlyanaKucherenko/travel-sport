<?php

namespace App\Http\Controllers;

use App\BookDownloads;
use App\Models\UsersBook;
use http\Env\Response;
use Illuminate\Http\Request;

class BookDownloadsController extends Controller
{
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
    public function create(Request $request, UsersBook $usersBook)
    {
        if ($usersBook->canDownload()) {
            if($usersBook->createNewDownload($request->book_id)){
                return response()-> json('ok');
            }
        }

        return response()->json('error');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookDownloads  $bokkDownloads
     * @return \Illuminate\Http\Response
     */
    public function show(BookDownloads $bokkDownloads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookDownloads  $bokkDownloads
     * @return \Illuminate\Http\Response
     */
    public function edit(BookDownloads $bokkDownloads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookDownloads  $bokkDownloads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookDownloads $bookDownloads)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookDownloads  $bokkDownloads
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookDownloads $bokkDownloads)
    {
        //
    }
}
