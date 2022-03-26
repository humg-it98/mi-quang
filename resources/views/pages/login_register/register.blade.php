@extends('layout.home')

@section('css')
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
        <div class="hero_single inner_pages background-image" data-background="url(user/teamplate/img/tintuc.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Đăng ký tài khoản - Mì Quảng Bà Mua</h1> <br>
                            <ul>
                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><a href="{{route('home.index')}}" title="">Trang chủ</a></li>/
                                <li style="display: inline-block;
                                position: relative;
                                padding: 0 16px 0 23px;"><span>Đăng ký</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->


        <section class="bg-blueGray-500 pattern_2">
            <div class="w-full lg:w-6/12 px-4 mx-auto pt-6">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-yellow-300 border-0">
                    <div class="rounded-t mb-0 px-6 py-6">
                        <div class="text-center mb-3">
                            <h6 class="text-blueGray-500 text-lg font-bold">
                                Đăng ký với
                            </h6>
                        </div>
                        <div class="btn-wrapper text-center">
                            <a href=""
                               class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                               type="button">
                                <img alt="..." class="w-5 mr-1" src="{{asset('user/teamplate/img/Google__G__Logo.svg')}}">Google
                            </a>
                            <a href=""
                               class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150">
                                <img alt="..." class="w-5 mr-1" src="{{asset('user/teamplate/img/icons8-facebook.svg')}}">Facebok
                            </a>
                        </div>
                        <hr class="mt-6 border-b-1 border-blueGray-300">
                    </div>

                    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                        <div class="text-white-400 text-center mb-3 font-bold">
                            <p class="text-lg">Hoặc đăng ký bằng thông tin đăng nhập</p>
                        </div>

                        <form action="" method="POST">
                            @csrf
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">Tên</label>
                                <input type="text" value="{{old('cus_name')}}" name="cus_name" required="required" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Họ và Tên của bạn.">
                                @if ($errors->first('cus_name'))
                                    <span class="text-danger">{{ $errors->first('cus_name') }}</span>
                                @endif
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">Email</label>
                                <input type="text" value="{{old('cus_email')}}" name="cus_email" required="required" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Địa chỉ Email">
                                @if ($errors->first('cus_email'))
                                    <span class="text-danger">{{ $errors->first('cus_email') }}</span>
                                @endif
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">Số điện thoại</label>
                                <input type="text" value="{{old('cus_phone')}}" name="cus_phone" required="required" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Số điện thoại liên hệ.">
                                @if ($errors->first('cus_phone'))
                                    <span class="text-danger">{{ $errors->first('cus_phone') }}</span>
                                @endif
                            </div>

                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">Mật khẩu</label>
                                <input type="password" name="password" required="required" id="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Mật khẩu tối thiểu 6 kí tự.">
                                @if ($errors->first('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-base font-bold mb-2" htmlfor="grid-password">Nhập lại Mật khẩu</label>
                                <input type="password" name="password_confirm" required="required" id="confirm_password" oninput="check(this)"
                                       class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                       placeholder="Mật khẩu vừa nhập.">
                                @if ($errors->first('password_confirm'))
                                    <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
                                @endif
                            </div>

                            <div>
                                <label class="inline-flex items-center cursor-pointer">
                                    <input name="remember_me" id="customCheckLogin" type="checkbox" class="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150">
                                    <span class="ml-2 text-sm font-semibold text-blueGray-600">Đồng ý với <a href="javascript:void(0)" class="text-yellow-800"> Chính sách bảo mật</a></span>
                                </label>
                            </div>

                            <div class="text-center mt-6">
                                <button class="bg-yellow-500 text-white active:bg-yellow-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" type="submit">Tạo tài khoản</button>
                            </div>
                        </form>

                        <p class="flex flex-col items-center justify-center mt-10 text-center">
                            <span class="text-blueGray-800 font-bold">Bạn đã có tài khoản?</span> <br>
                            <a href="{{route('home.dangnhap.index')}}"
                               class=" px-3 py-2 text-lg font-semibold text-yellow-500 transition-colors duration-300 bg-white rounded-md shadow hover:bg-white-600 focus:outline-none focus:ring-white-200 focus:ring-4">
                                Quay lại đăng nhập!
                            </a>
                        </p>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection

@section('js')
    <script src="{{asset('user/teamplate/js/sticky_sidebar.min.js')}}"></script>
    <script src="{{asset('user/teamplate/js/shop_order_func.js')}}"></script>
@endsection




