@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div id="page-content">
        <div class="container mt-2">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/img/frontend/carousel/carousel_01.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/img/frontend/carousel/carousel_02.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/img/frontend/carousel/carousel_04.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <div class="row mt-3">
                <div class="col-md-12 col-lg-6">
                    <div class="card flex-row mb-3 box-shadow h-md-250 rounded-0 border-0" style="background-color: #b7a000; height: 222px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3 class="mb-2">
                                <a class="text-light align-content-center" href="#">{{ $block_1->title }}</a>
                            </h3>
                            <p class="card-text d-none d-sm-block text-white text-center">
                                {{ str_limit($block_1->text, $limit = 168, $end = '...') }}
                            </p>
                        </div>
                        <img class="card-img-right d-block" alt="Thumbnail [200x250]"
                             src="img/frontend/Wood_Desk.jpg" data-holder-rendered="true">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card flex-row mb-3 box-shadow h-md-250 rounded-0 border-0" style="background-color: #ec5d11; height: 222px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3 class="mb-2">
                                <a class="text-light align-content-center" href="#">{{ $block_2->title }}</a>
                            </h3>
                            <p class="card-text d-none d-sm-block text-white text-center">
                                {{ str_limit($block_2->text, $limit = 168, $end = '...') }}
                            </p>
                        </div>
                        <img class="card-img-right d-block d-sm-block img-fluid" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"
                             src="img/frontend/Wood_Desk.jpg" data-holder-rendered="true">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="card flex-row mb-3 box-shadow h-md-250 rounded-0 border-0" style="background-color: #962045; height: 222px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3 class="mb-2">
                                <a class="text-light align-content-center" href="#">{{ $block_3->title }}</a>
                            </h3>
                            <p class="card-text d-none d-sm-block text-center text-white">
                                {{ str_limit($block_3->text, $limit = 168, $end = '...') }}
                            </p>
                        </div>
                        <img class="card-img-right d-block d-sm-block" alt="Thumbnail [200x250]"
                             src="img/frontend/Wood_Desk.jpg" data-holder-rendered="true">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="card flex-row mb-3 h-md-250 rounded-0 border-0" style="background-color: #f8a829; height: 222px">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3 class="mb-2">
                                <a class="text-light" href="#">{{ $block_4->title }}</a>
                            </h3>
                            <p class="card-text d-none d-sm-block text-white text-center">
                                {{ str_limit($block_4->text, $limit = 168, $end = '...') }}
                            </p>
                        </div>
                        <img class="card-img-right d-block d-sm-block"  alt="Thumbnail [200x250]"
                             src="img/frontend/Wood_Desk.jpg" data-holder-rendered="true">
                    </div>
                </div>
            </div>

            <div class="card-columns">
                <div class="card rounded-0 border-0">
                    <img src="/img/frontend/index_page/left_top_desk.jpg" class="img-fluid card-img-top rounded-0" alt="...">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Card title that wraps to a new line</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card rounded-0 border-0">
                    <img src="/img/frontend/index_page/left_top_desk.jpg" class="img-fluid card-img-top rounded-0" alt="...">
                </div>
                <div class="card rounded-0 border-0">
                    <img src="/img/frontend/index_page/right_top_desk.jpg" class="img-fluid card-img-top rounded-0" alt="...">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card bg-primary text-white text-center p-3 rounded-0 border-0">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                        <footer class="blockquote-footer text-white">
                            <small>
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="card text-center rounded-0 border-0">
                    <div class="card-body bg-light">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has a regular title and short paragraphy of text below it.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="card rounded-0 border-0">
                    <img src="/img/frontend/index_page/left_tall_desk.jpg" class="card-img-top rounded-0" alt="...">
                </div>
                <div class="card p-3 text-right rounded-0 border-0 bg-light">
                    <blockquote class="blockquote mb-0">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer class="blockquote-footer">
                            <small class="text-muted">
                                Someone famous in <cite title="Source Title">Source Title</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>



            {{--        <div class="d-flex align-items-center bg-light">--}}
            {{--            <div class="p-2">--}}
            {{--                <img style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/left_top_mob.jpg?20181023" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <div class="d-flex align-items-center bg-light">--}}
            {{--            <div class="p-2">--}}
            {{--                <img style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/left_top_mob.jpg?20181023" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--            <div class="p-2">--}}
            {{--                <img class="" style="width:100%" src="https://mainline-website.s3.amazonaws.com/home_images/right_top_mob.jpg?-00011130" alt="1">--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>
    </div>


@endsection
