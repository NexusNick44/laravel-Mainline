@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . $product->product_id )

@section('content')
    <div id="page-content">

        {{ $cart_content->where('id', $product->product_id)->where('options.unit_type', 'Box')}}


        <div class="container mt-2">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card border-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold"
                                        style="color: #f60">{{ $product->product_id }}</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <p class="card-text m-0 text-black-50">Profile: <span
                                            class="float-right font-weight-bold text-dark">{{ $product->product_id }}</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Colour: <span
                                            class="float-right font-weight-bold text-dark">{{ $product->product_id }}</span>
                                    </p>
                                    <br>
                                    <br>
                                    <p class="card-text m-0 text-black-50">Box Price: <span
                                            class="float-right font-weight-bold text-dark">£<span id="box_price">{{ $product->price_2 }}</span> per m</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Pack Price: <span
                                            class="float-right font-weight-bold text-dark">£<span id="pack_price">{{ $product->pack_price }}</span> per m</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Length Price: <span
                                            class="float-right font-weight-bold text-dark">£<span id="length_price">{{ $product->price }}</span> per m</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                    <p class="card-text m-0 text-black-50">Width: <span
                                            class="float-right font-weight-bold text-dark">{{ $product->width }}mm</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Height: <span
                                            class="float-right font-weight-bold text-dark">{{ $product->height }}mm</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Rebate: <span
                                            class="float-right font-weight-bold text-dark">{{ $product->rebate }}mm</span>
                                    </p>
                                    <br>
                                    <p class="card-text m-0 text-black-50">Box: <span
                                            class="float-right font-weight-bold text-dark"><span id="boxed_quantity">{{ $product->boxed_quantity }}</span>m</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Pack: <span
                                            class="float-right font-weight-bold text-dark"><span id="pack_quantity">{{ $product->pack_quantity }}</span>m</span>
                                    </p>
                                    <p class="card-text m-0 text-black-50">Length: <span
                                            class="float-right font-weight-bold text-dark"><span id="length">{{ isset($product->length) ? $product->length : 2.9 }}</span>m</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card border-0">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row flex-column-reverse flex-md-row pt-5">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card border-0">
                        <div class="row">

                            <div class="col-sm-6 col-md-6">
                                <form id="product_form" method="POST">
                                    @csrf
                                    <input name="product_id" value="{{ $product->product_id }}" hidden>
                                    <input id="price" name="price" value="1" hidden>
                                    <div class="card-body">
                                        <p class="card-text m-0">Order by
                                            <span class="float-right">
                                                <select onchange="displayCostAndQty()" id="unit_type" class="form-control" name="unit_type">
                                                    <option>Box</option>
                                                    <option selected>Pack</option>
                                                    <option>Length</option>
                                                    <option>Metre</option>
                                                </select>
                                            </span>
                                        </p>
                                        <br>
                                        <div class="input-group">
                                            <p class="pr-5">Quantity</p>
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number border"
                                                        disabled="disabled" data-type="minus" data-field="quant">
                                                    <span class="fas fa-minus-circle orange-text"></span>
                                                </button>
                                            </span>
                                            <input onchange="displayCostAndQty()" id="quant" type="text" name="quant" class="form-control input-number" value="1" min="1" max="100">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number border" data-type="plus" data-field="quant">
                                                    <span class="fas fa-plus-circle orange-text"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <div><p id="length_qty" class="w-100"></p></div>
                                        <button id="add_to_basket" class="btn btn-orange text-white mt-3 btn-block" type="submit">
                                            <i class="fas fa-shopping-basket text-white"></i> Add to Basket
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card border-0">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--Bottom of page--}}
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="basicProductModal" tabindex="-1" role="dialog" aria-labelledby="basicProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="basicProductModalLabel">Better Value</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button id="choose_this_option" type="button" class="btn btn-orange text-white">Choose this option</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No Thanks</button>

                </div>
            </div>
        </div>
    </div>


@endsection
