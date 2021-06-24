@extends('layouts.landing', ["isLogin" => $isLogin, "routes" => $routes])

@section('content')

    <main-page
            :slider_books="{{$sliderBooks}}"
            :plans="{{ $plans }}"
            :slider_reviews="{{ $sliderReviews }}"
            :routes="{{ $routes }}"
            locale="{{ $locale }}"
    ></main-page>

@endsection

