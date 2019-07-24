<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}

        @stack('after-styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        {{--    Additional styles    --}}
        <link rel="stylesheet" href="/css/main.css">
        {{--    End additional styles    --}}
        <link href="/img/ml_favicon.ico" rel="icon"/>
    </head>

    <body class="d-flex flex-column">
        @include('includes.partials.demo')

    <div id="app">
        @include('includes.partials.logged-in-as')
        @include('frontend.includes.nav')
        <div class="container p-0 mt-3">
            @include('includes.partials.messages')
        </div><!-- container -->

        @yield('content')

    </div><!-- #app -->

    @include('frontend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/frontend.js')) !!}
    @stack('after-scripts')

    {{--    Jquery for the products page    --}}
    @include('frontend.layouts.product')
    {{--    end Jquery for the products page    --}}

    @include('includes.partials.ga')
    </body>
    </html>
