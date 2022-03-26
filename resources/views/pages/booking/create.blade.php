
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đặt Bàn - Mì Quuảng Bà Mua</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="teamplate/img/favicon/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="teamplate/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="teamplate/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="teamplate/img/favicon/favicon-16x16.png">

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
    <link href="{{asset('user/teamplate/css/blog.css')}}" rel="stylesheet">

    <!-- Shop CSS -->
    <link href="{{asset('user/teamplate/css/shop.css')}}" rel="stylesheet">

    <!-- Contact CSS -->
    <link href="{{asset('user/teamplate/css/wizard.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{asset('user/teamplate/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">


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
            background-image: url('teamplate/img/bg_footer.png');
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
                    <a href="{{route('home.index')}}">
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
                            <span class="nav-link"><a href="{{route('home.datban.create')}}">Đặt bàn</a></span>
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

<!-- main -->
<main>
    <div class="hero_single inner_pages background-image" data-background="url(user/teamplate/img/bg_datban.jpg)">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10 col-md-8">
                        <h1>Đặt Bàn - Mì Quuảng Bà Mua</h1>
                        <p>
                            Quý khách nên đặt chỗ trước 4 giờ để được phục vụ tốt nhất
                        </p>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <div class="frame white"></div>
    </div>
    <!-- /hero_single -->
    <div class="pattern_2">
        <div class="container margin_120_100 pb-0">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center d-none d-lg-block" data-cue="slideInUp">
                    <br><br><br><br><br>
                    <img src="{{asset('user/teamplate/img/datban1.png')}}"  alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-8" data-cue="slideInUp">
                    <div class="main_title">
                        <span><em></em></span>
                        <h2>Đặt bàn</h2>
                        <p>hoặc gọi điện cho chúng tôi theo số 037 210 5792</p>
                    </div>
                    <div id="wizard_container">
                        <form action="" method="POST" id="frmtuvan">
                            @csrf
                            <input id="website" name="website" type="text" value="">
                            <!-- Leave for security protection, read docs for details -->
                            <div id="middle-wizard">
                                <div class="step">
                                    <h3 class="main_question"><strong>Bước 1/3 </strong> Vui lòng chọn ngày</h3>
                                    <div class="form-group">
                                        <input type="hidden" name="date" id="datepicker_field" class="required">
                                    </div>
                                    <div id="DatePicker"></div>
                                </div>
                                <!-- /step-->
                                <div class="step">
                                    <h3 class="main_question"><strong>Bước 2/3 </strong> Chọn thời gian và khách mời</h3>
                                    <div class="step_wrapper">
                                        <h4>Thời gian</h4>
                                        <div class="radio_select add_bottom_15">
                                            <ul>
                                                <li>
                                                    <input type="radio" id="time_1" name="time" value="10.00" class="required">
                                                    <label for="time_1">10.00</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_2" name="time" value="10.30" class="required">
                                                    <label for="time_2">10.30</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_3" name="time" value="11.00" class="required">
                                                    <label for="time_3">11.00</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_4" name="time" value="11.30" class="required">
                                                    <label for="time_4">11.30</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_5" name="time" value="18.00" class="required">
                                                    <label for="time_5">18.00</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_6" name="time" value="18.30" class="required">
                                                    <label for="time_6">18.30</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_7" name="time" value="19.00" class="required">
                                                    <label for="time_7">19.00</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="time_8" name="time" value="20.00" class="required">
                                                    <label for="time_8">20.00</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /time_select -->
                                    </div>
                                    <!-- /step_wrapper -->
                                    <div class="step_wrapper">
                                        <h4>Bao nhiêu người</h4>
                                        <div class="radio_select">
                                            <ul>
                                                <li>
                                                    <input type="radio" id="people_1" name="people" value="1" class="required">
                                                    <label for="people_1">1</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="people_2" name="people" value="2" class="required">
                                                    <label for="people_2">2</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="people_3" name="people" value="3" class="required">
                                                    <label for="people_3">3</label>
                                                </li>
                                                <li>
                                                    <input type="radio" id="people_4" name="people" value="4" class="required">
                                                    <label for="people_4">4</label>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /people_select -->
                                    </div>
                                    <!-- /step_wrapper -->
                                </div>
                                <!-- /step-->
                                <div class="submit step">
                                    <h3 class="main_question"><strong>3/3</strong> Vui lòng điền thông tin chi tiết của bạn</h3>
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control required" placeholder="Họ và Tên">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control required" placeholder="Email của bạn">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <input type="text" name="phone" id="txtphone" class="form-control required" placeholder="Số điện thoại">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="b_note" placeholder="Vui lòng cung cấp bất kì thông tin bổ sung nào"></textarea>
                                    </div>

                                </div>
                                <!-- /step-->
                            </div>
                            <!-- /middle-wizard -->
                            <div id="bottom-wizard">
                                <button type="button" name="backward" class="backward">Trước đó</button>
                                <button type="button" name="forward" class="forward">Tiếp theo</button>
                                <button type="submit" class="submit" id="gui">Gửi</button>
                            </div>
                            <!-- /bottom-wizard -->
                        </form>
                    </div>
                    <!-- /Wizard container -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /pattern_2 -->

</main>
<!-- /main -->

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





<script src="{{asset('user/teamplate/js/wizard/wizard_scripts.min.js')}}"></script>
<script src="{{asset('user/teamplate/js/wizard/wizard_func.js')}}"></script>
</body>

</html>
