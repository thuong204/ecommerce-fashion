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
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $name = Session::get('name');
                            if ($name == null) {
                            ?>
                                <img src="{{asset('public/backend/images/account.webp')}}" alt="account">Tài khoản</a>
                    <?php
                            } else {
                                $name = Session::get('name');
                    ?>
                        <img src="{{asset('public/backend/images/account.webp')}}" alt="account"><?php echo ($name) ?></a>
                    <?php } ?>

                    <ul>
                        <?php

                        $name = Session::get('name');
                        if ($name == null) {
                        ?>
                            <li><a href="{{URL::to('/login_cus')}}">Đăng nhập</a></li>
                            <li><a href="{{URL::to('/signup_cus')}}">Đăng ký</a></li>
                        <?php
                        } else {
                        ?>
                            <li><a href="{{URL::to('/logout_cus')}}">Đăng xuất</a></li>
                        <?php } ?>
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
                                <li><a href="{{URL::to('product_type/Áo')}}">Áo</a></li>
                                <li><a href="{{URL::to('product_type/Quần')}}">Quần</a></li>
                                <li><a href="{{URL::to('product_type/Giày')}}">Dày</a></li>
                            </ul>
                        </li>
                        <li><a href="">Bộ sưu tập</a></li>
                        <li><a href="">Giới thiệu</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->
    
    <div class="inner-header">
        <div class="container" style="margin-top: 130px;">
            <div class="pull-left">
                <h6 class="inner-title">Shopping Cart</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Home</a> / <span>Shopping Cart</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">

            <div class="table-responsive">
                <!-- Shop Products Table -->
                <table class="shop_table beta-shopping-cart-table" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-status">Status</th>
                            <th class="product-quantity">Qty.</th>
                            <th class="product-subtotal">Total</th>
                            <th class="product-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        use Gloudemans\Shoppingcart\Facades\Cart;

                        $content = Cart::content(); ?>
                        @foreach($content as $cont);

                        <tr class="cart_item">

                            <td class="product-name">
                                <div class="media">
                                    <img class="pull-left" style="width:15%" src="{{URL:: to('public/backend/images/products/'.$cont->options->image)}}" alt="">
                                    <div class="media-body">
                                        <p class="font-large table-title">{{$cont->name}}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="product-price">
                                <span class="amount">{{number_format($cont->price).'đ'}}</span>
                            </td>

                            <td class="product-status">
                                In Stock
                            </td>

                            <td class="product-quantity">
                                <select name="product-qty" id="product-qty">
                                    <option value="0">{{$cont->qty}}</option>
                                </select>
                            </td>

                            <td class="product-subtotal">
                                <span class="amount"><?php $subtotal = $cont->price * $cont->qty;
                                                        echo (number_format($subtotal) . 'đ') ?></span>
                            </td>

                            <td class="product-remove">
                                <a href="{{URL::to('/delete-cart/' . $cont->rowId)}}" class="remove" title="Remove this item"><i class="fa fa-times text-danger text" style="color: red;"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End of Shop Table Products -->
            </div>
            


            <!-- Cart Collaterals -->
            <div class="cart-collaterals">

                <form class="shipping_calculator pull-left" action="{{URL::to('check-out')}}" method="post">
                    @csrf
                    <h2><a href="#" class="shipping-calculator-button">Thông tin đặt hàng<span>↓</span></a></h2>

                    <section class="shipping-calculator-form ">
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value="" placeholder="Người đặt hàng:" name="calc_shipping_name" style="width:300px" required>
                        </p>
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value="" placeholder="Địa chỉ:" name="calc_shipping_address" style="width:300px" required>
                        </p>

                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value="" placeholder="Số diện thoại:" name="calc_shipping_phone" style="width:300px" required>
                        </p>
                        <p><button type="submit" name="calc_shipping" value="1" class="beta-btn primary pull-right">Đặt hàng</button></p>
                        <?php $order_id=Session::get('order_detail_id');
                        if($order_id){
                            echo('<script>alert("Đặt hàng thành công")</script>');
                            Session::put('order_detail_id',null);
                        }?>
                    </section>
                </form>

                <div class="cart-totals pull-right">
                    <div class="cart-totals-row">
                        <h5 class="cart-total-title">Thanh toán</h5>
                    </div>
                    <div class="cart-totals-row"><span>Tổng:</span> <span>{{number_format(Cart::subtotal()).' đ'}}</span></div>
                    <div class="cart-totals-row"><span>Thuế:</span> <span>{{number_format(Cart::tax()).' đ'}}</span></div>

                    <div class="cart-totals-row"><span>Phí vận chuyển:</span> <span>Miễn phí</span></div>
                    <div class="cart-totals-row"><span>Thành tiền:</span> <span>{{number_format(Cart::total()).' đ'}}</span> </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <!-- End of Cart Collaterals -->
            <div class="clearfix"></div>

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