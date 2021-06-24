@extends('layouts.app')

@section('content')
    <trainings
            :routes="{{ $routes }}"
            user="{{ $user }}"
            locale="{{ $locale }}"
    ></trainings>
@endsection
