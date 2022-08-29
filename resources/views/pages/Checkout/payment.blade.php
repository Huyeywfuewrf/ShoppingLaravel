@extends('layout')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/home')}}">Home</a></li>
                <li class="active">Checkout cart</li>
            </ol>
        </div><!--/breadcrums-->

    <div class="review-payment">
        <h2>Review cartt</h2>
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
        <h4 style="margin: 40px 0; font-size: 20px;">Choose payment method</h4>
        <form method="POST" action="{{URL::to('/oder-place')}}">
            {{method_field('POST')}}
            {{csrf_field()}}
                <div class="payment-options">
					<span>
						<label><input name="payment_option" value="1" type="checkbox"> Direct Bank Transfer</label>
					</span>
                    <span>
						<label><input name="payment_option" value="2" type="checkbox"> Receive new goods to pay</label>
					</span>
                     <span>
						<label><input name="payment_option" value="3" type="checkbox"> Pay by debit card</label>
					</span>
                   <input type="submit" value="Pay" name="send_oder_place" class="btn btn-primary btn-sm">
    </div>
        </form>
    </div>

</section> <!--/#cart_items-->
@endsection
