<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang chủ - Mì Quảng Bà Mua</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('user/teamplate/img/favicon/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('user/teamplate/img/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('user/teamplate/img/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('user/teamplate/img/favicon/favicon-16x16.png')}}">

    <!-- GOOGLE WEB FONT -->


    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--fix pannination -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('user/teamplate/css/vendors.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/teamplate/css/style.css')}}" rel="stylesheet">

    <!--==================== -Main css- ====================-->
    <link href="{{asset('user/teamplate/css/custom.css')}}" rel="stylesheet">

    <!-- Blog CSS -->
    <link href="{{asset('user/teamplate/css/blog.html.css')}}" rel="stylesheet">

    <!-- Shop CSS -->
    <link href="{{asset('user/teamplate/css/shop.css')}}" rel="stylesheet">

    <!-- Contact CSS -->
    <link href="{{asset('user/teamplate/css/wizard.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{asset('user/teamplate/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    @toastr_css

    @yield('css')

    @yield('style')



</head>

<body>
<!-- Page Preload -->

<div id="preloader" style="display: none;">
    <div data-loader="circle-side" style="display: none;"></div>
</div>

<!-- header -->
<!--HEADER PART START-->
<header id="top">
    <div class="header py-1">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light px-0 py-0">
                <div id="logo">
                    <a href="/">
                        <img src="{{asset('user/teamplate/img/logo0.png')}}" width="170" height="50" alt="" class="logo_normal">
                        <img src="{{asset('user/teamplate/img/logo1.png')}}" width="170" height="50" alt="" class="logo_sticky">
                    </a>

                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="icofont-navigation-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav navbar-custom">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home.index')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="">Thực đơn</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('home.blog.index')}}">Tin tức</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="">Giới thiệu</a>
                        </li>

                        <li class="nav-item last-menu-bg ">
                            <span class="nav-link"><a href="">Đặt bàn</a></span>
                        </li>

                    </ul>
                    <!-- /cart -->
                    <ul id="top_menu">
                        <li>
                            @if(Session::get('cart')==true)
                            <div class="dropdown dropdown-cart">
                                <a href="{{route('home.cart.index')}}" class="cart_bt">
                                    <strong>{{sizeof(Session::get('cart'))}}</strong>
                                </a>
                                <div class="dropdown-menu">
                                    <ul>
                                    </ul>
                                    <div class="total_drop">
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach (Session::get('cart') as $item)
                                            @php
                                                $subtotal = $item['pro_sale']*$item['product_qty'];
                                                $total += $subtotal;
                                            @endphp
                                        @endforeach
                                        <div class="clearfix add_bottom_15">
                                            <strong>Tổng</strong>
                                            <span>{{number_format($total).' VNĐ'}}</span>
                                        </div>
                                        <a href="{{route('home.cart.index')}}" class="btn_1 outline">Xem giỏ hàng</a>
                                        <a href="{{route('home.thanhtoan.index')}}" class="btn_1">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="dropdown dropdown-cart">
                                    <a href="{{route('home.cart.index')}}" class="cart_bt">
                                        <strong>0</strong>
                                    </a>
                                    <div class="dropdown-menu">
                                        <ul>
                                        </ul>
                                        <div class="total_drop">
                                            <div class="clearfix add_bottom_15">
                                                <strong>Tổng</strong>
                                                <span>0</span>
                                            </div>
                                            <a href="{{route('home.cart.index')}}" class="btn_1 outline">Xem giỏ hàng</a>
                                            @if(Session::get('cus_id')==true)
                                            <a href="{{route('home.thanhtoan.index')}}" class="btn_1">Thanh toán</a>
                                            @else
                                                <a href="{{route('home.dangnhap.index')}}" class="btn_1">Đăng nhập</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--HEADER PART END-

<-- main -->
@yield('main-home')

<!-- footer-->
<footer>

    <div class="container">
        <div class="fixed-bg bg3"></div>
        <div class="row top-footer">

            <div class="phone-div">
                <div class="border-circle">
                    <div class="phone-circle">
                        <a href="#top" class="ext-link" >
                            <img class="gotop" src="{{asset('user/teamplate/img/go.png')}}">
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="footer_wp">
                    <img src="{{asset('user/teamplate/img/logobuy-01.png')}}" alt="">
                    <h3>Mì Quảng Bà Mua</h3>
                    <p>Mỳ quảng trở thành món ăn đặc trưng của cả miền Trung, trở thành món ngon không thể bỏ lỡ nếu một lần nếm thử nếu bạn đến Đà Nẵng.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="footer_wp ft_center">
                    <h3>Địa chỉ các nhà hàng:</h3>
                    <p>40 Ngũ Hành Sơn, TP. Đà Nẵng (đầu cầu Trần Thị Lý)</p>
                </div>
                <!--widget-contact end-->
            </div>

            <div class="col-lg-4 col-md-6" style="margin-top: 35px">
                <div class="footer_wp">
                    <div class="widget widget-payment">
                        <div class="wid-payment">
                            <h4>Tùy Chọn Thanh Toán</h4>
                            <ul>
                                <li>
                                    <img alt="err" class="thanhtoan" src="{{asset('user/teamplate/img/thanhtoan.png')}}">
                                </li>
                            </ul>

                        </div>
                        <div class="wid-payment">
                            <h4>Phương thức vận chuyển</h4>
                            <ul>
                                <li>
                                    <img alt="err" src="{{asset('user/teamplate/img/shippers.png')}}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--widget-payment end-->
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-sm-5">
                <p class="copy">Bản quyền của Quang Noodles <br>
                    </br><a style="color: red" href=""><b>Website không có tính chất thương mại</b></a></p>
            </div>
            <div class="col-sm-7">
                <div class="follow_us">
                    <ul>
                        <li><a href="#0"><img src="{{asset('user/teamplate/img/twitter_icon.svg')}}" data-src="teamplate/img/twitter_icon.svg" alt="" class="lazy loaded" data-was-processed="true"></a></li>
                        <li><a href="#0"><img src="{{asset('user/teamplate/img/facebook_icon.svg')}}" data-src="teamplate/img/facebook_icon.svg" alt="" class="lazy loaded" data-was-processed="true"></a></li>
                        <li><a href="#0"><img src="{{asset('user/teamplate/img/instagram_icon.svg')}}" data-src="teamplate/img/instagram_icon.svg" alt="" class="lazy loaded" data-was-processed="true"></a></li>
                        <li><a href="#0"><img src="{{asset('user/teamplate/img/youtube_icon.svg')}}" data-src="teamplate/img/youtube_icon.svg" alt="" class="lazy loaded" data-was-processed="true"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="text-center"></p>
    </div>

</footer>


<!-- layout-->
<!-- COMMON SCRIPTS -->
<script src="{{asset('user/teamplate/js/common_scripts.min.js')}}"></script>
<script src="{{asset('user/teamplate/js/common_func.js')}}"></script>
<script src="{{asset('user/teamplate/phpmailer/validate.js')}}"></script>

<!-- SPECIFIC SCRIPTS (wizard form) -->
<script src="{{asset('user/teamplate/js/wizard/wizard_scripts.min.js')}}"></script>
<script src="{{asset('user/teamplate/js/wizard/wizard_func.js')}}"></script>

<script src="{{asset('user/teamplate/js/slider.js')}}"></script>
@yield('js')
</body>
@jquery
@toastr_js
@toastr_render

</html>
