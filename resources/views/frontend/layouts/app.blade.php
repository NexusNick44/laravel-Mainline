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

    .orange-text{
        color: #f60;
    }

    .btn-orange{
        background-color: #f60;
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

        <script>

                $("#add_to_basket").click(function (e) {
                    e.preventDefault();

                    var unit_type = $("#unit_type").val()
                    switch(unit_type) {
                        @if(isset($product))
                            case 'Box':
                                $("#price").val(Number({{ $product->price_2 }} * {{ $product->boxed_quantity }}).toFixed(2))
                                break;
                            case 'Pack':
                                $("#price").val(Number({{ $product->pack_price }} * {{ $product->pack_quantity }}).toFixed(2))
                                break;
                            case 'Length':
                                $("#price").val(Number({{ $product->price }} * {{ isset($product->length) ? $row->length : 2.9 }}).toFixed(2))
                                break;
                            default:
                                $("#price").val({{ $product->price }})
                        @endif
                    }

                    var product = $("#product_form").serialize()

                    $.ajax({
                        type: 'post',
                        url: '/addtocart',
                        data: product,
                        success: function (data) {
                            $('#div').load(" #div > *")
                        }
                    }).done(function () {


                    }).fail(function () {
                        console.log('NO!!!')
                    })



                    console.log(product)
                });



                $('.btn-number').click(function(e){
                    e.preventDefault();

                    fieldName = $(this).attr('data-field');
                    type      = $(this).attr('data-type');
                    var input = $("input[name='"+fieldName+"']");
                    var currentVal = parseInt(input.val());
                    if (!isNaN(currentVal)) {
                        if(type == 'minus') {

                            if(currentVal > input.attr('min')) {
                                input.val(currentVal - 1).change();
                            }
                            if(parseInt(input.val()) == input.attr('min')) {
                                $(this).attr('disabled', true);
                            }

                        } else if(type == 'plus') {

                            if(currentVal < input.attr('max')) {
                                input.val(currentVal + 1).change();
                            }
                            if(parseInt(input.val()) == input.attr('max')) {
                                $(this).attr('disabled', true);
                            }

                        }
                    } else {
                        input.val(0);
                    }
                });
                $('.input-number').focusin(function(){
                    $(this).data('oldValue', $(this).val());
                });
                $('.input-number').change(function() {

                    minValue =  parseInt($(this).attr('min'));
                    maxValue =  parseInt($(this).attr('max'));
                    valueCurrent = parseInt($(this).val());

                    name = $(this).attr('name');
                    if(valueCurrent >= minValue) {
                        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the minimum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }
                    if(valueCurrent <= maxValue) {
                        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
                    } else {
                        alert('Sorry, the maximum value was reached');
                        $(this).val($(this).data('oldValue'));
                    }


                });
                $(".input-number").keydown(function (e) {
                    // Allow: backspace, delete, tab, escape, enter and .
                    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                        // Allow: Ctrl+A
                        (e.keyCode == 65 && e.ctrlKey === true) ||
                        // Allow: home, end, left, right
                        (e.keyCode >= 35 && e.keyCode <= 39)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });

        </script>

        @include('includes.partials.ga')
    </body>
</html>
