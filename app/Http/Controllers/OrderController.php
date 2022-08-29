<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\oder;
use App\models\order_details;
use App\models\shipping;
use App\models\product;
use App\models\coupon;
use App\models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use PDF;

class OrderController extends Controller
{
    public function AuthLogin(){

        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }

//        $admin_id = Auth::id();
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
    }

    public function manage_order()
    {
        $this->AuthLogin();
        $oder = Oder::orderBy('created_at', 'desc')->get();
        return view('Admin.Oder.manage_order')->with(compact('oder'));
    }

    public function view_order($order_code)
    {
        $this->AuthLogin();
        $order_details = Order_details::with('product')->where('order_code', $order_code)->get();
        $order = Oder::where('order_code', $order_code)->get();
        foreach ($order as $key => $ord) {
            $customerID = $ord->customerID;
            $shippingID = $ord->shippingID;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customerID', $customerID)->first();
        $shipping = Shipping::where('shippingID', $shippingID)->first();

        $order_details_product = Order_details::with('product')->where('order_code', $order_code)->get();

        foreach ($order_details_product as $key => $order_d) {
//
            $product_coupon = $order_d->product_coupon;

        }
//        $coupon = Coupon::Where('couponCode',$product_coupon)->first();
//        echo $coupon->couponNumber;
        if ($product_coupon != 'no') {
            $coupon = Coupon::where('couponCode', $product_coupon)->first();
            $couponCondition = $coupon->couponCondition;
            $couponNumber = $coupon->couponNumber;
        } else {
            $couponCondition = 2;
            $couponNumber = 0;
        }
        return view('Admin.Oder.view_order')->with(compact('order_details', 'customer', 'shipping', 'couponCondition', 'couponNumber', 'order', 'order_status'));
//        ,'couponCondition','couponNumber'


    }

    public function print_order($checkout_code)
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));

        return $pdf->stream();
    }

    public function print_order_convert($checkout_code)
    {

        $order_details = Order_details::where('order_code', $checkout_code)->get();
        $order = Oder::where('order_code', $checkout_code)->get();
        foreach ($order as $key => $ord) {
            $customerID = $ord->customerID;
            $shippingID = $ord->shippingID;
//            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customerID', $customerID)->first();
        $shipping = Shipping::where('shippingID', $shippingID)->first();
        $order_details_product = Order_details::with('product')->where('order_code', $checkout_code)->get();
        foreach ($order_details_product as $key => $order_d) {

            $product_coupon = $order_d->product_coupon;
        }
        if ($product_coupon != 'no') {
            $coupon = Coupon::where('couponCode', $product_coupon)->first();

            $couponCondition = $coupon->couponCondition;
            $couponNumber = $coupon->couponNumber;

            if ($couponCondition == 1) {
                $coupon_echo = $couponNumber . '%';
            } elseif ($couponCondition == 2) {
                $coupon_echo = number_format($couponNumber, 0, ',', '.') . 'VNĐ';
            }
        } else {
            $couponCondition = 2;
            $couponNumber = 0;

            $coupon_echo = '0';

        }

        $output = '';

        $output .= '
                       <style>body{
			                  font-family: DejaVu Sans;}
		                    .table-styling{
			                   border:1px solid #000;}
		                    .table-styling tbody tr td {
			                    border:1px solid #000;}
		               </style>
                  <h1><center>Tong CTY TNHH project HMPQ</center></h1>
		          <h4><center>Independence - Freedom - Happiness</center></h4>
		          	<p style="color: red">Orderer</p>
                  <table class="table-styling">
                       <thead>
                            <tr>
                                 <th>Customer Name</th>
                                 <th>Phone Number</th>
                                 <th>Email</th>
                            </tr>
                       </thead>
                          <tbody>';

        $output .= '
                      <tr>
                            <td>' . $customer->customerName . '</td>
                            <td>' . $customer->customerPhone . '</td>
                            <td>' . $customer->customerEmail . '</td>
                        </tr>';

        $output .= '</tbody>
                  </table>
                   <p style="color: red">Ship to</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Recipient Name</th>
						<th>Address</th>
						<th>Phone Number</th>
						<th>Email</th>
						<th>Notes</th>
					</tr>
				</thead>
				<tbody>';

        $output .= '
					<tr>
						<td>' . $shipping->shippingName . '</td>
						<td>' . $shipping->shippingAddress . '</td>
						<td>' . $shipping->shippingPhone . '</td>
						<td>' . $shipping->shippingEmail . '</td>
						<td>' . $shipping->shippingNote . '</td>

					</tr>';


        $output .= '
				</tbody>

		</table>
		 <p style="color: red">Orders placed</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Name Product</th>
						<th>Discount code</th>
						<th>Shipping fee</th>
						<th>Quantity</th>
						<th>Product Price</th>
						<th>Into Money</th>
					</tr>
				</thead>
				<tbody>';

        $total = 0;

        foreach ($order_details_product as $key => $product) {

            $subtotal = $product->productPrice * $product->product_sales_quantity;
            $total += $subtotal;

            if ($product->product_coupon != 'no') {
                $product_coupon = $product->product_coupon;
            } else {
                $product_coupon = 'No Discount Code';
            }

            $output .= '
					<tr>
						<td>' . $product->productName . '</td>
						<td>' . $product_coupon . '</td>
						<td>' . number_format($product->product_feeship, 0, ',', '.') . 'VNĐ' . '</td>
						<td>' . $product->product_sales_quantity . '</td>
						<td>' . number_format($product->productPrice, 0, ',', '.') . 'VNĐ' . '</td>
						<td>' . number_format($subtotal, 0, ',', '.') . 'VNĐ' . '</td>

					</tr>';
        }

        if ($couponCondition == 1) {
            $total_after_coupon = ($total * $couponNumber) / 100;
            $total_coupon = $total - $total_after_coupon;
        } else {
            $total_coupon = $total - $couponNumber;
        }

        $output .= '
                 <tr>
				<td colspan="2">
					<p>Total reduction: ' . $coupon_echo . ' </p>
					<p>Shipping fee: ' . number_format($product->product_feeship, 0, ',', '.') . 'VNĐ' . '</p>
					<p>Pay : ' . number_format($total_coupon + $product->product_feeship, 0, ',', '.') . 'VNĐ' . '</p>
				</td>
		</tr>';
        $output .= '
				</tbody>

		</table>

		<p style="color: red">Sign the recipient name</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Voucher maker</th>
						<th width="800px">Receiver</th>

					</tr>
				</thead>
				<tbody>';

        $output .= '
				</tbody>
		</table>
		';
        return $output;
    }

    public function update_order_qty(Request $request)
    {
        //update order
        $data = $request->all();
        $order = Oder::find($data['orderID']);
        $order->order_status = $data['order_status'];
        $order->save();
        if ($order->order_status == 2) {
            foreach ($data['order_product_id'] as $key => $productID) {
                $product = Product::find($productID);
                $Quantity = $product->Quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $Quantity - $qty;
                        $product->Quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        } elseif ($order->order_status != 2 && $order->order_status != 3) {
            foreach ($data['order_product_id'] as $key => $productID) {

                $product = Product::find($productID);
                $Quantity = $product->Quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $Quantity + $qty;
                        $product->Quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }

    }

    public function update_qty(Request $request){
        $data = $request->all();
        $order_details = Order_details::where('productID',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
        $order_details->product_sales_quantity = $data['order_qty'];
        $order_details->save();
    }
}

