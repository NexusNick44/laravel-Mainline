@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div id="page-content">
        <div class="container mt-2">

            {{ $product }}


        </div>
    </div>


@endsection
