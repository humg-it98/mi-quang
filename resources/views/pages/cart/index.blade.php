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

    <style>
        .mt-100 {
            margin-top: 100px
        }

        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }
    </style>
@endsection

@section('main-home')

    @if(Session::get('cart')==true)
    <main>
        <div class="hero_single inner_pages background-image" data-background="url(user/teamplate/img/tintuc.jpg)">
            <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10 col-md-8">
                            <h1>Giỏ Hàng</h1> <br>
                            <ul>
                                <li style="display: inline-block;position: relative;padding: 0 16px 0 23px;"><a href="{{route('home.index')}}" title="">Trang chủ</a></li>/
                                <li style="display: inline-block;position: relative;padding: 0 16px 0 23px;"><a href="{{route('home.thucdon.index')}}" title="">Thực đơn</a></li>/
                                <li style="display: inline-block;position: relative; padding: 0 16px 0 23px;"><span>Chi tiết sản phẩm</span></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <div class="frame white"></div>
        </div>
        <!-- /hero_single -->
        <div>
            @if(session()->has('message'))
                {!! session()->get('message') !!}
            @elseif(session()->has('error'))
                {!! session()->get('error') !!}
            @endif
        </div>

        <form action="{{route('home.cart.update')}}" method="post">
            @csrf
            <div class="bg_gray">
                <div class="container margin_60_40">
                    <table class="table table-striped cart-list">
                        <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th>GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>Tổng phụ</th>
                            <th> &nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach(Session::get('cart') as $item => $cart)
                                @php
                                    $subtotal = $cart['pro_sale']*$cart['product_qty'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td>
                                        <div class="thumb_cart">
                                            <img src="{{$cart['pro_avatar']}}" data-src="{{$cart['pro_avatar']}}" class="lazy" alt="Image">
                                        </div>
                                        <span class="item_cart">{{$cart['pro_name']}}</span>
                                    </td>
                                    <td>
                                        <strong>{{number_format($cart['pro_sale']).'đ'}}</strong>
                                    </td>
                                    <td>
                                        <div class="numbers-row">
                                            <input type="text" id="quantity_1" class="qty2" name="num_product[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}">
                                            <div class="inc button_inc">+</div>
                                            <div class="dec button_inc">-</div>
                                        </div>
                                    </td>
                                    <td>
                                        <strong>{{number_format($subtotal).'đ'}}</strong>
                                    </td>
                                    <td class="p-r-15">
                                        <a href="{{route('home.cart.delete',$cart['session_id'])}}" class="action">
                                            <i class="icon_trash_alt"></i>
                                        </a>
                                    </td>
                                    <td class="options">
                                        <a href="#"><i class="ti-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                        <div class="col-sm-4 text-right">
                            <input type="submit" class="btn_1 outline" value="Cập nhật giỏ hàng">
                        </div>
                    </div>
                    <!-- /cart_actions -->
                </div>
            </div>
            <!-- box_cart -->
            <div class="box_cart">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <ul>
                                <li>
                                    <span>Tổng phụ</span> {{number_format($total).' VNĐ'}}
                                </li>
                                <li>
                                    <span>Phí giao hàng</span> 15.000đ
                                </li>
                                <li>
                                    <span>TẤT CẢ</span> {{number_format($total + 15000).' VNĐ'}}
                                </li>
                            </ul>
                            <a href="{{route('home.thanhtoan.index')}}" class="btn_1 full-width cart">Thực hiện thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    @else
    <main>
        <div class="container-fluid mt-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body cart">
                            <img src="{{asset('user/teamplate/img/cartenty.png')}}" width="170" height="170" style="  display: block; margin-left: auto; margin-right: auto;width: 30%;">
                            <div class="col-sm-12 empty-cart-cls text-center">
                                <h3><strong>Rất tiếc ... giỏ hàng của bạn trống</strong></h3>
                                <h4>Thêm một cái gì đó để làm cho tôi hạnh phúc :)</h4>
                                <a href="" class="btn btn-primary cart-btn-transform m-3" data-abc="true">quay lại chọn món</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endif

@endsection

@section('js')
    <script src="{{asset('user/teamplate/js/specific_shop.js')}}"></script>
@endsection

