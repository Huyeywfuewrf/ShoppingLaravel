
<!DOCTYPE html>
<head>
    <title> Admin  | Home </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('public/Backend/css/bootstrap.min.css')}}" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('public/Backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/Backend/')}}css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('public/Backend/css/font.css')}}" type="text/css"/>
    <link href="{{asset('public/Backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/Backend/css/morris.css')}}" type="text/css"/>
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('public/Backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('public/Backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('public/Backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('public/Backend/js/morris.js')}}"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>
<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo">
                Admin
            </a>
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div>
        </div>
        <!--logo end-->
        <div class="top-nav clearfix">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
{{--                <li>--}}
{{--                    <input type="text" class="form-control search" placeholder=" Search">--}}
{{--                </li>--}}
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="{{asset('public/Backend/images/2.png')}}">
{{--                        <span class="username">--}}
{{--                            <?php--}}
{{--                            $admin_name = Auth::user()->admin_name;--}}
{{--                            if($admin_name){--}}
{{--                               echo $admin_name;--}}
{{--                            }--}}

{{--                            ?>--}}
{{--                        </span>--}}
                   <span class="username">
                	<?php
                            $name = Session::get('admin_name');
                            if($name){
                                echo $name;
                            }
                            ?>

                  </span>

{{--                        <b class="caret"></b>--}}
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
{{--                        <li><a href="{{URL::to('/logOut')}}"><i class="fa fa-key"></i> Log Out</a></li>--}}
                        <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->

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
                        <a class="active" href=" {{URL :: to('/dashboard')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Category manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-category-product')}}">Create Category Product</a></li>
                            <li><a href="{{URL::to('/all-category-product')}}">List Category Product</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-barcode"></i>
                            <span>Product Brands manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-brand-product')}}">Create Brands Product </a></li>
                            <li><a href="{{URL::to('/all-brand-product')}}">List Brands Product </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-solid fa-truck"></i>
                            <span>Product Supplier manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-supplier-product')}}">Create Supplier Product </a></li>
                            <li><a href="{{URL::to('/all-supplier-product')}}">List Supplier Product </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-brands fa-newspaper-o"></i>
                            <span>Articles Manager </span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-post')}}">Create  Articles </a></li>
                            <li><a href="{{URL::to('/all-post')}}">List  Articles </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-product-hunt"></i>
                            <span>Product manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-product')}}">Create  Product </a></li>
                            <li><a href="{{URL::to('/all-product')}}">List  Product </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-solid fa-cart-plus"></i>
                            <span>Manage orders </span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/manage-order')}}">Order Management </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-solid fa-tag"></i>
                            <span>Manage discount codes</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/insert-coupon')}}">Create Coupon Management</a></li>
                            <li><a href="{{URL::to('/list-coupon')}}">List Counpon Management</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-solid fa-recycle"></i>
                            <span>Post manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-category-post')}}">Create Post Management</a></li>
                            <li><a href="{{URL::to('/all-category-post')}}">List Post Management</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-thin fa-anchor"></i>
                            <span>Manage shipping costs</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/delivery')}}">Shipping Management</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Users</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-users')}}">Thêm user</a></li>
                            <li><a href="{{URL::to('/users')}}">Liệt kê user</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Slider manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/add-slider')}}">Create Slider</a></li>
                            <li><a href="{{URL::to('/manage-slider')}}">List Slider</a></li>

                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>Customer manager</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{URL::to('/all-customer')}}">List Customer</a></li>

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
          @yield('admin_content')
        </section>
        <!-- footer -->
        <!-- / footer -->
    </section>
    <!--main content end-->
</section>
<script src="{{asset('public/Backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/Backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/Backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/Backend/js/scripts.js')}}"></script>
<script src="{{asset('public/Backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/Backend/js/jquery.nicescroll.js')}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('public/Backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
<script src="{{asset('public/Backend/js/jquery.scrollTo.js')}}"></script>
<script src="{{asset('public/Backend/js/formValidation.min.js')}}"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'chart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                { year: '2022-08-14',sales:20000000, total_order: 20 },
                { year: '2022-08-15',sales:30000000, total_order: 10 },
                { year: '2022-08-16',sales:40000000, total_order: 5 },
                { year: '2022-08-17',sales:50000000, total_order: 5 },
                { year: '2022-08-18',sales:60000000, total_order: 20 },
                { year: '2022-08-19',sales:20000000, total_order: 20 },
                { year: '2022-08-20',sales:20000000, total_order: 20 }
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['order' , 'sales' , 'profit' , 'quantity'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['đơn hàng','sales','profit','quantity'],
        });
    } );

</script>
<!-- morris JavaScript -->
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function() {--}}
{{--        chart30daysorder();--}}
{{--        var chart = new Morris.Bar({--}}
{{--            element: 'chart',--}}
{{--            lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],--}}

{{--                // fillOpacity: 0.6,--}}
{{--                hidenHover: auto,--}}
{{--                parseTime: false,--}}
{{--            // data: [--}}
{{--            //     { period: '2018', value: 20,profit:60 },--}}
{{--            //     { period: '2019', value: 10,profit:60 },--}}
{{--            //     { period: '2020', value: 5,profit:60 },--}}
{{--            //     { period: '2021', value: 5,profit:60 },--}}
{{--            //     { period: '2022', value: 20,profit:60 }--}}
{{--            // ],--}}
{{--            xkey: 'period',--}}

{{--            ykeys: ['order' , 'sales' , 'profit' , 'quantity'],--}}

{{--            labels: ['đơn hàng','sales','profit','quantity'],--}}

{{--        });--}}
{{--        function chart30daysorder(){}--}}
{{--    } );--}}

{{--</script>--}}

<script type="text/javascript">
    $(document).ready(function() {
        var chart = new Morris.Bar({
            element: 'chart',
               lineColors:['#819C79','#fc8710','#FF6541','#A4ADD3','#766B56'],
                    parseTime: false,
            // data: [
            //     { year: '2008', value: 20 },
            //     { year: '2009', value: 10 },
            //     { year: '2010', value: 5 },
            //     { year: '2011', value: 5 },
            //     { year: '2012', value: 20 }
            // ],
                xkey: 'period',
                ykeys: ['order' , 'sales' , 'profit' , 'quantity'],
                labels: ['đơn hàng','doanh số','lợi nhuận','số lượng'],
        });

       $('#btn-dasboard-filter').click(function() {
            var _token = $('input[name="_token"]').val();
            var form_date=$('#datepicker').val();
            var to_date=$('#datepicker2').val();
            // alert(form_date);
            // alert(to_date);
            $.ajax({
                url: "{{url('/filter-by-date')}}",
                method: "POST",
                dateType: "JSON",
                data: {
                    form_date: form_date,
                    to_date: to_date,
                    _token: _token
                },
                success: function(data) {
                    chart.setData(data);
                }
            });

       });
    } );
</script>
<script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
        $( "#datepicker2" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    } );
</script>
<script type="text/javascript">

    function ChangeToSlug()
    {
        var slug;

        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }




</script>
<script type="text/javascript">
    $(document).ready(function(){

        fetch_delivery();

        function fetch_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/select-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                    $('#load_delivery').html(data);
                }
            });
        }
        $(document).on('blur','.fee_feeship_edit',function(){

            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            // alert(feeship_id);
            // alert(fee_value);
            $.ajax({
                url : '{{url('/update-delivery')}}',
                method: 'POST',
                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                    fetch_delivery();
                }
            });

        });
        $('.add_delivery').click(function(){

            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            // alert(city);
            // alert(province);
            // alert(wards);
            // alert(fee_ship);
            $.ajax({
                url : '{{url('/insert-delivery')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                    fetch_delivery();
                }
            });


        });
        $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })


</script>
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function() {--}}
{{--        fetch_delivery();--}}
{{--        function fetch_delivery(){--}}
{{--            var _token = $('input[name="_token"]').val();--}}
{{--            $.ajax({--}}
{{--                url: '{{url('/select-feeship')}}',--}}
{{--                method: 'POST',--}}
{{--                data:{--}}
{{--                    _token:_token--}}
{{--                },--}}
{{--                success:function(data){--}}
{{--                    $('#load_delivery').html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--        $(document).on('blur','.fee_feeship_edit',function(){--}}
{{--            var feeship_id = $(this).data('feeship_id');--}}
{{--            var fee_value = $(this).text();--}}
{{--            var _token = $('input[name="_token"]').val();--}}
{{--            $.ajax({--}}
{{--                url: '{{url('/update-delivery')}}',--}}
{{--                method: 'POST',--}}
{{--                data:{feeship_id:feeship_id, fee_value:fee_value, _token:_token},--}}
{{--                success:function(data){--}}
{{--                    fetch_delivery();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        $('.add_delivery').click(function(){--}}
{{--            var city = $('.city').val();--}}
{{--            var province = $('.province').val();--}}
{{--            var wards = $('.wards').val();--}}
{{--            var fee_ship = $('.fee_ship').val();--}}
{{--            var _token = $('input[name="_token"]').val();--}}
{{--            // alert(city);--}}
{{--            //    alert(province);--}}
{{--            //      alert(wards);--}}
{{--            //          alert(fee_ship);--}}
{{--            $.ajax({--}}
{{--                url: '{{url('/insert-delivery')}}',--}}
{{--                method: 'POST',--}}
{{--                data:{--}}
{{--                    city:city,--}}
{{--                    province:province,--}}
{{--                    wards:wards,--}}
{{--                    fee_ship:fee_ship,--}}
{{--                    _token:_token--}}
{{--                },--}}
{{--                success:function(data){--}}
{{--                    fetch_delivery();--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        --}}{{--$('.add_delivery').click(function(){--}}

{{--        --}}{{--    var city = $('.city').val();--}}
{{--        --}}{{--    var province = $('.province').val();--}}
{{--        --}}{{--    var wards = $('.wards').val();--}}
{{--        --}}{{--    var fee_ship = $('.fee_ship').val();--}}
{{--        --}}{{--    var _token = $('input[name="_token"]').val();--}}
{{--        --}}{{--    // alert(city);--}}
{{--        --}}{{--    // alert(province);--}}
{{--        --}}{{--    // alert(wards);--}}
{{--        --}}{{--    // alert(fee_ship);--}}
{{--        --}}{{--    $.ajax({--}}
{{--        --}}{{--        url : '{{url('/insert-delivery')}}',--}}
{{--        --}}{{--        method: 'POST',--}}
{{--        --}}{{--        data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},--}}
{{--        --}}{{--        success:function(data){--}}
{{--        --}}{{--            fetch_delivery();--}}
{{--        --}}{{--        }--}}
{{--        --}}{{--    });--}}


{{--        --}}{{--});--}}
{{--        $('.choose').on('change',function (){--}}
{{--            var action = $(this).attr('id');--}}
{{--            var ma_id = $(this).val();--}}
{{--            var _token = $('input[name="_token"]').val();--}}
{{--            var result = '';--}}
{{--            // alert(action);--}}
{{--            // alert(matp);--}}
{{--            // alert(_token);--}}
{{--            if(action =='city'){--}}
{{--                result = 'province';--}}
{{--            } else{--}}
{{--                result = 'wards';--}}
{{--            }--}}
{{--            $.ajax({--}}
{{--                url: '{{url('/select-delivery')}}',--}}
{{--                method: 'POST',--}}
{{--                data:{--}}
{{--                    action:action,--}}
{{--                    ma_id:ma_id,--}}
{{--                    _token:_token--}}
{{--                },--}}
{{--                success:function(data){--}}
{{--                    $('#'+result).html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    })--}}
{{--</script>--}}
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var order_qty = $('.order_qty_'+ order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();


        $.ajax({
            url : '{{url('/update-qty')}}',

            method: 'POST',

            data:{_token:_token, order_product_id:order_product_id ,order_qty:order_qty ,order_code:order_code},
            // dataType:"JSON",
            success:function(data){

                alert('Update number successfully');

                location.reload();

            }
        });

    });
</script>
<script type="text/javascript">
    $('.order_details').change(function(){
        var order_status = $(this).val();
        var orderID = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();
        //lay ra so luong
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });
        //lay ra product id
        order_product_id = [];
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            //so luong khach dat
            var order_qty = $('.order_qty_' + order_product_id[i]).val();
            // //so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();


            if(parseInt(order_qty)>parseInt(order_qty_storage)){
                j = j + 1;
                if(j==1){
                    alert('The quantity sold in stock is not enough');
                }
                $('.color_qty_'+order_product_id[i]).css('background','#000');
            }
        }
        if(j==0){

            $.ajax({
                url : '{{url('/update-order-qty')}}',
                method: 'POST',
                data:{_token:_token, order_status:order_status ,orderID:orderID ,quantity:quantity, order_product_id:order_product_id},
                success:function(data){
                    alert('Change order status successfully');
                    // alert('cập nhập số lượng thành công')
                    location.reload();
                }
            });

        }

    });
</script>

<script>
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2');
</script>
<script>
    $(document).ready(function() {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function() {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function() {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function() {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth:true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity:0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors:['#eb6f6f','#926383','#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
<!-- calendar -->
<script type="text/javascript" src="{{asset('public/Backend/js/monthly.js')}}"></script>
<script type="text/javascript">
    $(window).load( function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch(window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
</body>
</html>

