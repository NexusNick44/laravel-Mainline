<script>
    function unitPrice(unit = null) {
        if (unit == null) {
            var unit_type = $("#unit_type").val()
        } else {
            var unit_type = unit
        }

        switch (unit_type) {
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

    function unitQty(unit = null) {
        if (unit == null) {
            var unit_type = $("#unit_type").val()
        } else {
            var unit_type = unit
        }

        switch (unit_type) {
            @if(isset($product))
            case 'Box':
                //fires basic product discount if box value is 2 or more
                if ($("#quant").val() < 2)
                    undoBasicProduct()
                return Number($("#quant").val() * {{ $product->boxed_quantity }}).toFixed(2)
                break;
            case 'Pack':
                undoBasicProduct()
                return Number($("#quant").val() * {{ $product->pack_quantity }}).toFixed(2)
                break;
            case 'Length':
                undoBasicProduct()
                return Number($("#quant").val() * {{ isset($product->length) ? $product->length : 2.9 }}).toFixed(2)
                break;
            default:
                undoBasicProduct()
                return {{ $product->price }}
            @endif
        }
    }

    @if(isset($product))
    function undoBasicProduct() {
        $("#box_price").text({{isset($product->price_2) }})
    }

    function basicProduct() {
        //check if the product is a basic product and deduct 20%
        if ({{ isset( $product->basic_product) ? $product->basic_product : 0}}) {
            var deducted = {{ $product->price_2 }} *
            20 / 100
            var newPrice = {{ $product->price_2 }} -deducted
            console.log(newPrice.toFixed(2))
            $("#box_price").text('')
            $("#box_price").html('<s class="text-danger">{{ $product->price_2 }}</s> ' + newPrice.toFixed(2))
        }
    }

    @endIf

    function displayCostAndQty() {
        $("#length_qty").text('')
        $("#length_qty").text(unitQty() + 'm')
            .append('<span id="total_cost" class="float-right font-weight-bold">£' + (unitPrice() * $("#quant").val()).toFixed(2) + '</span>')
        //    call the better price function
        betterPrice()

    }

    function betterPrice() {
        //evaluate if the price can be bettered
        //display modal to see if customer want's the discount
        //get boxed values
        var totalBoxQyt = unitQty('Box') / $("#quant").val()
        var totalBoxPrice = unitPrice('Box')
        var totalPackQyt = unitQty('Pack') / $("#quant").val()
        var totalPackPrice = unitPrice('Pack')
        var totalLengthQyt = unitQty('Length') / $("#quant").val()
        var totalLengthPrice = unitPrice('Length')

        // console.log('Total Box Qty: ' + totalBoxQyt + ' Total Box Price: ' + Math.floor(totalBoxPrice))

        console.log('Total Box Qty: ' + totalBoxQyt % totalPackQyt + ' Total Box Price: ' + Math.floor(totalBoxPrice))

        var unit_type = $("#unit_type").val()

        switch (unit_type) {
            case 'Pack':
                if (unitQty() >= totalBoxQyt && unitPrice() >= Math.floor(totalBoxPrice)) {
                    $('#basicProductModal').modal('show')
                }
                break;
            case 'Length':
                if (unitQty() <= totalPackQyt && unitPrice() <= totalPackPrice) {
                    $('#basicProductModal').modal('show')
                }
                break;
            default:

        }

        if ($("#unit_type").val() != 'Box') {
            //console.log(unitQty('Box'))

        } else {
            if ($("#quant").val() >= 2)
                basicProduct()
        }
    }


    $("#add_to_basket").click(function (e) {
        e.preventDefault();

        $('#div').removeClass('animated shake')

        $("#price").val(unitPrice())

        var product = $("#product_form").serialize()
        $.ajax({
            type: 'post',
            url: '/addtocart',
            data: product,
            success: function (data) {
                $('#div').load(" #div > *")
                $('#div').addClass('animated shake')

            }
        }).done(function () {

        }).fail(function () {
            console.log('NO!!!')
        })
        console.log(product)
    });

    //Nav Search
    $("#product_id").on('keydown ', function (event) {
        if (event.which === 13) {
            getProduct($("#product_id").val())
        }
    });

    function getProduct(product_id) {

        if (formatProductId(product_id)) {
            window.location.href = "/product/" + formatProductId(product_id);
        }
    }

    function formatProductId(product_id) {
        //console.log(product_id)
        var reg = '[a-zA-Z0-9]{3}[-]{0,1}\\d{4}';
        if (product_id.length == 7 && product_id.match(reg)) {
            var result = [product_id.slice(0, 3), product_id.slice(3, 7)].join('-');
            console.log('formatProductId ' + result)
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
    $('.btn-number').click(function (e) {
        e.preventDefault();
        fieldName = $(this).attr('data-field');
        type = $(this).attr('data-type');
        var input = $("input[name='" + fieldName + "']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if (type == 'minus') {

                if (currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if (parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if (type == 'plus') {

                if (currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if (parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });

    $('.input-number').focusin(function () {
        $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function () {

        minValue = parseInt($(this).attr('min'));
        maxValue = parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        var name = $(this).attr('name');
        if (valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
        } else {
            alert('Sorry, the minimum value was reached');
            $(this).val($(this).data('oldValue'));
        }
        if (valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
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


    $(document).ready(function () {
        // executes when HTML-Document is loaded and DOM is ready

        displayCostAndQty()

        $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseover(function () {
            $(this).css("color", '#f60');
        })

        $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseleave(function () {
            $(this).css("color", '#fff');
        })

        $('.navbar  #navbarSupportedContent .dropdown').mouseleave(function () {
            $('.navbar  #navbarSupportedContent .dropdown>a').css("color", '#5a5a5a');
        });

        $("a.nav-link").mouseleave(function () {
            //$(this).css("color", '#5a5a5a');
        })

        $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.nav-link").mouseleave(function () {
            $(this).css("color", '#ffffff');
        })

// breakpoint and up
        $(window).resize(function () {
            if ($(window).width() >= 980) {

                // when you hover a toggle show its dropdown menu
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show");
                });

                // hide the menu when the mouse leaves the dropdown
                $(".navbar .dropdown-menu").mouseleave(function () {
                    $(this).removeClass("show");
                });

                // do something here
            }
        });


// document ready
    });
</script>
