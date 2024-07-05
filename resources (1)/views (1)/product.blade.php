<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ
    </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link href="{{asset('public/backend/css/inde/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/inde/styleheader-body.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<style>
    /* Styles như trước */
    .slider-btn {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    .prev {
        left: 0;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }
</style>

<body>
    <div id="header">
        <div class="header-body">

            <ul class="header-body-ul">
                <div class="pull-left-center">
                    <a href="index.html" id="logo"><img src="{{asset('public/backend/images/coconutshop.png')}}" width="200px;" alt=""></a>
                </div>
                <li style="margin-top: -3px;">
                    <div class="header-block account-block">
                        <a href="" class="position-center">
                            <img src="{{asset('public/backend/images/search.webp')}} " style="padding-left: 50px;" alt="cart"></a>
                        <ul>
                            <form action="/search" method="get" class="search-bar" role="search">
                                <input type="hidden" name="type" value="product">
                                <input type="search" name="q" value="" placeholder="Tìm kiếm..." class="input-group-field" aria-label="Tìm kiếm...">
                                <button type="submit" class="btn icon-fallback-text">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </ul>
                    </div>

                <li class="li-none" style="margin-top:-3px;">
                    <div class="header-block account-block">
                        <a href="" class="position-center">
                            <img src="{{asset('public/backend/images/account.webp')}}" alt="account">Tài khoản</a>
                        <ul>
                            <li><a href="">Đăng nhập</a></li>
                            <li><a href="">Đăng ký</a></li>
                        </ul>
                    </div>

                </li>
                <li>
                    <div class="header-block">
                        <a href="" class="position-center"><img src="{{asset('public/backend/images/cart.webp')}} " alt="cart">Giỏ hàng</a>
                    </div>
                </li>
            </ul>
        </div>
        <br> <br>
        <div class="header-bottom" style="background-color:black">
            <div class="container">
                <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="{{URL::to('/index')}}">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li><a href="product_type.html">Áo</a></li>
                                <li><a href="product_type.html">Quần</a></li>
                                <li><a href="product_type.html">Dày</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">Bộ sưu tập</a></li>
                        <li><a href="about.html">Giới thiệu</a></li>
                        <li><a href="contacts.html">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->
    <div class="inner-header">
        <div class="container" style="margin-top: 130px;">
            <div class="pull-left">
                <h6 class="inner-title">Product</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Product</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        @foreach($one_product as $key => $product_one)
                        <div class="col-sm-4">
                            <img src="{{asset('public/backend/images/products/'. $product_one->product_image)}}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title" style="font-size: 18px;">{{$product_one->product_name}}</p>
                                <p class="single-item-price">
                                    <span>{{$product_one->product_cost}}đ</span>
                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <p style="font-weight: bold;">Options:</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="size">
                                    <option>Size</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <select class="wc-select" name="color">
                                    <option>Color</option>
                                    <option value="Red">Red</option>
                                    <option value="Green">Green</option>
                                    <option value="Yellow">Yellow</option>
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                </select>
                                <select class="wc-select" name="color">
                                    <option>Qty</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#">Description</a></li>
                            <li><a href="#">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            <p style="color:red">THÔNG TIN CHI TIẾT {{$product_one->product_name}}</p>
                            <p> {{$product_one->product_desc}}</p>
                            <br>
                            <p> {{$product_one->product_content}}</p>

                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Related Products</h4>

                        <div class="row">
                            <?php
                            $cnt = 0;
                            ?>
                            @foreach($all_product_top as $key => $product)
                            @if($cnt < 3) <div class="col-sm-4">
                                <div class="single-item">
                                    <div class="single-item-header">
                                        <a href="product.html"><img src="{{asset('public/backend/images/products/' . $product->product_image)}} " width="270px" height="380px"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$product->product_name}}</p>
                                        <p class="single-item-price">
                                            <span>{{$product->product_cost}}đ</span>
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                        </div>
                        <?php
                        $cnt++;
                        ?>
                        @endif
                        @endforeach
                    </div>
                </div> <!-- .beta-products-list -->
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Best Sellers</h3>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                @foreach($all_product_top as $key => $product)
                                <div class="media beta-sales-item">
                                    <a class="pull-left" href="{{URL::to('product/'. $product->product_id)}}"><img src="{{asset('public/backend/images/products/' .$product->product_image)}}" alt=""></a>
                                    <div class="media-body">
                                        <p class="beta-sales-name"> {{$product->product_name}}</p>
                                        <p class="beta-sales-price"> {{$product->product_cost}}đ</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                    <div class="widget">
                        <h3 class="widget-title">New Products</h3>
                        <div class="widget-body">
                            <?php $cnt = 0; ?>
                            <div class="beta-sales beta-lists">
                                @foreach($all_product_new as $key => $product)
                                @if($cnt < 4) <div class="media beta-sales-item">
                                    <a class="pull-left" href="product.html"><img src="{{asset('public/backend/images/products/' .$product->product_image)}}" alt=""></a>
                                    <div class="media-body">
                                        <p class="beta-sales-name"> {{$product->product_name}}</p>
                                        <p class="beta-sales-price"> {{$product->product_cost}}đ</p>
                                    </div>
                            </div>
                            <?php $cnt++; ?>
                            @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            </div> <!-- best sellers widget -->
        </div>
    </div>
    </div> <!-- #content -->
    </div> <!-- .container -->

    <div id="footer" class="color-div">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="widget-title">Công ty TNHH Coconut</h4>
                        <div>
                            <p>Mã Số Thuế: 01064848679 <br>
                                Địa chỉ: &nbsp;Phường Hòa Quý - Quận Ngũ Hành Sơn - TP Đà Nẵng.</p>
                        </div>
                    </div>
                    <br>
                    <div class="widget">
                        <p class="widget-title" style="color:black;font-size:20px;">Tham gia bảng tin</p>
                        <form action="#" method="post">
                            <input type="email" name="your_email" placeholder="Nhập email của bạn">
                            <button class="pull-right" type="submit">Đăng kí<i class="fa fa-chevron-right"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="widget-title">Chính sách khách hàng</h4>
                        <div>
                            <ul>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Chính sách khách hàng thân thiết</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Chính sách đổi trả</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Chính sách bảo hành</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Chính sách bảo mật</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Câu hỏi thường gặp</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Hướng dẫn mua hàng online</a></li>
                                <li><a href="blog_fullwidth_2col.html"><i class="fa fa-chevron-right"></i> Hướng dẫn kiểm tra hạng thẻ thành viên</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-sm-10">
                        <div class="widget">
                            <h4 class="widget-title">Thông tin cửa hàng</h4>
                            <div>
                                <div class="contact-info">
                                    <i class="fa fa-map-marker"></i>
                                    <p>Phường Hòa Quý - Quận Ngũ Hành Sơn - TP Đà Nẵng</p>
                                    <i class="fa fa-map-marker"></i>
                                    <p>Triệu Sơn - Triệu Phong - Quảng Trị</p>
                                    <i class="fa fa-map-marker"></i>
                                    <p>Phường Nam Hải- Quận 1-Hồ Chí Minh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- #footer -->


    <div class="copyright">
        <div class="container">
            <p class="pull-left">Privacy policy. (&copy;) 2023</p>
            <p class="pull-right pay-options">
                <a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
                <a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
                <a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
            </p>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .copyright -->

    <!-- include js files -->


    <script>
        $(document).ready(function($) {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            })
        })
    </script>
</body>

</html>