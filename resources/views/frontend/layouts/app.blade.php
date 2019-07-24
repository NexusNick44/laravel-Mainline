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
        <link href="/img/ml_favicon.ico" rel="icon"/>
    </head>
    <style>
        :root {
            --main-brand-color: #f60;
        }

        .dropdown-menu {
            font-size: 12px;
        }

        nav a.nav-link {
            font-family: 'Open Sans', sans-serif;
            /*font-size: 14px;*/
        }

        .red-bottom {
            border-bottom: 1px solid var(--main-brand-color);
        }

        i, .fas .fa {
            color: var(--main-brand-color);
            font-size: 1.1em;
        }

        .badge-brand-colour {
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
            font-family: Museo, Arial !important;
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

            font-family: Museo, Arial !important;
            font-size: 15px;
            overflow: hidden;
        }

        .card-block {
            word-wrap: break-word;
        }

        .logo {
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

        .orange-text {
            color: #f60;
        }

        .btn-orange {
            background-color: #f60;
        }

        /* adds some margin below the link sets  */
        .navbar .dropdown-menu div[class*="col"] {
            margin-bottom: 1rem;
        }

        .navbar #navbarSupportedContent .dropdown-menu {
            border: none;
            background-color: #818383 !important;
        }

        #navbarSupportedContent > ul > li:hover {
            background-color: #818383 !important;
        }

        .dropdown > #navbarDropdown:hover {
            /*background-color:#818383!important;*/
            color: #ffffff;
        }

        .navbar-nav > .nav-item > .nav-link {
            color: #5a5a5a;
        }

        .navbar #navbarSupportedContent .navbar-nav > .nav-item > .nav-link:hover {
            color: #f60;
        }

        .nav-link {
            color: #ffffff;
        }

        .nav-link:hover {
            color: #f60;
        }


        /* breakpoint and up - mega dropdown styles */
        @media screen and (min-width: 992px) {

            /* remove the padding from the navbar so the dropdown hover state is not broken */
            .navbar {
                padding-top: 0px;
                padding-bottom: 0px;
            }

            /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
            .navbar .nav-item {
                padding: .5rem .5rem;
                margin: 0 .25rem;
            }

            /* makes the dropdown full width  */
            .navbar #navbarSupportedContent .dropdown {
                position: static;
            }

            .navbar #navbarSupportedContent .dropdown-menu {
                width: 100%;
                left: 0;
                right: 0;
                /*  height of nav-item  */
                top: 45px;
                display: block;
                visibility: hidden;
                opacity: 0;
                transition: visibility 0s, opacity 0.3s linear;
            }

            /* shows the dropdown menu on hover */
            .navbar #navbarSupportedContent .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
                display: block;
                visibility: visible;
                opacity: 1;
                transition: visibility 0s, opacity 0.3s linear;
            }

            .navbar #navbarSupportedContent .dropdown-menu {
                border: 1px solid rgba(0, 0, 0, .15);
                background-color: #fff;

            }

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

    {{--    Jquery for the products page    --}}
    @include('frontend.layouts.product')
    {{--    end Jquery for the products page    --}}

    @include('includes.partials.ga')
    </body>
    </html>
