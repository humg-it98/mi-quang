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
    <main class="pattern_2">
        <div class="hero_single inner_pages background-image" data-background="url({{$product->pro_img_path}})">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>{{$product->pro_name}}</h1> <br>
                            <ul>
                                <li style="display: inline-block;position: relative;padding: 0 16px 0 23px;"><a href="/" title="">Trang chủ</a></li>/
                                <li style="display: inline-block;position: relative;padding: 0 16px 0 23px;"><a href="thucdon.html" title="">Thực đơn</a></li>/
                                <li style="display: inline-block;position: relative;padding: 0 16px 0 23px;"><span>Chi tiết sản phẩm</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /Endhero_single -->
        <div class="container margin_60_40">
            <div class="row">
                <div class="col-lg-6 magnific-gallery">
                    <p>
                        <a href="{{$product->pro_img_path}}" title="Photo title" data-effect="mfp-zoom-in"><img src="{{$product->pro_img_path}}" alt="" class="img-fluid"></a>
                    </p>
                </div>
                <div class="col-lg-6" id="sidebar_fixed">
                    <div class="prod_info">
                        <span class="rating">
                            <i class="icon_star voted "></i>
                            <i class="icon_star voted "></i>
                            <i class="icon_star voted "></i>
                            <i class="icon_star voted "></i>
                            <i class="icon_star voted "></i>
                            <em style="font-size: 1.2em">0 Đánh giá</em>
                        </span>
                        <h1>{{$product->pro_name}}</h1>
                        <p>{{$product->pro_content}}</p>
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">
                                <span class="new_price">{{number_format($product->pro_sale).'đ'}}</span>
                                <span class="old_price">{{number_format($product->pro_price).'đ'}}</span>
                            </div>
                        </div>

                        <form action="{{route('home.cart.add')}}" method="post">
                            @csrf
                            <div class="prod_options">
                                <div class="row">
                                    <label class="col-xl-5 col-lg-5  col-md-6 col-6">
                                        <strong>Số lượng</strong>
                                    </label>
                                    <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                        <div class="numbers-row">
                                            <input type="number" value="1" id="quantity_1" class="qty2" name="num_product">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="pro_id" value="{{$product->id}}">
                            <input type="hidden" name="pro_name" value="{{$product->pro_name}}">
                            <input type="hidden" name="pro_sale" value="{{$product->pro_sale}}">
                            <input type="hidden" name="pro_avatar" value="{{$product->pro_img_path}}">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <button type="submit" class="btn_add_to_cart btn_1c">Thêm vô giỏ hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /prod_info -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /Endcdetail -->

        <div class="tabs_product">
            <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Miêu tả</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Đánh giá</a>
                    </li>
                    <li class="nav-item">
                        <a id="tab-C" href="#pane-C" class="nav-link" data-toggle="tab" role="tab">Viết đánh giá</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /tabs_product -->
        <div class="tab_content_wrapper">
            <div class="container">
                <div class="tab-content" role="tablist">

                    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
                        <div class="card-header" role="tab" id="heading-A">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">Mô tả</a>
                            </h5>
                        </div>
                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! $product->pro_description  !!}}
                                    </div>
                                    <div class="col-md-6">
                                        {{$product->pro_content}}
                                        <!-- /table-responsive -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                        <div class="card-header" role="tab" id="heading-B">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">Đánh giá</a>
                            </h5>
                        </div>
                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                        <span class="rating">
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star empty"></i>
                                                            <em>4/5.0</em>
                                                        </span>
                                                    <em>Dec 31, 2021</em>
                                                </div>
                                                <h4>Minh An</h4>
                                                <p>rất ngon, nên thử</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                        <span class="rating">
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star empty"></i>
                                                            <em>4/5.0</em>
                                                        </span>
                                                    <em>Dec 31, 2021</em>
                                                </div>
                                                <h4>Minh An</h4>
                                                <p>rất ngon, nên thử</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="review_content">
                                                <div class="clearfix add_bottom_10">
                                                        <span class="rating">
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star"></i>
                                                            <i class="icon_star empty"></i>
                                                            <i class="icon_star empty"></i>
                                                            <em>4/5.0</em>
                                                        </span>
                                                    <em>Dec 31, 2021</em>
                                                </div>
                                                <h4>Minh An</h4>
                                                <p>rất ngon, nên thử</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>

                    <div id="pane-C" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-C">
                        <div class="card-header" role="tab" id="heading-C">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapse-C" aria-expanded="false" aria-controls="collapse-C">Viết đánh giá</a>
                            </h5>
                        </div>
                        <div id="collapse-C" class="collapse" role="tabpanel" aria-labelledby="heading-C">
                            <div class="card-body">
                                <div class="write_review">
                                    <h1>Viết đánh giá</h1>
                                    <form action="/danh-gia-11-banh-trang-cuon-heo-dai-loc"
                                          method="post">
                                        <input type="hidden" name="_token" value="SaNgkLefSoCi0wbSkT33WiDPHSQtjEGVm0DxlYyR">                                        <input type="hidden" name="product_id" value="11">
                                        <input type="hidden" name="user_id" value="">
                                        <input type="hidden" name="active" value="0">

                                        <!-- /rating_submit -->
                                        <div class="form-group">
                                            <label>Tên </label>
                                            <input class="form-control" name="name" type="text" placeholder="Họ và Tên">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" name="email" type="text"
                                                   placeholder="Địa chỉ Email">
                                        </div>
                                        <div class="form-group mb-5">
                                            <label>Nội dung</label>
                                            <textarea class="form-control" name="messages" style="height: 200px;"
                                                      placeholder="Nội dung đánh giá của bạn"></textarea>
                                        </div>
                                        <div class="rating_submit">
                                            <div class="form-group mb-2">
                                                <label class="d-block">Xếp hạng tổng thể</label>
                                                <span class="rating mb-0">
                                                    <input type="radio" class="rating-input active" id="5_star" name="rating"
                                                           value="5">
                                                    <label for="5_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="4_star" name="rating"
                                                           value="4">
                                                    <label for="4_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="3_star" name="rating"
                                                           value="3">
                                                    <label for="3_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="2_star" name="rating"
                                                           value="2">
                                                    <label for="2_star" class="rating-star"></label>
                                                    <input type="radio" class="rating-input" id="1_star" name="rating"
                                                           value="1">
                                                    <label for="1_star" class="rating-star"></label>
                                                </span>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn_1">Gửi đánh giá</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
            </div>
            <!-- /tab-content -->
        </div>
        </div>

        <!-- liên quan -->
        <div class="container margin_60_40">
            <h2>Món liên quan</h2>
            <div class="row small-gutters">
                @if($product_related)
                    @foreach($product_related as $product_related)
                    <div class="col-6 col-md-4 col-xl-3" data-cue="slideInUp">
                    <div class="grid_item">
                        <figure>
                            <a href="{{route('home.thucdon.details',$product_related->pro_slug)}}">
                                <img class="img-fluid lazy" src="{{$product_related->pro_img_path}}" data-src="{{$product_related->pro_img_path}}" alt="loihinh">
                                <div class="add_cart"><span class="btn_1">Thêm vô giỏ hàng</span></div>
                            </a>
                        </figure>
                        <div class="rating">
                            <i class="icon_star voted  "></i>
                            <i class="icon_star voted  "></i>
                            <i class="icon_star voted  "></i>
                            <i class="icon_star voted  "></i>
                            <i class="icon_star voted  "></i>

                            <em>0 Đánh giá</em>
                        </div>
                        <a href="{{route('home.thucdon.details',$product_related->pro_slug)}}">
                            <h3>{{$product_related->pro_name}}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">{{number_format($product_related->pro_sale).'đ'}}</span>
                            <span class="old_price">{{number_format($product_related->pro_price).'đ'}}</span>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
            </div>

        </div>
    </main>
@endsection

@section('js')
    <script src="{{asset('user/teamplate/js/specific_shop.js')}}"></script>
    <script src="{{asset('user/teamplate/js/sticky_sidebar.min.js')}}"></script>
    <script>
        // Sticky sidebar
        $('#sidebar_fixed').theiaStickySidebar({
            minWidth: 991,
            updateSidebarHeight: true,
            additionalMarginTop: 90
        });
    </script>
@endsection
