@extends('layouts.app')

@section('content')

    <subscription-page
            :total-books="{{ $totalBooks }}"
            :available-books="{{ $availableBooks }}"
            :data="{{ $data }}"
            :routes="{{ $routes }}"
            locale="{{ $locale }}"
            :plan-texts="{{ $planTexts }}"
            :plans="{{ $plans }}"
            :user="{{ $user }}"
            unsubscribe-errors="{{ $errors }}"
    ></subscription-page>

@endsection