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
        <link href="/img/ml_favicon.ico" rel="icon" />
    </head>
<style>
    :root {
        --main-brand-color: #f60;
    }

    .dropdown-menu{
        font-size: 12px;
    }

    nav a.nav-link{
        font-family: 'Open Sans', sans-serif;
        /*font-size: 14px;*/
    }

    .red-bottom{
        border-bottom: 1px solid var(--main-brand-color);
    }

    i, .fas .fa{
        color: var(--main-brand-color);
        font-size: 1.1em;
    }

    .badge-brand-colour{
        background-color: var(--main-brand-color);
        color: #ffffff;
    }

    .navbar {
        /*padding: 0px 0px 0px 0px;*/
        padding-top: 0;
    }

    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev {
        display: block;
    }

    html,
    body {
        height: 100%;
        font-family: Museo,Arial!important;
        font-size: 14px;
        line-height: 1.42857;
    }

    #page-content {
        flex: 1 0 auto;
    }

    #sticky-footer {
        flex-shrink: none;
    }

    .footer-wrapper {
        background-color: #818383;
    }

    .card {

        font-family: Museo,Arial!important;
        font-size: 15px;
        overflow: hidden;
    }
    .card-block {
        word-wrap: break-word;
    }

    .logo{
        background-image: url(/img/ml-logo_204.jpg);
        background-repeat: no-repeat;
        height: 48px;
        width: 204px;
        background-size: 204px auto;
        cursor: pointer;
        display: inline-block;
    }

    .logo:hover {
        background-position: 0 -60px;
    }

    .logo-text {
        font-size: 18px;
        color: #5a5a5a;
    }

</style>
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

        @include('includes.partials.ga')
    </body>
</html>
