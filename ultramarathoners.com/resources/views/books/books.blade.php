@extends('layouts.app')

@section('content')
    <books-page
            :props_books_data="{{ $books }}"
            :total-books="{{ $totalBooks }}"
            :available-books="{{ $availableBooks }}"
            :recent-books="{{ $recentBooks }}"
            :routes="{{ $routes }}"
            :plan="{{ $plan }}"
            locale="{{ $locale }}"
            download-errors="{{ $errors }}"
    ></books-page>

@endsection
