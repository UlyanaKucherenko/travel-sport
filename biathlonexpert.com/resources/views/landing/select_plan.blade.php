@extends('layouts.landing')

@section('content')

    <select_plan-page
        :plans="{{ $plans }}"
        :routes="{{ $routes }}"
        api_url="{{ $api_url }}"
        locale="{{ $locale }}"
    ></select_plan-page>

@endsection

