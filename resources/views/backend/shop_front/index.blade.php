@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Nav Menu Bar
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Edit The Menu Bar</h5>
                            <img class="img-fluid" src="/img/backend/shop_front/menu_bar.png">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <p class="card-text">Change the menu text.</p>
                            <a href="/admin/shop-front/blocks" class="btn btn-primary">Edit Menu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Carousel
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Edit The Carousel</h5>
                            <img class="img-fluid" src="/img/backend/shop_front/carousel.png">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <p class="card-text">Change the images or add text.</p>
                            <a href="/admin/shop-front/blocks" class="btn btn-primary">Edit Carousel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    4 Blocks
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Edit This Feature</h5>
                            <img class="img-fluid" src="/img/backend/shop_front/4-blocks.png">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <p class="card-text">Change the images or add text.</p>
                            <a href="/admin/shop-front/blocks" class="btn btn-primary">Edit feature</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Pintrest
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">Edit This Feature</h5>
                            <img class="img-fluid" src="/img/backend/shop_front/pintrest.png">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="card-body">
                            <p class="card-text">Change the images or add text.</p>
                            <a href="#" class="btn btn-primary">Edit feature</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
