@extends('layouts.app')

@section('content')

    <profile-page
            :user="{{ $user }}"
            :data="{{ $data }}"
            :routes="{{ $routes }}"
            locale="{{ $locale }}"
    ></profile-page>

@endsection