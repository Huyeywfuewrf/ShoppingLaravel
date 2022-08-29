<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="Complete interior models"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <meta name="author" content="">
    <link rel="canonical" href="http://localhost/ShoppingLaravel/"/>
    <title>Home | E-Shopper</title>

    <link href="{{asset('public/Fontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/sweetalert.css')}}" rel="stylesheet">

    <link href="{{asset('public/Fontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/Fontend/css/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('../public/Fontend/css/lightslider.min.css')}}" rel="stylesheet">
{{--    <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/css/lightgallery.min.css" rel="stylesheet">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('public/Fontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/home')}}"><img src="{{asset('public/Fontend/images/logo.png')}}" alt="ko có ảnh" /></a>
                    </div>
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">

                        <ul class="nav navbar-nav" >
                            <li><a href="{{URL::to('/information/'.Session::get('customerID'))}}"><i class="fa fa-star"></i> Information</a></li>
                            <?php
                            $customerID=Session::get('customerID');
                            $shippingID=Session::get('shippingID');
                            if($customerID!=NULL && $shippingID==NULL){
                                ?>
                            <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                            <?php
                            }elseif ($customerID!=NULL && $shippingID!=NULL){
                                ?>
                                <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <?php
                            }else{
                                ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a>
                            </li>
                                <?php
                            }
                            ?>

{{--                            <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>--}}
{{--                                    Cart--}}
{{--                                <span class="badges">1</span>--}}
{{--                                </a></li>--}}
{{--                            <style type="text/css">--}}
{{--                             span#show-cart li{--}}
{{--                                 margin-top: 9px;--}}
{{--                             }--}}
{{--                            </style>--}}
{{--                            <span id="show-cart"></span>--}}
                           <li><a href="{{url('/gio-hang')}}"><i class="fa fa-shopping-cart"></i>
                                                                Cart

                                                                   <span class="show-cart"></span>
{{--                                   <ul>--}}
{{--                                       <li>--}}
{{--                                           <a href="">--}}
{{--                                               <img src="{{asset('public/uploads/product/product12.jpg')}}" width="100px" height="100px" >--}}
{{--                                               <p>2500000</p>--}}
{{--                                               <p>so luong : </p>--}}
{{--                                           </a>--}}
{{--                                       </li>--}}
{{--                                   </ul>--}}

                           </a></li>
                            <?php
                              $customerID=Session::get('customerID');
                              if($customerID!=NULL){
                                ?>
                            <li>
                                <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Logout</a>
                                <br>
                                <img width="15%" src="{{Session::get('customer_picture')}}">  Welcome:  {{Session::get('customerName')}}
                            </li>
                                <?php
                                }else{
                                ?>
                            <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
                            <?php
                                }
                            ?>
                        </ul>
                        </br>
                        <ul>


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/home')}}" class="active">Home</a></li>
{{--                            <li><a href="{{URL::to('/detail')}}" class="active">Product Detail</a></li>--}}
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{URL::to('/home')}}">Products</a></li>
{{--                                    <li><a href="product-details.html">Product Details</a></li>--}}
{{--                                    <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                    <li><a href="cart.html">Cart</a></li>--}}
{{--                                    <li><a href="login.html">Login</a></li>--}}
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach($category_post as $key => $danhmuc)
                                    <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmuc->cate_post_id)}}">{{$danhmuc->cate_post_name}}</a></li>
{{--                                    <li><a href="blog-single.html">Blog Single</a></li>--}}
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{URL::to('/gio-hang')}}">Cart

                                          <span class="show-cart" ></span>

                                </a></li>
                            <li><a href="contact-us.html">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-5">
                    <form action="{{URL::to('/seach')}}" method="POST">
                        {{csrf_field()}}
                    <div class="search_box pull-right">
                        <input type="text" name="keywords_submit" placeholder="Search product" />
                        <input type="submit" style="margin-top:0;color:#666" name="search_items" class="btn btn-primary btn-sm" value="Search">
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    {{--                    <style type="text/css">--}}
                    {{--                        img.img.img-responsive.img-slider {--}}
                    {{--                            height: 350px;--}}
                    {{--                        }--}}
                    {{--                    </style>--}}
                    <div class="carousel-inner">
                        @php
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                                <div class="col-sm-6">
                                    <p>{{$slide->slider_desc}}</p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img  src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="200" width="500" class="girl img-responsive" alt="" />
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                      @foreach($category as $key => $cate)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{URL::to('/category/'.$cate->categoryID)}}">{{$cate->categoryName}}</a></h4>
                            </div>
                        </div>
                        @endforeach
                    </div><!--/category-products-->

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($brand as $key => $brand)
                                <li><a href="{{URL::to('/brand/'.$brand->brandID)}}"> <span class="
                                pull-right"></span>{{$brand->brandName}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!--/brands_products-->


                </div>
            </div>

            <div class="col-sm-9 padding-right">
                @yield('content')
            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{asset('public/Fontend/images/gallery4.jpg')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{asset('public/Fontend/images/gallery4.jpg')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{asset('public/Fontend/images/gallery4.jpg')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{asset('public/Fontend/images/gallery4.jpg')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="address">
                        <img src="{{asset('public/Fontend/images/gallery4.jpg')}}" alt="" />
                        <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Online Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Change Location</a></li>
                            <li><a href="#">FAQ’s</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Quock Shop</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">T-Shirt</a></li>
                            <li><a href="#">Mens</a></li>
                            <li><a href="#">Womens</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Shoes</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Policies</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privecy Policy</a></li>
                            <li><a href="#">Refund Policy</a></li>
                            <li><a href="#">Billing System</a></li>
                            <li><a href="#">Ticket System</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Company Information</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Store Location</a></li>
                            <li><a href="#">Affillate Program</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Shopper</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Get the most recent updates from <br />our site and be updated your self...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer>
<script src="{{asset('public/Fontend/js/jquery.js')}}"></script>
<script src="{{asset('public/Fontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/Fontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/Fontend/js/price-range.js')}}"></script>
<script src="{{asset('public/Fontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/Fontend/js/main.js')}}"></script>
<script src="{{asset('public/Fontend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('public/Fontend/js/prettify.js')}}"></script>
<script src="{{asset('public/Fontend/js/lightslider.min.js')}}"></script>
<script src="{{asset('public/Fontend/js/lightslider.js')}}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true, //lick vòng lặp
            thumbItem:3,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad: function(el) {
                el.lightGallery({
                    selector: '#imageGallery .lslide'
                });
            }
        });
    });
</script>
<script type="text/javascript">
    show_cart();
    function  show_cart(){
        $.ajax({
            url: '{{url('show-cart')}}',
            method: 'GET',
            success: function(data){
                $('.show-cart').html(data);
            }
        });
    }
    $(document).ready(function(){
          // show cart quantity
        $('.add-to-cart').click(function(){
            var id = $(this).data('id_product');
            var cart_product_id = $('.cart_product_id_' +id).val();
            var cart_product_name = $('.cart_product_name_' +id).val();
            var cart_product_image = $('.cart_product_image_' +id).val();

            var cart_product_quantity = $('.cart_product_quantity_' + id).val();

            var cart_product_price = $('.cart_product_price_' +id).val();
            var cart_product_qty = $('.cart_product_qty_' +id).val();
            var  _token = $('input[name="_token"]').val();
            if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                alert('Please smaller quantity ' + cart_product_quantity);
            }else {
                $.ajax({
                    url: '{{url('/add-cart-ajax')}}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        cart_product_quantity:cart_product_quantity,
                        _token: _token
                    },
                    success: function (data) {
                        swal({
                                title: "Product added to cart",
                                text: "You can continue to purchase or go to the shopping cart to proceed to checkout",
                                showCancelButton: true,
                                cancelButtonText: "See more products",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Go to cart",
                                closeOnConfirm: false
                            },
                            function () {
                                window.location.href = "{{url('/gio-hang')}}";
                            });
                        show_cart();

                    }
                })
            }
        })
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.calculate_delivery').click(function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var xaid = $('.wards').val();
            var _token = $('input[name="_token"]').val();
            if(matp == '' && maqh =='' && xaid ==''){
                alert('Please choose to charge for shipping');
            }else{
                $.ajax({
                    url : '{{url('/calculate-fee')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }
                });
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    });

</script>
<script type="text/javascript">

    $(document).ready(function(){
        $('.send_order').click(function(){
            swal({
                    title: "Order confirmation",
                    text: "Orders will not be refunded when placed, do you want to order?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Thanks, Buy",

                    cancelButtonText: "Closed, not bought yet",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        var shipping_email = $('.shipping_email').val();
                        var shipping_name = $('.shipping_name').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();
                        // alert(shipping_email);
                        // alert(shipping_name);
                        // alert(shipping_address);
                        // alert(shipping_phone);
                        // alert(shipping_notes);
                        // alert(shipping_method);
                        // alert(order_fee);
                        // alert(order_coupon);
                        // alert(_token);



                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data:{shipping_email:shipping_email,shipping_name:shipping_name,shipping_address:shipping_address,shipping_phone:shipping_phone,shipping_notes:shipping_notes,_token:_token,order_fee:order_fee,order_coupon:order_coupon,shipping_method:shipping_method},
                            success:function(){
                                swal("Order", "Your order has been sent successfully", "success");
                            }
                        });

                        window.setTimeout(function(){
                            // alert('Your order has been sent successfully');
                                location.reload();
                        } ,3000);

                    } else {
                        swal("Close", "The order has not been sent, please complete the order", "error");

                    }

                });


        });
    });


</script>
<script type="text/javascript">
    function validateform() {
        var customerName = document.login2.customerEmail.value;
        var customerPassword = document.login2.customerPassword.value;
        var customerEmail = document.login2.customerEmail.value;
        var customerPhone = document.login2.customerPhone.value;
        if (customerName == "" || customerPassword == "" || customerEmail == "" || customerPhone == "") {
            alert("Please enter your email address");
            // document.login2.customerEmail.focus();
            return false;
        } else if (customerEmail.indexOf('@') == -1 || customerEmail.indexOf('.') == -1) {
            alert("Please enter a valid email address");
            // document.login2.customerEmail.focus();
            return false;
        } else if (customerPassword.length < 6) {
            alert("Please enter a password of at least 6 characters");
            // document.login2.customerPassword.focus();
            return false;
        } else if (customerPhone.length < 10) {
            alert("Please enter a valid phone number");
            // document.login2.customerPhone.focus();
            return false;
        } else {
            return true;
        }



    }
</script>
<script type="text/javascript">
    $(document).ready(function (){
       $('#sort').on('change',function(){
           var url = $(this).val();
             if(url){
               window.location.href = url;
           }
             return false;
           // alert(url);
       });
    });
</script>
<script>
    $(document).ready(function (){
        $( "#slider-range" ).slider({
            orientation: "horizontal",
            range: true,
            min: {{$min_price_range}},
            max: {{$max_price_range}},
            {{--max: {{$max_price_range}},--}}
            {{--max: {{$max_price_range}},--}}
            values: [ {{$min_price}}, {{$max_price}} ],
             step : 10,
            slide: function( event, ui ) {
                $( "#amount" ).val( "VNĐ " + ui.values[ 0 ] + " - VNĐ " + ui.values[ 1 ] );
                $( "#start_price" ).val(ui.values[ 0 ] );
                $( "#end_price" ).val(ui.values[ 1 ]);
            }

        });

        $( "#amount" ).val( "VNĐ " + $( "#slider-range" ).slider( "values", 0 ) +
            " - VNĐ " + $( "#slider-range" ).slider( "values", 1 ) );
    });

</script>
</body>
</html>

