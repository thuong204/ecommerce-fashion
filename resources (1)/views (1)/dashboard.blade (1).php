<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>Manage Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <!-- font CSS -->
    <link href="{{asset('public/backend/fonts/fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic')}}" rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- calendar -->
    <link rel="stylesheet" href="css/monthly.css">
    <style>
        .sub {
            display: none;
            /* Hide the sub-menu by default */
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{asset('public/backend/js/dashboard.js')}}"></script>
    <!-- //calendar -->

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    Product
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->

                </ul>
                <!--search & user info end-->
            </div>
            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
                            <img alt="" src="{{('public/backend/images/2.png')}}">
                            <span class="username">
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $name = Session::get("admin_name");
                                if ($name) {
                                    echo "$name";
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <script>
                        $(document).ready(function() {
                            $("li.dropdown").on("click", function() {
                                // Thêm lớp "open" vào thẻ <li> đang được click
                                $(this).addClass("open");
                            });
                        });
                    </script>
                    <script>
                        const dropdownItems = document.querySelectorAll(".dropdown");

                        dropdownItems.forEach(item => {
                            item.addEventListener("click", (event) => {
                                event.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
                                dropdownItems.forEach(item => item.classList.remove("open"));
                                item.classList.add("open");
                            });
                        });

                        document.addEventListener("click", () => {
                            dropdownItems.forEach(item => item.classList.remove("open"));
                        });
                    </script>
                    <script>
                        const dropdownToggle = document.querySelector(".dropdown-toggle");
                        const dropdownMenu = document.querySelector(".dropdown");

                        dropdownToggle.addEventListener("click", (event) => {
                            event.stopPropagation(); // Prevent the click event from propagating outside
                            dropdownMenu.classList.toggle("open");
                        });

                        document.addEventListener("click", () => {
                            dropdownMenu.classList.remove("open");
                        });
                    </script>
                    <!-- <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>

        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="index.html">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;" class="toggleSubMenu">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục</a></li>
                                <li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="toggleSubMenu">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-brand-product')}}">Thêm thương hiệu</a></li>
                                <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê thương hiệu</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="toggleSubMenu">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                                <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="toggleSubMenu">
                                <i class="fa fa-book"></i>
                                <span>Hóa đơn</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-brand-product')}}">Thêm sản phẩm</a></li>
                                <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê sản phẩm</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="toggleSubMenu">
                                <i class="fa fa-book"></i>
                                <span>Thống kê</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{URL::to('/add-brand-product')}}">Thêm sản phẩm</a></li>
                                <li><a href="{{URL::to('/all-brand-product')}}">Liệt kê sản phẩm</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>

        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content');
            </section>
            <section>
                <!-- footer -->
                <div class="footer">
                    <div class="wthree-copyright">
                        <p style="text-align:right">© 2023 E-comerce. All rights reserved | Design by <a href="https://www.facebook.com/profile.php?id=100062722131543">Trần Công Thường</a></p>
                    </div>
                </div>
                <!-- / footer -->
            </section>
        </section>
</body>

</html>