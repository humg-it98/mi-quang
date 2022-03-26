@extends('layout.home')

@section('style')
    <style>
        footer .top-footer {
            position: relative;
            /* padding: 75px 0; */
            /* background-color: #f8da45; */
            /* margin-bottom: 10em;
            margin-top: em; */

        }

        .fixed-bg {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
        }
        .bg3 {
            background-image: url('user/teamplate/img/bg_footer.png');
        }
        .wid-payment .thanhtoan {
            width: 241px;
        }
        .ft_center {
            margin-top: 7em;
        }




        footer .top-footer .phone-div {
            display: inline-block;
            width: 150px;
            position: absolute;
            top: -75px;
            left: 50%;
            z-index: 99;
            -webkit-transform: translateX(-50%);
            -ms-transform: translateX(-50%);
            transform: translateX(-50%);
            height: 150px;
            background-color: #fff;
            -webkit-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
        }
        /* @media  all and (min-width:992px) */
        .col-lg-3 {
            -ms-flex: 0 0 25%;
            flex: 0 0 25%;
            max-width: 25%;
        }
        footer .top-footer .widget-payment .wid-payment {
            margin-bottom: 0;
        }
        footer .top-footer .widget-payment :last-child.wid-payment {
            margin-bottom: 0px;
        }
        footer .top-footer .widget-payment .wid-payment h4 {
            color: #fff;
            font-size: 16px;
            text-transform: capitalize;
            margin-bottom: 17px;
        }
        footer .top-footer .widget-payment .wid-payment ul li {
            display: inline-block;
            margin-right: 6px;
        }
        footer .top-footer .widget-payment .wid-payment ul li:last-child {
            margin-right: 0px;
        }

        footer .top-footer .widget-payment .wid-payment ul li img {
            border-radius: 5px;
            width: 190px;
        }
        .text-center {
            text-align: center !important;
        }
        footer .top-footer .widget-contact {
            padding-top: 38px;
        }

        footer .top-footer .widget-contact > h2 {
            color: #fff;
            font-size: 24px;
            line-height: 29px;
            max-width: 40%;
            margin: 0 auto;
            margin-bottom: 15px;
        }
        footer .top-footer .widget-contact p {
            color: rgb(0, 0, 0);
            margin-bottom: 17px;
            font-size: 1em;
            line-height: 32px;
        }

        footer .top-footer .widget-contact strong {
            display: block;
            color: #fff;
            font-size: 20px;
        }
        footer .top-footer .widget-contact > h2 span {
            color: #d8ab37;
        }
        footer .top-footer .widget-about > img {
            margin-bottom: 9px;
            margin-left: 67px;
            width: 120px;
        }
        footer .top-footer .widget-about > h4 {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            text-transform: capitalize;
            margin-bottom: 22px;
        }
        footer .top-footer .widget-about p {
            color: rgb(0, 0, 0);
        }
        footer .top-footer .phone-div .border-circle {
            display: inline-block;
            width: 124px;
            position: relative;
            top: 13.5px;
            left: 13.5px;
            border-radius: 50%;
            height: 124px;
        }
        footer .top-footer .phone-div .border-circle::before {
            content: "";
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            border: 2px solid #D8AB37;
            height: 100%;
            -webkit-border-radius: 50%;
            -ms-border-radius: 50%;
            border-radius: 50%;
            filter: blur(4px);
        }
        footer .top-footer .phone-div .border-circle .phone-circle {
            position: relative;
            left: 22px;
            top: 22px;
            display: inline-block;
            width: 80px;
            height: 80px;
            -webkit-border-radius: 50px;
            -ms-border-radius: 50px;
            border-radius: 50px;
            text-align: center;
            line-height: 110px;
            text-align: center;
            filter: blur(0);
            background: linear-gradient(93.93deg, #fde644 0%, #fda300 100%);
            position: relative;
            z-index: 2;
        }
        footer .top-footer .phone-div .border-circle .phone-circle .ext-link {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        .gotop {
            margin-bottom: 30px;
            width: 80px;
        }
    </style>

    <style>

        .header {
            position: absolute;
            width: 100%;
            z-index: 999;
        }

        .navbar-custom {
            background: var(--main-color);
            padding: 15px 15px 15px 40px;
            border-radius: 50px;
            align-items: center;
            margin-left: auto;
        }
        /* color nav begin */
        .navbar-custom li {
            margin: 0 10px;
            position: relative;
        }
        .navbar-custom li a {
            font-size: 16px;
            color: #ffffff !important;
            position: relative;
            transition: all 0.3s;
            font-family: 'Roboto Slab', serif;
        }
        .navbar-custom li a:hover {
            color: rgb(0, 0, 0) !important;
        }
        .navbar-custom li:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: rgb(0, 0, 0);
            left: 0px;
            bottom: 0px;
            transition: all 0.3s;
        }
        /* color nav begin */
        .navbar-custom li:last-child {
            margin: 0;
        }
        .navbar-custom li:last-child::before {
            background: transparent;
        }
        .navbar-custom li:hover::before {
            width: 100%;
        }
        .navbar-custom li.active:before {
            width: 100%;
        }
        .navbar-custom li:hover a {
            color: #fff;
        }
        .navbar-nav .dropdown-menu {
            background: var(--main-color);
        }
        .dropdown-item {
            transition: all 0.3s;
        }
        .dropdown-item:hover {
            border-bottom: 1px solid #fff;
            background: transparent;
        }
        .last-menu-bg {
            background-color: rgb(0, 0, 0);
            color: rgb(255, 255, 255);
            border-radius: 50px;
            padding: 5px 25px;
        }
        .last-menu-bg span a {
            color: rgb(255, 255, 255) !important;
            transition: all 0.3s;
        }
        .last-menu-bg span a:hover {
            color: rgb(255, 223, 42) !important;
        }
        .navbar-light .navbar-toggler {
            color: rgb(255, 223, 42);
            border-color: rgb(255, 223, 42);
            outline: 0;
            float: left;
            margin-left: 28em;
            margin-bottom: 0.2em;
            float: top;
            top: 2em;
            margin-top: 23px;
        }
        .navbar-light .navbar-toggler:hover,
        .navbar-light .navbar-toggler:focus {
            color: rgb(255, 222, 73);
            border-color: rgb(255, 237, 73);
        }
        .navbar-toggler {
            padding: 0.55rem 1rem;
        }

        .navbar-brand {
            display: inline-block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            font-size: 1.25rem;
            line-height: inherit;
            white-space: nowrap;
        }
        .sticky {
            position: fixed !important;
            width: 100% !important;
            left: 0 !important;
            top: 0 !important;
            z-index: 9999 !important;
            border-color: #bdb7b7 !important;
            box-shadow: 0 0 5px rgb(0 0 0 / 80%) !important;
            transition: all 0.3s !important;
            background-color: rgb(247, 243, 243)!important;
        }
        .header .logo_sticky {
            display: none;
        }
        /* color nav before */
        .sticky .logo_normal {
            display: none;
        }

        .sticky .logo_sticky {
            display: inline-block;
        }
        .sticky .navbar-custom li a {
            font-size: 16px;
            color: #000000 !important;
            position: relative;
            transition: all 0.3s;
        }

        .sticky .navbar-custom li a:hover {
            color: rgb(255, 255, 255) !important;
        }
        .sticky .navbar-custom li:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: rgb(255, 255, 255);
            left: 0px;
            bottom: 0px;
            transition: all 0.3s;
        }


        .sticky .last-menu-bg {
            background-color: rgb(245, 245, 245);
            color: rgb(0, 0, 0);
            border-radius: 50px;
            padding: 5px 25px;
        }
        .sticky .last-menu-bg span a {
            color: rgb(0, 0, 0) !important;
            transition: all 0.3s;
        }
        .sticky .last-menu-bg span a:hover {
            color: var(--main-color) !important;
        }
        /* color nav before */


        #logo {
            float: left;
        }

        @media (max-width: 991px) {
            #logo {
                float: none;
                width: 100%;
                text-align: center;
            }
            #logo img {
                width: auto;
                height: 45px;
                float: left;
                margin-left: 1em;
                margin-top: 0.5em;
            }
        }

    </style>
@endsection

@section('main-home')
    <main>
        <!--/slider-->
        <div id="carousel-home">
            <div class="owl-carousel owl-theme">
                @if($slider)
                    @foreach($slider as $slider)
                    <div class="owl-slide cover lazy" data-bg="url({{$slider->sli_avatar_path}})">
                        <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                            <div class="container">
                                <div class="row justify-content-center justify-content-md-start">
                                    <div class="col-lg-12 static">
                                        <div class="slide-text text-right white"><br>
                                            <h2 class="owl-slide-animated owl-slide-title">{!! $slider->sli_name  !!}</h2><br>

                                            <p class="owl-slide-animated owl-slide-subtitle" style="font-size: 0.8em">
                                               {!! $slider->sli_description !!}
                                            </p>
                                            <div class="owl-slide-animated owl-slide-cta">
                                                <a class="btn_1 btn_scroll" href="{{ $slider->sli_url }}" role="button">{{ $slider->sli_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <!--/owl-slide-->
            </div>
            <div id="icon_drag_mobile"></div>
        </div>
        <!--/ hết phần 1-->

        <!-- menu banner-->
        <ul class="clearfix" id="banners_grid">
            @if($menu)
                @foreach($menu as $menu)
                <li>
                <a href="{{$menu->m_url }}" class="img_container">
                    <img src="{{$menu->m_avatar_path}}" data-src="{{$menu->m_avatar_path}}" alt="Error image" class="lazy loaded" data-was-processed="true">
                    <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)" style="background-color: rgba(0, 0, 0, 0.5);">
                        <h3> {{$menu->m_name }}</h3>
                        <p> {{$menu->m_description }}</p>
                    </div>
                </a>
            </li>
                @endforeach
            @endif
        </ul>

        <!--/ hết phần menu banner-->

        <!--/phần 2-->
        <div class="pattern_2">
            <div class="container margin_120_100 home_intro">
                @if($about)
                    @foreach($about as $about)
                    <div class="row justify-content-center d-flex align-items-center">
                        <div class="col-lg-5 text-lg-center d-none d-lg-block" data-cue="slideInUp">
                            <figure>
                                <img style="border-radius: 20px" src="{{$about->ab_img_path}}" data-src="{{$about->ab_img_path}}" width="654" height="740" alt="" class="img-fluid lazy">
                                <a href="https://www.youtube.com/watch?v=7quSLJSJ6Xw" class="btn_play" data-cue="zoomIn" data-delay="500" data-autoplay="true" data-vbtype="video"><span class="pulse_bt"><i class="arrow_triangle-right"></i></span></a>
                            </figure>
                        </div>
                        <div class="col-lg-5 pt-lg-4" data-cue="slideInUp" data-delay="500">
                            <div class="main_title">
                                <p>
                                    {!! $about->ab_description  !!}
                                </p>
                            </div>
                            <br>
                            <p>
                                <img src="{{asset('user/teamplate/img/chukymua.jpg')}}" width="140" height="50" alt="" style="left: 10em;">
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
                <!--/row -->
            </div>
            <!--/container -->
        </div>
        <!--/phần 2-->


        <!--/pattern_2 -->

        <!--/phần 3-->
        <div class="bg_gray">
            <div class="container margin_120_100" data-cue="slideInUp">
                <div class="main_title center mb-5">
                    <span><em></em></span>
                    <h2>Thực đơn hàng ngày của chúng tôi</h2>
                </div>

                <!-- /main_title -->
                <div class="banner lazy" data-bg="url(user/teamplate/img/banner.jpg)">
                    <div class="wrapper d-flex align-items-center justify-content-between opacity-mask"
                         data-opacity-mask="rgba(0, 0, 0, 0.5)">
                        <figure class="d-none d-lg-block">
                            <img src="{{asset('user/teamplate/img/TypoBanner.png')}}" alt="" width="400" height="350" class="img-fluid">
                        </figure>
                        <div>
                            <small>ƯU ĐÃI ĐẶC BIỆT</small>
                            <h3>Thưởng Thức Mì Quảng chỉ với giá 39.999đ</h3>
                            <p>- Quý khách nên đặt chỗ trước 4 giờ để được phục vụ tốt nhất -</p>
                            <a href="datban.html" class="btn_1">Đặt chổ ngay</a>
                        </div>
                    </div>
                    <!-- /wrapper -->
                </div>
                <!-- /banner -->

                <div class="container">
                    <div class="food-menu">
                        <!-- Đồ uống mới -->
                        <div class="container">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Thực đơn mới nhất</h2>
                            </div>
                            <div class="row small-gutters">
                                @if($product_new)
                                    @foreach($product_new as $product_new)
                                    <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                                        <div class="grid_item">
                                            <figure>
                                                <a href="{{route('home.thucdon.details',$product_new->pro_slug)}}">
                                                    <img class="img-fluid lazy" src="{{$product_new->pro_img_path}}" data-src="{{$product_new->pro_img_path}}" alt="loihinh">
                                                    <div class="add_cart"><span class="btn_1">Thêm vô giỏ hàng</span></div>
                                                </a>
                                            </figure>
                                            <div class="rating">
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <i class="icon_star voted"></i>
                                                <br>
                                                <em>0 Đánh giá</em>
                                            </div>

                                            <a href="{{route('home.thucdon.details',$product_new->pro_slug)}}">
                                                <h3>{{$product_new->pro_name }}</h3>
                                            </a>
                                            <div class="price_box">
                                                <span class="new_price">{{number_format($product_new->pro_sale) . 'đ'}}</span>
                                                <span class="old_price">{{number_format($product_new->pro_price) . 'đ'}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="container">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Mỳ Quảng các loại</h2>
                            </div>
                            <div class="row small-gutters">
                                @if($product)
                                    @foreach($product as $product)
                                        <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                                            <div class="grid_item">
                                                <figure>
                                                    <a href="{{route('home.thucdon.details',$product->pro_slug)}}">
                                                        <img class="img-fluid lazy" src="{{$product->pro_img_path}}" data-src="{{$product->pro_img_path}}" alt="loihinh">
                                                        <div class="add_cart"><span class="btn_1">Thêm vô giỏ hàng</span></div>
                                                    </a>
                                                </figure>
                                                <div class="rating">
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <br>
                                                    <em>0 Đánh giá</em>
                                                </div>

                                                <a href="{{route('home.thucdon.details',$product->pro_slug)}}">
                                                    <h3>{{$product->pro_name }}</h3>
                                                </a>
                                                <div class="price_box">
                                                    <span class="new_price">{{number_format($product->pro_sale) . 'đ'}}</span>
                                                    <span class="old_price">{{number_format($product->pro_price) . 'đ'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="container">
                            <div class="main_title">
                                <span><em></em></span>
                                <h2>Bánh tráng thịt heo các loại</h2>
                            </div>
                            <div class="row small-gutters">
                                @if($product_cate)
                                    @foreach($product_cate as $product_cate)
                                        <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                                            <div class="grid_item">
                                                <figure>
                                                    <a href="{{route('home.thucdon.details',$product_cate->pro_slug)}}">
                                                        <img class="img-fluid lazy" src="{{$product_cate->pro_img_path}}" data-src="{{$product_cate->pro_img_path}}" alt="loihinh">
                                                        <div class="add_cart"><span class="btn_1">Thêm vô giỏ hàng</span></div>
                                                    </a>
                                                </figure>
                                                <div class="rating">
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <i class="icon_star voted"></i>
                                                    <br>
                                                    <em>0 Đánh giá</em>
                                                </div>

                                                <a href="{{route('home.thucdon.details',$product_cate->pro_slug)}}">
                                                    <h3>{{$product_cate->pro_name}}</h3>
                                                </a>
                                                <div class="price_box">
                                                    <span class="new_price">{{number_format($product_cate->pro_sale) . 'đ'}}</span>
                                                    <span class="old_price">{{number_format($product_cate->pro_price) . 'đ'}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <p class="text-center"><a href="{{route('home.thucdon.index')}}" class="btn_1 outline" data-cue="zoomIn">Xem thêm thực đơn</a></p>
                        </div>
                    </div>
                </div>
                <!-- /row -->

            </div>
            <!-- /container -->
        </div>
        <!--/phần 3-->

        <!--==================== -bài viết mới nhất- ====================-->
        <div class="pattern_2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main_title">
                            <span><em></em></span>
                            <h2>Bài viết mới nhất</h2>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                @if($post)
                                    @foreach($post as $post)
                                    <div class="col-md-4" data-cue="slideInUp">
                                    <article class="blog">
                                        <figure>
                                            <a href="{{route('home.blog.details',$post->id)}}">
                                                <img style="border-radius: 10px" src="{{$post->post_avatar}}" alt="">
                                                <div class="preview"><span>Đọc thêm</span></div>
                                            </a>
                                        </figure>
                                        <div class="post_info">
                                            <small>{{ date("d/m/Y H:i:s", strtotime($post->created_at)) }}</small>
                                            <h2><a href="{{route('home.blog.details',$post->id)}}"></a></h2>
                                            <p>{{$post->post_content }}</p>

                                        </div>
                                    </article>
                                    <!-- /article -->
                                    </div>
                                    @endforeach
                                @endif


                            </div>
                            <!-- /row -->
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <!--==================== -End bài viết mới nhất- ====================-->
    </main>
@endsection
