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

    /* adds some margin below the link sets  */
    .navbar .dropdown-menu div[class*="col"] {
        margin-bottom:1rem;
    }

    .navbar #navbarSupportedContent .dropdown-menu {
        border:none;
        background-color:#818383!important;
    }

    #navbarSupportedContent>ul>li:hover{
        background-color:#818383!important;
    }

    .dropdown>#navbarDropdown:hover{
        /*background-color:#818383!important;*/
        color: #ffffff;
    }

    .navbar-nav>.nav-item>.nav-link{
        color: #5a5a5a;
    }

    .navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link:hover {
        color: #f60;
    }

    .nav-link{
        color: #ffffff;
    }

    .nav-link:hover{
        color: #f60;
    }



    /* breakpoint and up - mega dropdown styles */
    @media screen and (min-width: 992px) {

        /* remove the padding from the navbar so the dropdown hover state is not broken */
        .navbar {
            padding-top:0px;
            padding-bottom:0px;
        }

        /* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
        .navbar .nav-item {
            padding:.5rem .5rem;
            margin:0 .25rem;
        }

        /* makes the dropdown full width  */
        .navbar #navbarSupportedContent .dropdown {position:static;}

        .navbar #navbarSupportedContent .dropdown-menu {
            width:100%;
            left:0;
            right:0;
            /*  height of nav-item  */
            top:45px;
            display:block;
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s linear;
        }

        /* shows the dropdown menu on hover */
        .navbar  #navbarSupportedContent .dropdown:hover .dropdown-menu, .navbar .dropdown .dropdown-menu:hover {
            display:block;
            visibility: visible;
            opacity: 1;
            transition: visibility 0s, opacity 0.3s linear;
        }

        .navbar #navbarSupportedContent .dropdown-menu {
            border: 1px solid rgba(0,0,0,.15);
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

        <script>

            function unitPrice(){
                var unit_type = $("#unit_type").val()
                switch(unit_type) {
                    @if(isset($product))
                    case 'Box':
                        return Number({{ $product->price_2 }} * {{ $product->boxed_quantity }}).toFixed(2)
                        break;
                    case 'Pack':
                        return Number({{ $product->pack_price }} * {{ $product->pack_quantity }}).toFixed(2)
                        break;
                    case 'Length':
                        return Number({{ $product->price }} * {{ isset($product->length) ? $product->length : 2.9 }}).toFixed(2)
                        break;
                    default:
                        return {{ $product->price }}
                    @endif
                }
            }

            function unitQty(){
                var unit_type = $("#unit_type").val()
                switch(unit_type) {
                    @if(isset($product))
                    case 'Box':
                        return Number($("#quant").val() * {{ $product->boxed_quantity }}).toFixed(2)
                        break;
                    case 'Pack':
                        return Number($("#quant").val() * {{ $product->pack_quantity }}).toFixed(2)
                        break;
                    case 'Length':
                        return Number($("#quant").val() * {{ isset($product->length) ? $product->length : 2.9 }}).toFixed(2)
                        break;
                    default:
                        return {{ $product->price }}
                    @endif
                }
            }

            function displayCostAndQty(){

                $("#length_qty").text('')
                $("#length_qty").text(unitQty()+'m').append('<span id="total_cost" class="float-right font-weight-bold">'+(unitPrice()*$("#quant").val()).toFixed(2)+'</span>')
            }

                $("#add_to_basket").click(function (e) {
                    e.preventDefault();

                    $("#price").val(unitPrice())

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

                //Nav Search
                $("#product_id").on('keydown ', function(event){
                    if(event.which === 13){
                        getProduct($("#product_id").val())
                    }
                });

                function getProduct(product_id){

                    if(formatProductId(product_id)){
                        window.location.href = "/product/"+formatProductId(product_id);
                    }
                }

                function formatProductId(product_id){
                    //console.log(product_id)
                    var reg = '[a-zA-Z0-9]{3}[-]{0,1}\\d{4}';
                    if(product_id.length == 7 && product_id.match(reg)){
                        var result = [product_id.slice(0, 3), product_id.slice(3, 7)].join('-');
                        console.log('formatProductId '+result)
                        return result
                    } else if (product_id.length == 8 && product_id.match(reg)) {
                        return product_id
                    }
                }

                $("#search_button").click(function () {
                    getProduct($("#product_id").val())
                });
                //Nav Search end

                //Product Counter
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

                    var name = $(this).attr('name');
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
                //Product Counter end


                $(document).ready(function() {
                    // executes when HTML-Document is loaded and DOM is ready

                    displayCostAndQty()

                    $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseover(function () {
                        $(this).css("color", '#f60');
                    })

                    $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseleave(function () {
                        $(this).css("color", '#fff');
                    })

                    $('.navbar  #navbarSupportedContent .dropdown').mouseleave(function () {
                        $( '.navbar  #navbarSupportedContent .dropdown>a' ).css("color", '#5a5a5a');
                    });

                    $("a.nav-link").mouseleave(function () {
                        //$(this).css("color", '#5a5a5a');
                    })

                    $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseleave(function () {
                        $(this).css("color", '#ffffff');
                    })

// breakpoint and up
                    $(window).resize(function(){
                        if ($(window).width() >= 980){

                            // when you hover a toggle show its dropdown menu
                            $(".navbar .dropdown-toggle").hover(function () {
                                $(this).parent().toggleClass("show");
                                $(this).parent().find(".dropdown-menu").toggleClass("show");
                            });

                            // hide the menu when the mouse leaves the dropdown
                            $( ".navbar .dropdown-menu" ).mouseleave(function() {
                                $(this).removeClass("show");
                            });

                            // do something here
                        }
                    });



// document ready
                });

        </script>

        @include('includes.partials.ga')
    </body>
</html>
