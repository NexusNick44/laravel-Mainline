<div class="container">
    <nav class="navbar navbar-expand-md navbar-light pt-0 pb-0">
        <h3 class="my-auto">
            <a href="{{ route('frontend.index') }}" class="navbar-brand">
{{--                <img src="/img/frontend/logo.png" alt="Husqui_Logo">--}}
                <div class="logo"></div>
                <div class="logo-text">picture framing supplies</div>
            </a>
        </h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100 flex-md-column" id="navbarCollapse">
            <ul class="navbar-nav ml-auto small mb-2 mb-md-5">

                @if(config('locale.status') && count(config('locale.languages')) > 1)
                    {{--                <li class="nav-item dropdown">--}}
                    {{--                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown"--}}
                    {{--                       aria-haspopup="true" aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})</a>--}}

                    {{--                    @include('includes.partials.lang')--}}
                    {{--                </li>--}}
                @endif

                @auth
                    {{--                <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a></li>--}}
                    <li class="nav-item"><a href="{{ route('frontend.user.account') }}" class="nav-link  {{ active_class(Active::checkRoute('frontend.user.account')) }}">
                            <i class="far fa-user"></i> @lang('navs.frontend.user.account')</a></li>
                @endauth

                @guest
                    <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">
                            <i class="fas fa-sign-in-alt"></i> @lang('navs.frontend.login')</a></li>

                    @if(config('access.registration'))
                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">
                                <i class="far fa-address-card"></i> @lang('navs.frontend.register')</a></li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                            @can('view backend')
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    <i class="fas fa-unlock-alt"></i> @lang('navs.frontend.user.administration')</a>
                            @endcan

                            {{--                        <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">--}}
                            {{--                            <i class="far fa-user"></i> @lang('navs.frontend.user.account')</a>--}}
                            <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> @lang('navs.general.logout')</a>
                        </div>
                    </li>
                @endguest
                <div id="div">
                    <li class="nav-item">
                        <a href="{{route('frontend.cart')}}" class="nav-link">
                            <i class="fas fa-shopping-basket"></i>
                            <span id="basket_badge" class="badge badge-brand-colour ml-1">{{ Cart::count() }}</span> Basket
                        </a>
                    </li>
                </div>
                <li class="nav-item"><a href="tel:01949861000" class="nav-link">
                        <i class="fa fa-phone thin-pad-right color-brand-light" aria-hidden="true"></i> 01949 861000</a></li>

                <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">
                        <i class="far fa-address-book"></i> @lang('navs.frontend.contact')</a></li>
            </ul>
{{--            <form class="form-inline ml-auto" id="search_form">--}}
                <div class="input-group w-25">
                    <input id="product_id" type="text" class="form-control border-dark" placeholder="Search">
                    <div class="input-group-append">
                        <button id="search_button" class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div>
{{--            </form>--}}
    {{--        <div class="input-group">--}}
    {{--            <ul class="navbar-nav small my-auto">--}}
    {{--                <li class="nav-item active">--}}
    {{--                    <a class="nav-link" href="#">Shop</a>--}}
    {{--                </li>--}}
    {{--                <li class="nav-item">--}}
    {{--                    <a class="nav-link" href="#">Products</a>--}}
    {{--                </li>--}}
    {{--                <li class="nav-item">--}}
    {{--                    <a class="nav-link" href="#">Team</a>--}}
    {{--                </li>--}}
    {{--                <li class="nav-item">--}}
    {{--                    <a class="nav-link" href="#">About</a>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
        </div>
    </nav>

{{--    <nav class="navbar navbar-expand-md navbar-light justify-content-start pt-0">--}}
{{--        <ul class="navbar-nav flex-lg-row flex-sm-grow-0 flex-row">--}}
{{--            <li class="nav-item active">--}}
{{--                <a class="nav-link" href="#">Husqui Skirting Boards</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Husqui Architrave</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Husqui Scotia</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="#">Husqui Accessories</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </nav>--}}
    <nav class="navbar navbar-expand-lg pl-0">
{{--        <a class="navbar-brand" href="#">Mega Dropdown</a>--}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category 1
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="text-uppercase text-white">Category 1</span>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <a href="">
                                        <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt="" class="img-fluid">
                                    </a>
                                    <p class="text-white">Short image call to action</p>

                                </div>
                                <!-- /.col-md-4  -->
                            </div>
                        </div>
                        <!--  /.container  -->


                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category 2
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="text-uppercase text-white">Category 2</span>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <a href="">
                                        <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt="" class="img-fluid">
                                    </a>
                                    <p class="text-white">Short image call to action</p>

                                </div>
                                <!-- /.col-md-4  -->
                            </div>
                        </div>
                        <!--  /.container  -->


                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category 3
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <span class="text-uppercase text-white">Category 3</span>
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#">Active</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Link item</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.col-md-4  -->
                                <div class="col-md-4">

                                    <a href="">
                                        <img src="https://dummyimage.com/200x100/ccc/000&text=image+link" alt="" class="img-fluid">
                                    </a>
                                    <p class="text-white">Short image call to action</p>

                                </div>
                                <!-- /.col-md-4  -->
                            </div>
                        </div>
                        <!--  /.container  -->


                    </div>
                </li>

            </ul>
        </div>
    </nav>

</div>
<div class="red-bottom"></div>
