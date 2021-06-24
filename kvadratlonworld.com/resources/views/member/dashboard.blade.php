@extends('layouts.app')

@section('content')

    <dashboard-page
            :total-books="{{ $totalBooks }}"
            :available-books="{{ $availableBooks }}"
            expiration-data="{{ $expiration_data }}"
            locale="{{ $locale }}"
            :recent-books="{{ $recentBooks }}"
            :top-book="{{ $topBook }}"
    ></dashboard-page>

@endsection