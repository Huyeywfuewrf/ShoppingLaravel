<?php
//
//namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//Use DB;
//use App\Http\Requests;
//Use Session;
//use Cart;
//use App\models\City;
//use App\models\Province;
//use App\models\Wards;
//use App\models\Feeship;
//
//Use Illuminate\Support\Facades\Redirect;
//session_start();
//use App\models\oder;
//use App\models\order_details;
//use App\models\shipping;
//class CheckoutController extends Controller
//{
//    public function AuthLogin(){
//        $employeeID = Session::get('employeeID');
//        if($employeeID){
//            return Redirect::to('Admin.dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
//    }
//    public function login_checkout(){
//        $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//        $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//        return view('pages.Checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product);
//    }
//    public  function  add_customer(Request $request){
//        $data = array();
//        $data['customerName'] = $request->customerName;
//        $data['customerEmail'] = $request->customerEmail;
//        $data['customerPassword'] = md5($request->customerPassword);
//        $data['customerPhone'] = $request->customerPhone;
//
//        $customerID = DB::table('customer')->insertGetId($data);
//        Session::put('customerID', $customerID); // lấy get ID của customer và lưu vào session
//        Session::put('customerName',  $request->customerName); // lấy get ID của customer và lưu vào session
//        return Redirect::to('/checkout');
//
//    }
//   public  function checkout(){
//       $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//       $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//       $city = City::orderBy('matp','ASC')->get();
//      return view('pages.Checkout.checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('city', $city);
//   }
//   public  function save_checkout_customer(Request $request){
//       $data = array();
//       $data['shippingName'] = $request->shippingName;
//       $data['shippingPhone'] = $request->shippingPhone;
//       $data['shippingEmail'] = $request->shippingEmail;
//       $data['shippingNote'] = $request->shippingNote;
//       $data['shippingAddress'] = $request->shippingAddress;
//
//       $shippingID = DB::table('shipping')->insertGetId($data);
//       Session::put('shippingID', $shippingID);
//       return Redirect::to('/payment');
//   }
// public function payment(){
//     $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//     $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//        return view('pages.Checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
// }
// public  function logout_checkout(){
//        Session::flush();
//        Session::put('customerName', null);
//        return Redirect::to('/login-checkout');
//
//}
//public function login_customer(Request $request){
//        $email = $request->email_account;
//        $password = md5($request->password_account);
//        $result = DB::table('customer')->where('customerEmail', $email)->where('customerPassword', $password)->first();
//        if($result) {
//            Session::put('customerID', $result->customerID); // lấy get ID của customer và lưu vào session
//            return Redirect::to('/checkout');
//        }
//        else{
//            return Redirect::to('/login-checkout');
//        }
//
//
//   }
//   public  function oder_place(Request $request){
//        //inser payment
//
//       $data = array();
//       $data['payment_method'] = $request->payment_option;
//       $data['payment_status'] = 'pending';
//       $paymentID = DB::table('payment')->insertGetId($data);
//
//
//       //insert order
//
//           $oder_data = array();
//           $oder_data['customerID'] = Session::get('customerID');
//           $oder_data['shippingID'] = Session::get('shippingID');
//           $oder_data['paymentID'] = $paymentID;
//           $oder_data['orderTotal'] = Cart::total();
//           $oder_data['orderStatus'] = 'Waiting for processing';
//           $orderID = DB::table('oder')->insertGetId($oder_data);
//
//
//       //insert order_detail
//       $content = Cart::content();
//       foreach($content as $v_content){
//       $oder_d_data = array();
//       $oder_d_data ['orderID'] = $orderID;
//       $oder_d_data ['productID'] = $v_content->id;
//       $oder_d_data ['productName'] = $v_content->name;
//       $oder_d_data ['productPrice'] = $v_content->price;
//       $oder_d_data ['product_sales_quantity'] = $v_content->qty;
//       DB::table('order_details')->insert($oder_d_data);
//   }
//       if($data['payment_method'] == 1){
//
//           Cart::destroy();
//           $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//           $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//           return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
//       }
//       elseif($data['payment_method'] == 2){
//           Cart::destroy();
//           $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//           $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//           return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
//
//       }
//       else{
//
//           Cart::destroy();
//           $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//           $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//           return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
//       }
//       //return Redirect::to('/payment');
//}
//  public function manage_order(){
//      $this->AuthLogin();
//      $all_order= DB::table('oder')->join('customer','oder.customerID','=','customer.customerID')
//          ->select('oder.*','customer.customerName')->orderby('oder.orderID', 'desc')->get();
//      $manage_order = view('Admin.Oder.manage_order')->with('all_order', $all_order);
//      return view('admin_layout')->with('Admin.Oder.manage_order', $manage_order);
//  }
//  public  function view_order($orderID){
//      $this->AuthLogin();
//      $order_by_id= DB::table('oder')
//          ->join('customer','oder.customerID','=','customer.customerID')
//          ->join('shipping','oder.shippingID','=','shipping.shippingID')
//          ->join('order_details','oder.orderID','=','order_details.orderID')
//          ->select('oder.*','customer.*','shipping.*','order_details.*')->first();
//      $manage_order_by_id = view('Admin.Oder.view_order')->with('order_by_id', $order_by_id);
//      return view('admin_layout')->with('Admin.Oder.view_order',  $manage_order_by_id );
//
//  }
//
//    public function select_delivery_home(Request $request){
//        $data = $request->all();
//        if($data['action']){
//            $output = '';
//            if($data['action']=="city"){
//                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
//                $output.='<option>---Chọn quận huyện---</option>';
//                foreach($select_province as $key => $province){
//                    $output.='<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
//                }
//
//            }else{
//
//                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
//                $output.='<option>---Chọn xã phường---</option>';
//                foreach($select_wards as $key => $ward){
//                    $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
//                }
//            }
//            echo $output;
//        }
//    }
//    public  function  calculate_fee(Request $request){
//        $data = $request->all();
//        if($data['matp']){
//            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
//            if($feeship){
//                $count_feeship = $feeship->count();
//                if($count_feeship>0){
//                    foreach($feeship as $key => $fee){
//                        Session::put('fee',$fee->fee_feeship);
//                        Session::save();
//                    }
//                }else{
//                    Session::put('fee',25000);
//                    Session::save();
//                }
//            }
//        }
//    }
//    public function del_fee(){
//        Session::forget('fee');
//        return redirect()->back();
//    }
//    public function confirm_order(Request $request){
//        $data = $request->all();
//
//        $shipping = new Shipping();
//        $shipping->shippingName = $data['shipping_name'];
//        $shipping->shippingEmail	= $data['shipping_email'];
//        $shipping->shippingPhone = $data['shipping_phone'];
//        $shipping->shippingAddress = $data['shipping_address'];
//        $shipping->shippingNote = $data['shipping_notes'];
//        $shipping->shipping_method = $data['shipping_method'];
//        $shipping->save();
//        $shippingID  = $shipping->shippingID ;
//
//        $checkout_code = substr(md5(microtime()),rand(0,26),5);
//
//        $oder = new Oder();
//        $oder->customerID = Session::get('customerID');
//        $oder->shippingID = $shippingID;
//        $oder->order_code = $checkout_code;
//        $oder->order_status = 1;
//        date_default_timezone_set('Asia/Ho_Chi_Minh');
//        $oder->created_at = now();
//        $oder->save();
//
//        if(Session::get('cart')==true){
//            foreach(Session::get('cart') as $key => $cart){
//                $order_details = new  Order_details();
//                $order_details->order_code = $checkout_code;
//                $order_details->productID = $cart['productID'];
//                $order_details->productName = $cart['productName'];
//                $order_details->productPrice = $cart['Price'];
//                $order_details->product_sales_quantity = $cart['Quantity'];
//                $order_details->product_coupon =  $data['order_coupon'];
//                $order_details->product_feeship = $data['order_fee'];
//                $order_details->save();
//            }
//        }
//        Session::forget('coupon');
//        Session::forget('fee');
//        Session::forget('cart');
//    }
//
//}


namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use App\models\City;
use App\models\Province;
use App\models\Wards;
use App\models\Feeship;


use Illuminate\Support\Facades\Redirect;

session_start();

use App\models\oder;
use App\models\order_details;
use App\models\shipping;
use App\models\Slider;
use App\models\coupon;
use App\models\Category;

class CheckoutController extends Controller
{
    public function AuthLogin()
    {
        $employeeID = Session::get('employeeID');
        if ($employeeID) {
            return Redirect::to('Admin.dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout()
    {
        $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID')->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID')->max('Price');
        $max_price_range = $max_price + 10000000;;
        $min_price_range = $min_price - 500000;;

        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();

        $cate_product = DB::table('tbl_category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
        return view('pages.Checkout.login_checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider) ->with('category_post', $category_post)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range);
    }

    public function add_customer(Request $request)
    {
        $data = array();
        $data['customerName'] = $request->customerName;
        $data['customerEmail'] = $request->customerEmail;
        $data['customerPassword'] = md5($request->customerPassword);
        $data['customerPhone'] = $request->customerPhone;

        $customerID = DB::table('tbl_customer')->insertGetId($data);
        Session::put('customerID', $customerID); // lấy get ID của customer và lưu vào session
        Session::put('customerName', $request->customerName); // lấy get ID của customer và lưu vào session
        return Redirect::to('/checkout');

    }

    public function checkout(Request $request)
    {
        $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID',$request)->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID',$request)->max('Price');
        $max_price_range = $max_price + 10000000;;
        $min_price_range = $min_price - 500000;;
        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();;
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
        $city = City::orderBy('matp', 'ASC')->get();
        return view('pages.Checkout.checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('city', $city) ->with('slider', $slider) ->with('category_post', $category_post)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range);
    }

    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shippingName'] = $request->shippingName;
        $data['shippingPhone'] = $request->shippingPhone;
        $data['shippingEmail'] = $request->shippingEmail;
        $data['shippingNote'] = $request->shippingNote;
        $data['shippingAddress'] = $request->shippingAddress;

        $shippingID = DB::table('shipping')->insertGetId($data);
        Session::put('shippingID', $shippingID);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cate_product = DB::table('tbl_category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
        return view('pages.Checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }

    public function logout_checkout()
    {
        Session::flush();
        Session::put('customerName', null);
        return Redirect::to('/login-checkout');

    }

    public function login_customer(Request $request)
    {
        //Check if the password and email are correct in the database
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customer')->where('customerEmail', $email)->where('customerPassword', $password)->first();
        if ($result) {
            Session::put('customerID', $result->customerID); // lấy get ID của customer và lưu vào session
            return Redirect::to('/checkout');
        } else {
            return Redirect::to('/login-checkout');
        }


    }

    public function oder_place(Request $request)
    {
        //inser payment

        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'pending';
        $paymentID = DB::table('payment')->insertGetId($data);


        //insert order

        $oder_data = array();
        $oder_data['customerID'] = Session::get('customerID');
        $oder_data['shippingID'] = Session::get('shippingID');
        $oder_data['paymentID'] = $paymentID;
        $oder_data['orderTotal'] = Cart::total();
        $oder_data['orderStatus'] = 'Waiting for processing';
        $orderID = DB::table('oder')->insertGetId($oder_data);


        //insert order_detail
        $content = Cart::content();
        foreach ($content as $v_content) {
            $oder_d_data = array();
            $oder_d_data ['orderID'] = $orderID;
            $oder_d_data ['productID'] = $v_content->id;
            $oder_d_data ['productName'] = $v_content->name;
            $oder_d_data ['productPrice'] = $v_content->price;
            $oder_d_data ['product_sales_quantity'] = $v_content->qty;
            DB::table('order_details')->insert($oder_d_data);
        }
        if ($data['payment_method'] == 1) {

            Cart::destroy();
            $cate_product = DB::table('category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
            $brand_product = DB::table('brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
            return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        } elseif ($data['payment_method'] == 2) {
            Cart::destroy();
            $cate_product = DB::table('category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
            $brand_product = DB::table('brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
            return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);

        } else {

            Cart::destroy();
            $cate_product = DB::table('category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
            $brand_product = DB::table('brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
            return view('pages.Checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        }
        //return Redirect::to('/payment');
    }

    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('tbl_oder')->join('tbl_customer', 'tbl_oder.customerID', '=', 'tbl_customer.customerID')
            ->select('tbl_oder.*', 'tbl_customer.customerName')->orderby('tbl_oder.orderID', 'desc')->get();
        $manage_order = view('Admin.Oder.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('Admin.Oder.manage_order', $manage_order);
    }

    public function view_order($orderID)
    {
        $this->AuthLogin();
        $order_by_id = DB::table('oder')
            ->join('tbl_customer', 'tbl_oder.customerID', '=', 'tbl_customer.customerID')
            ->join('tbl_shipping', 'tbl_oder.shippingID', '=', 'tbl_shipping.shippingID')
            ->join('tbl_order_details', 'tbl_oder.orderID', '=', 'tbl_order_details.orderID')
            ->select('oder.*', 'customer.*', 'shipping.*', 'tbl_order_details.*')->first();
        $manage_order_by_id = view('Admin.Oder.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('Admin.Oder.view_order', $manage_order_by_id);

    }

    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                $output .= '<option>---Chọn quận huyện---</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }

            } else {

                $select_wards = Wards::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                $output .= '<option>---Chọn xã phường---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output .= '<option value="' . $ward->xaid . '">' . $ward->name_xaphuong . '</option>';
                }
            }
            echo $output;
        }
    }

    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                } else {
                    Session::put('fee', 25000);
                    Session::save();
                }
            }
        }
    }

    public function del_fee()
    {
        Session::forget('fee');
        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $data = $request->all();

        $shipping = new Shipping();
        $shipping->shippingName = $data['shipping_name'];
        $shipping->shippingEmail = $data['shipping_email'];
        $shipping->shippingPhone = $data['shipping_phone'];
        $shipping->shippingAddress = $data['shipping_address'];
        $shipping->shippingNote = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shippingID = $shipping->shippingID;

        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);

        $oder = new Oder;
        $oder->customerID = Session::get('customerID');
        $oder->shippingID = $shippingID;
        $oder->order_code = $checkout_code;
        $oder->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $oder->created_at = now();
        $oder->save();

        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new  Order_details;
                $order_details->order_code = $checkout_code;
                $order_details->productID = $cart['productID'];
                $order_details->productName = $cart['productName'];
                $order_details->productPrice = $cart['Price'];
                $order_details->product_sales_quantity = $cart['Quantity'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
 public  function  quen_mat_khau(){
     $category_post =  Post::orderBy('cate_post_id', 'desc')->get();
     $slider = Slider::orderBy('slider_id','DESC')->take(4)->get();
     $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
     $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
     $supplier_product = DB::table('suppliers')->orderby('supplierID', 'desc')->get();
     $category = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
     $brand = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
     $supplier = DB::table('suppliers')->orderby('supplierID', 'desc')->get();
     $all_product = DB::table('product')->join('category','category.categoryID', '=', 'product.categoryID')
         ->join('brand','brand.brandID', '=', 'product.brandID')
         ->join('suppliers','suppliers.supplierID', '=', 'product.supplierID')
         ->orderby('product.productID', 'desc')->paginate(6);
     if(isset($_GET['sort_by'])) {
         $sort_by = $_GET['sort_by'];
         if($sort_by == 'tang_dan') {
             $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
                 ->join('brand', 'brand.brandID', '=', 'product.brandID')
                 ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
                 ->orderby('product.Price', 'asc')->paginate(12)->appends(Request()->query());
         }
         else if($sort_by == 'giam_dan') {
             $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
                 ->join('brand', 'brand.brandID', '=', 'product.brandID')
                 ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
                 ->orderby('product.Price', 'desc')->paginate(12)->appends(Request()->query());
         }
         else if($sort_by == 'kytu_az') {
             $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
                 ->join('brand', 'brand.brandID', '=', 'product.brandID')
                 ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
                 ->orderby('product.productName', 'asc')->paginate(12)->appends(Request()->query());
         }
         else if($sort_by == 'kytu_za') {
             $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
                 ->join('brand', 'brand.brandID', '=', 'product.brandID')
                 ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
                 ->orderby('product.productName', 'desc')->paginate(12)->appends(Request()->query());
         }
     } elseif (isset($_GET['start_price'] ) && isset($_GET['end_price'])){
         $min_price = $_GET['start_price'];
         $max_price = $_GET['end_price'];
         $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
             ->join('brand', 'brand.brandID', '=', 'product.brandID')
             ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
             ->whereBetween('product.Price', [$min_price, $max_price])->paginate(12)->appends(Request()->query());
     } else {
         $all_product = DB::table('product')->join('category', 'category.categoryID', '=', 'product.categoryID')
             ->join('brand', 'brand.brandID', '=', 'product.brandID')
             ->join('suppliers', 'suppliers.supplierID', '=', 'product.supplierID')
             ->orderby('product.productID', 'desc')->paginate(6);
     }
     $min_price = DB::table('product')->min('Price');
     $max_price = DB::table('product')->max('Price');
     $min_price_range = $min_price - 500000;
     $max_price_range = $max_price + 10000000;
     return view('pages.Checkout.forget_pass') ->with('category_post',$category_post)->with('slider',$slider)->with('cate_product',$cate_product)
            ->with('brand_product',$brand_product)->with('supplier_product',$supplier_product) ->with('all_product',$all_product)
         ->with('category',$category)->with('brand',$brand)->with('supplier',$supplier)
          ->with('min_price',$min_price)->with('max_price',$max_price)->with('min_price_range',$min_price_range)->with('max_price_range',$max_price_range);
 }
 public  function recover_pass(Request $request){
        $data = $request->all();
 }

}
