
@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Login information
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Customer name</th>
                        <th>Phone number</th>
                        <th>Email</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>{{$customer->customerName}}</td>
                        <td>{{$customer->customerPhone}}</td>
                        <td>{{$customer->customerEmail}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                Shipping information
            </div>


            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>

                        <th>Name of carrier/th>
                        <th>Address</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>Payments</th>


                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td>{{$shipping->shippingName}}</td>
                        <td>{{$shipping->shippingAddress}}</td>
                        <td>{{$shipping->shippingPhone}}</td>
                        <td>{{$shipping->shippingEmail}}</td>
                        <td>{{$shipping->shippingNote}}</td>
                        <td>@if($shipping->shipping_method==0) Transfer @else Receive new goods to pay @endif</td>


                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <br><br>
    <div class="table-agile-info">

        <div class="panel panel-default">
            <div class="panel-heading">
                List order details
            </div>

            <div class="table-responsive">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>

                <table class="table table-striped b-t b-light">
                    <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Product's name</th>
                        <th>Amount of stock left</th>
                        <th>Discount code</th>
                        <th>Shipping fee</th>
                        <th>Quantity</th>
                        <th>Product price</th>
                        <th>Total</th>

                        <th style="width:30px;"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 0;
                       $total =0;
                    @endphp
                    @foreach($order_details as $key => $details)
                        @php
                            $i++;
                           $subtotal = $details->productPrice * $details->product_sales_quantity;
                           $total += $subtotal;
                        @endphp
                        <tr class="color_qty_{{$details->productID}}">

                            <td><i>{{$i}}</i></td>
                            <td>{{$details->productName}}</td>
                            <td>{{$details->product->Quantity}}</td>
                            <td>@if($details->product_coupon!='no')
                                    {{$details->product_coupon}}
                                @else
                                    Do not use discount code
                                @endif
                            </td>
                            <td>{{number_format($details->product_feeship ,0,',','.')}} VNĐ</td>
                            <td>
                                <input type="number" min="1" {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->productID}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">

                                <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->productID}}" value="{{$details->product->Quantity}}">

                                <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

                                <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->productID}}">



                                @if($order_status!=2)

                                    <button class="btn btn-default update_quantity_order" data-product_id="{{$details->productID}}" name="update_quantity_order">Update</button>

                                @endif

                            </td>
                            <td>{{number_format($details->productPrice ,0,',','.')}} VNĐ</td>
                            <td>{{number_format($subtotal ,0,',','.')}} VNĐ</td>



                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">
                            @php
                                $total_coupon = 0;
                            @endphp
                            @if($couponCondition == 1)
                                @php
                                    $total_after_coupon = ($total* $couponNumber)/100;
                                    echo 'Total amount reduced by %: '.number_format($total_after_coupon,0,',','.').'</br>';
                                    $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
                                @endphp
                            @else
                                @php
                                    echo 'Total amount reduced by money: '.number_format($couponNumber,0,',','.').'VNĐ'.'</br>';
                                    $total_coupon = $total + $details->product_feeship - $couponNumber ;

                                @endphp
                            @endif

                            Shipping fee : {{number_format($details->product_feeship,0,',','.')}} VNĐ</br>
                            Pay: {{number_format($total_coupon,0,',','.')}} VNĐ
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            @foreach($order as $key => $or)
                                {{--                                đơn hàng mới--}}
                                @if($or->order_status==1)
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Choose an order form-----</option>
                                            <option id="{{$or->orderID}}" selected value="1">The order has not been processed</option>
                                            <option id="{{$or->orderID}}" value="2">Order Processed- And Delivered</option>
                                            <option id="{{$or->orderID}}" value="3">Order has been canceled -And on hold</option>
                                        </select>
                                    </form>
                                @elseif($or->order_status==2)
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Choose an order form-----</option>
                                            <option id="{{$or->orderID}}"  value="1">The order has not been processed</option>
                                            <option id="{{$or->orderID}}"  selected value="2">Order Processed- And Delivered</option>
                                            <option id="{{$or->orderID}}" value="3">Order has been canceled -And on hold</option>
                                        </select>
                                    </form>

                                @else
                                    <form>
                                        @csrf
                                        <select class="form-control order_details">
                                            <option value="">----Choose an order form-----</option>
                                            <option id="{{$or->orderID}}"  value="1">The order has not been processed</option>
                                            <option id="{{$or->orderID}}" value="2">Processed-Delivered</option>
                                            <option id="{{$or->orderID}}"  selected value="3">Order has been canceled -And on hold</option>
                                        </select>
                                    </form>

                                @endif
                            @endforeach


                        </td>
                    </tr>
                    </tbody>
                </table>
                <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">Print order</a>
            </div>

        </div>
    </div>
@endsection
