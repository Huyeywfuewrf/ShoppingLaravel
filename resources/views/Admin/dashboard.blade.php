@extends('admin_layout')
@section('admin_content')
   <h1 >Welcome to admin</h1>
   <div class="row">
       <div class="col-lg-3 col-6">
           <div class="small-box bg-info">
               <div class="inner">
                   <h3>{{$product_count}}</h3>
                   <p>Total number of product samples</p>
               </div>
               <div class="icon">
                   <i class="ion ion-bag"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
       </div>
       <div class="col-lg-3 col-6">

           <div class="small-box bg-success">
               <div class="inner">
                   <h3>{{$order_count}}<sup style="font-size: 20px"></sup></h3>
                   <p>Total number of orders</p>
               </div>
               <div class="icon">
                   <i class="ion ion-stats-bars"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
       </div>

       <div class="col-lg-3 col-6">

           <div class="small-box bg-warning">
               <div class="inner">
                   <h3>{{$customer_count}}</h3>
                   <p>Total number of customer</p>
               </div>
               <div class="icon">
                   <i class="ion ion-person-add"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
       </div>

       <div class="col-lg-3 col-6">

           <div class="small-box bg-danger">
               <div class="inner">
                   <h3>{{$order_detail}}</h3>
                   <p>Total number of orders details</p>
               </div>
               <div class="icon">
                   <i class="ion ion-pie-graph"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
           </div>
       </div>
   </div>
   <hr>
{{--       <div class="container-fluid">--}}
{{--           <style type="text/css">--}}
{{--               p.title_thongke{--}}
{{--                   text-align: center;--}}
{{--                   font-size: 20px;--}}
{{--                   font-weight: bold;--}}
{{--               }--}}
{{--           </style>--}}
{{--           <div class="row">--}}
{{--              <p class="title_thongke">Thống kê đơn hàng doanh số</p>--}}
{{--               <form autocomplete="off">--}}
{{--                   @csrf--}}
{{--                   <div class="col-md-5">--}}
{{--                       <P>Từ ngày: <input type="text" id="datepicker" class="form-control"></P>--}}
{{--                       <input type="button" id="btn-dasboard-filter" class="btn btn-primary btn-sm" value="lọc kết quả" >--}}
{{--                   </div>--}}

{{--                   <div class="col-md-5">--}}
{{--                       <P>Đến ngày: <input type="text" id="datepicker2" class="form-control"></P>--}}
{{--                   </div>--}}

{{--               </form>--}}
{{--               <div class="col-md-12">--}}
{{--                   <div id="chart" style="height: 250px; "></div>--}}
{{--               </div>--}}
{{--           </div>--}}

{{--       </div>--}}

   <div class="container-fluid pt-4 px-4">
       <div class="row g-4">
           <div class="col-md-12 col-xl-6">
               <div class="bg-light text-center rounded p-4">
                   <div class="d-flex align-items-center justify-content-between mb-4">
                       <div id="chart" style="height: 250px; "></div>
                   </div>
{{--                   <div class="col-md-12">--}}
{{--                       --}}
{{--                   </div>--}}
                   <canvas id="worldwide-sales" width="496" height="247" style="display: block; box-sizing: border-box; height: 224.545px; width: 450.909px;"></canvas>
               </div>
           </div>
{{--           <div class="col-sm-12 col-xl-6">--}}
{{--               <div class="bg-light text-center rounded p-4">--}}
{{--                   <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                       <h6 class="mb-0">Salse &amp; Revenue</h6>--}}
{{--                       <a href="">Show All</a>--}}
{{--                   </div>--}}
{{--                   <canvas id="salse-revenue" width="496" height="247" style="display: block; box-sizing: border-box; height: 224.545px; width: 450.909px;"></canvas>--}}
{{--               </div>--}}
{{--           </div>--}}
       </div>
   </div>
@endsection
