<script>

    var newPrice = false;

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
            $("#box_price").text({{ $product->price_2 }})
        }

        function basicProduct(display = true) {
            //check if the product is a basic product and deduct 20%
            if ({{ $product->basic_product ? $product->basic_product : 0 }}) {
                var deducted = {{ $product->price_2 }} * 20 / 100
                newPrice = {{ $product->price_2 }} - deducted
                //console.log(newPrice.toFixed(2))
                if(display){
                    $("#box_price").text('')
                    $("#box_price").html('<s class="text-danger">{{ $product->price_2 }} </s>' + newPrice.toFixed(2))
                    $("#total_cost").text('£' + (newPrice.toFixed(2) * unitQty()).toFixed(2))
                }
                return newPrice.toFixed(2)
            }
            newPrice = false;
            return $("#box_price").text()
        }

    @endIf

    function displayCostAndQty() {
        $("#length_qty").text('')
        $("#length_qty").text(unitQty() + 'm')
            .append('<span id="total_cost" class="float-right font-weight-bold">£' + (unitPrice() * $("#quant").val()).toFixed(2) + '</span>')
        //    call the better price function
        betterPrice()

    }

    function getCartContents(unit, handleData) {

        var product = $("#product_form").serialize() + "&unit_search=" + unit

        $.ajax({
            type: 'post',
            url: '/cart_contents',
            data: product,
            success: function (data) {
                handleData(data)
            }
        }).done(function (data) {

        }).fail(function () {
            console.log('NO!!!')
        });

    }


    function betterPrice() {

        var cartProduct = ''

        getCartContents('Box', function(output){
            // here you use the output
            cartProduct = output
            console.log(cartProduct)
        });

        //evaluate if the price can be bettered
        //display modal to see if customer want's the discount
        //get boxed values
        var totalBoxQyt = (unitQty('Box') / $("#quant").val()), // plus any boxes in the cart needs adding
            totalBoxPrice = unitPrice('Box'),
            totalPackQyt = unitQty('Pack') / $("#quant").val(),
            totalPackPrice = unitPrice('Pack'),
            totalLengthQyt = unitQty('Length') / $("#quant").val(),
            totalLengthPrice = unitPrice('Length'),
            costOfBoxes = (Math.ceil(unitQty() / totalBoxQyt) * totalBoxPrice).toFixed(2),
            unit_type = $("#unit_type").val()

        //checks if there's a basic product discount only if 2 or more boxes are required
        if(Math.ceil(unitQty() / totalBoxQyt) >= 2){

            costOfBoxes = (Math.ceil(unitQty() / totalBoxQyt) * (totalBoxQyt * basicProduct(false)) ).toFixed(2)
            console.log(totalBoxQyt)
        }

        switch (unit_type) {
            case 'Pack':
                if ((totalPackPrice * $("#quant").val()) >= costOfBoxes) {
                    unit_change = 'Box'
                    $('#basicProductModal').modal('show')
                    $('#basicProductModal .modal-body').html('<p>It would be cheaper for you to order by the box:</p>' +
                         '<p class="orange-text"><span id="boxes">' + Math.ceil(unitQty() / totalBoxQyt) + '</span> Boxes (' + (totalBoxQyt * Math.ceil(unitQty() / totalBoxQyt)).toFixed(1) + 'm)' +
                        ' = £' + costOfBoxes + '</p>')
                }
                else if ((totalPackPrice * $("#quant").val()) >= (costOfBoxes * 0.7)) {
                    unit_change = 'Box'
                    $('#basicProductModal').modal('show')
                    $('#basicProductModal .modal-body').html('<p>You may consider it better value to order by the box:</p>' +
                        '<p class="orange-text"><span id="boxes">' + Math.ceil(unitQty() / totalBoxQyt) + '</span> Boxes (' + (totalBoxQyt * Math.ceil(unitQty() / totalBoxQyt)).toFixed(1) + 'm)' +
                        ' = £' + costOfBoxes + '</p>')
                }
                break;
            case 'Length':

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

    $("#choose_this_option").click(function (e) {
        e.preventDefault();

        $('#basicProductModal').modal('hide')
        $('#quant').val($('#boxes').text())
        $('#unit_type').val(unit_change)
        //update the display under the add to basket button
        displayCostAndQty()
    })


    $("#add_to_basket").click(function (e) {
        e.preventDefault();

        $('#div').removeClass('animated shake')

        $("#price").val(newPrice ? (newPrice.toFixed(2) * unitQty() / $("#quant").val()).toFixed(2) : unitPrice())

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

        var unit_change = ''
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

        $(".navbar #navbarSupportedContent .navbar-nav>.nav-item").mouseleave(function () {
            //$('.navbar  #navbarSupportedContent a').css("color", '#5a5a5a');
        })

        $(".navbar #navbarSupportedContent .navbar-nav>.nav-item>.dropdown>.nav-link").mouseleave(function () {
            //$('.navbar  #navbarSupportedContent .dropdown a').css("color", '#ffffff');
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
