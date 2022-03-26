<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{asset('admin/teamplate/admin/assets/css/my-task.style.min.css')}}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @toastr_css

</head>

<body>
    <div id="mytask-layout" class="theme-indigo">

    <!-- sidebar -->
    <div class="sidebar px-4 py-4 py-md-5 me-0">
        <div class="d-flex flex-column h-100">
            <a href="{{route('admin.index')}}" class="mb-0 brand-icon">
            <span class="logo-icon">
               <img src="{{asset('admin/img/logoadmin.png')}}" alt="">
            </span>
                <span class="logo-text">Quản Lý Cửa Hàng Mì Quảng</span>
            </a>
            <!-- Menu: main ul -->
            <ul class="menu-list flex-grow-1 mt-3">
                <!-- Menu: Quản lý Bài viết giới thiệu -->
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#abouts" href="">
                        <i class="icofont-certificate-alt-1"></i>
                        <span>Quản lý giới thiệu</span>
                        <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span>
                    </a>
                    <ul class="sub-menu collapse" id="abouts">
                        <li><a class="ms-link" href="{{route('about.index')}}"><span>Bài viết giới thiệu</span> </a></li>
                        <li><a class="ms-link" href="{{route('galleries.index')}}"><span>Quản lý hình ảnh</span> </a></li>
                        <li><a class="ms-link" href="{{route('slider.index')}}"><span>Quản lý Slider</span> </a></li>
                    </ul>
                </li>

                <!-- Menu: Quản lý Sản phẩm soup-bowl -->
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#products" href="">
                        <i class="icofont-soup-bowl"></i><span>Quản lý thực đơn</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="products">
                        <li><a class="ms-link" href="{{route('products.index')}}"><span>Quản lý món ăn</span> </a></li>
                        <li><a class="ms-link" href="{{route('procategories.index')}}"><span>Quản lý loại món ăn</span> </a></li>
                        <li><a class="ms-link" href=""><span>Quản lý bình luận món ăn</span> </a></li>
                    </ul>
                </li>

{{--                <!-- Menu: Quản lý Slider -->--}}
{{--                <li class="collapsed">--}}
{{--                    <a class="m-link" href="{{route('slider.index')}}">--}}
{{--                        <i class="icofont-file-tiff"></i><span>Quản lý Slider</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <!-- Menu: Quản lý danh mục -->
                <li class="collapsed">
                    <a class="m-link" href="{{route('menu.index')}}">
                        <i class="icofont-align-right"></i> <span>Quản lý Danh mục</span>
                    </a>
                </li>

                <!-- Menu: Quản lý Blog -->
                <li class="collapsed">
                    <a class="m-link"  data-bs-toggle="collapse" data-bs-target="#Blogs" href="#"><i class="icofont-blogger"></i><span>Quản lý Blog</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="Blogs">
                        <li><a class="ms-link" href="{{route('posts.index')}}"><span>Bài viết</span> </a></li>
                        <li><a class="ms-link" href="{{route('postcategories.index')}}"><span>Danh mục bài viết</span> </a></li>
                    </ul>
                </li>


                <!-- Menu: Thống kê -->
                <li class="collapsed">
                    <a class="m-link"  data-bs-toggle="collapse" data-bs-target="#Statistical" href="">
                        <i class="icofont-money"></i><span>Quản lý Đơn hàng</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="Statistical">
                        <li><a class="ms-link" href="{{ route('orders.index')}}"><span>Quản lý đơn hàng</span> </a></li>
                        <li><a class="ms-link" href=""><span>Thống kê</span> </a></li>
                    </ul>
                </li>

                <!-- Menu: Phân quyền -->
                <li class="collapsed">
                    <a class="m-link"  data-bs-toggle="collapse" data-bs-target="#Permission" href="">
                        <i class="icofont-ssl-security"></i><span>Quyền</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <ul class="sub-menu collapse" id="Permission">
                        <li><a class="ms-link" href="{{ route('roles.index')}}"><span>Quản lý quyền</span> </a></li>
                        <li><a class="ms-link" href="{{ route('permission.create')}}"><span>Tạo chức năng quyền</span> </a></li>
                    </ul>
                </li>
            </ul>
            <!-- EndMenu: main ul -->

            <!-- Theme: Switch Theme -->
            <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-center">
                    <div class="form-check form-switch theme-switch">
                        <input class="form-check-input" type="checkbox" id="theme-switch">
                        <label class="form-check-label" for="theme-switch">Bậc chê độ tối!</label>
                    </div>
                </li>
            </ul>

            <!-- Menu: menu collepce btn -->
            <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                <span class="ms-2"><i class="icofont-bubble-right"></i></span>
            </button>
        </div>
    </div>

    <!-- main body area -->
        <div class="main px-lg-4 px-md-4">
            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            <div class="d-flex">

                            </div>
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm ">Chào <span class="font-weight-bold"> {{ Auth::user()->name }}</span></p>

                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button"
                                   data-bs-toggle="dropdown" data-bs-display="static">
                                    @if (Auth::user()->avatar == null)
                                        <img class="avatar lg rounded-circle img-thumbnail" src="{{asset('admin/img/profile_av.png')}}" alt="profile">
                                    @else
                                        <img class="avatar lg rounded-circle img-thumbnail" src="{{ Auth::user()->avatar}}" alt="profile">
                                    @endif
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                @if (Auth::user()->avatar == null)
                                                <img class="avatar rounded-circle" src="{{asset('admin/img/profile_av.png')}}" alt="profile">
                                                @else
                                                    <img class="avatar rounded-circle" src="{{ Auth::user()->avatar}}" alt="profile">
                                                @endif
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold"></span></p>
                                                    <small class="">{{ Auth::user()->email }}</small>
                                                </div>
                                            </div>

                                            <div>
                                                <hr class="dropdown-divider border-dark">
                                            </div>
                                        </div>
                                        <div class="list-group m-2 ">

                                            <a href="{{route('users.index')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user-group fs-6 me-3"></i>Tài khoản người dùng</a>
                                            <a href="{{route('logout.admin')}}" onclick="return confirm('Bạn có chắc chắn muốn thoát?')" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-6 me-3"></i>Đăng xuất</a>
                                            <div>
                                                <hr class="dropdown-divider border-dark">
                                            </div>
                                            <a href="{{route('roles.index')}}" class="list-group-item list-group-item-action border-0 "><i class="icofont-contact-add fs-5 me-3"></i>Phân quyền tài khoản
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>

                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">

                        </div>

                    </div>
                </nav>
            </div>

            @yield('main-admin')

        </div>

</div>

<!-- Jquery Core Js -->
<script src="{{asset('admin/teamplate/admin/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Jquery Page Js -->
<script src="{{asset('admin/teamplate/admin/js/template.js')}}"></script>
<script src="{{asset('admin/teamplate/admin/js/main.js')}}"></script>
@yield('js')

</body>
@jquery
@toastr_js
@toastr_render
</html>
