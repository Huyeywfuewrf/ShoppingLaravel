@extends('layout')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{URL::to('/home')}}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::content();
                ?>
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Image</td>
                        <td class="text-center">Description</td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="text-center">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($content as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="150" height="150" alt="" /></a>
                        </td>
                        <td class="cart_description">
                            <h4 class="text-center"><a href="">{{$v_content->name}}</a></h4>
                            <p class="text-center"><b>ID:</b>{{$v_content->id}} </p>
                        </td>
                        <td class="cart_price">
                            <p>{{number_format($v_content->price).''.'VND'}}</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                 <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{csrf_field()}}
                                <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                <input type="submit" value="update" name="update_qty" class="btn btn-default btn-sm">
                                 </form>
                            </div>
                        </td>
                        <td class="text-center">
                            <p class="cart_total_price">
                                <?php
                                   $subtotal = $v_content->price * $v_content->qty;
                                   echo number_format($subtotal).' '.'VND';
                                ?>
                            </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">

            <div class="row">
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Total<span>{{(Cart::pricetotal(0, ','.'.')).' '.'VND'}}</span></li>
                            <li>Tax <span>{{(Cart::Tax(0, ','.'.')).' '.'VND'}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Into money <span>{{(Cart::total(0, ','.'.')).' '.'VND'}}</span></li>
                        </ul>
                        <?php
                        $customerID=Session::get('customerID');
                        if($customerID!=NULL){
                        ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Check Out</a>
                        <?php
                        }else{
                        ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Check Out</a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
