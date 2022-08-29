<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Cart;
use Illuminate\Http\Request;
Use DB;
use App\Http\Requests;
use Session;
use App\models\coupon;
use App\models\Slider;
Use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{

    public function save_cart(Request $request){
           $productId = $request->product_hidden;
           $Quantity = $request->qty;
           $product_info = DB::table('product')->where('productID',$productId)->first();
//          Cart::add('293ad', 'Product 1', 1, 9.99, 550);
            $data['id']=$product_info->productID;
            $data['name']=$product_info->productName;
            $data['qty']= $Quantity;
            $data['price']=$product_info->Price;
            $data['weight']=$product_info->Price;
            $data['options']['image']=$product_info->ImageUrl;
            Cart::add($data);
            Cart::setGlobalTax(0);
               return Redirect::to('/show-cart');

    }
    public function show_cart(){
        $category_post =  Post::orderBy('cate_post_id', 'desc')->take(10)->get();
        $slider = Slider::orderBy('slider_id','DESC')->take(10)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        return view('pages.Cart.show_cart')->with('tbl_category', $cate_product)->with('tbl_brand', $brand_product) ->with('category_post', $category_post) ->with('slider', $slider);
    }
    public  function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }
    public  function  update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qtv= $request->cart_quantity;
        Cart::update($rowId,$qtv);
        return Redirect::to('/show-cart');


    }
    public  function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $session_id = Substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_available = 0;
            foreach ($cart as $key => $val) {
                if ($val['productID'] == $data['cart_product_id']) {
                    $is_available++;
                }
            }
            if($is_available == 0){
                    $cart[] = array(
                    'session_id' => $session_id,
                    'productName' => $data['cart_product_name'],
                    'productID' => $data['cart_product_id'],
                     'product_qty' => $data['cart_product_qty'],
                     'Quantity' => $data['cart_product_quantity'],
                    'Price' => $data['cart_product_price'],
                    'ImageUrl' => $data['cart_product_image'],
                );
                Session::put('cart', $cart);
            }
        }else {
                $cart[] = array(
                    'session_id' => $session_id,
                    'productName' => $data['cart_product_name'],
                    'productID' => $data['cart_product_id'],
                    'product_qty' => $data['cart_product_qty'],
                    'Quantity' => $data['cart_product_quantity'],
                    'Price' => $data['cart_product_price'],
                    'ImageUrl' => $data['cart_product_image'],
                );
            Session::put('cart', $cart);
            }
        Session::save();
    }



    public  function  gio_hang(Request $request){
        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();;
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        $url_canonical = $request->url();
        $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $request)->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $request)->max('Price');
        $max_price_range = $max_price + 10000000;;
        $min_price_range = $min_price - 500000;;
        return view('pages.Cart.cart_ajax')->with('category', $cate_product)->with('brand', $brand_product)->with('slider', $slider) ->with('url_canonical', $url_canonical) ->with('category_post', $category_post)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('max_price_range', $max_price_range)->with('min_price_range', $min_price_range);
    }
    public  function  del_product($session_id){
        $cart = Session::get('cart');
        if($cart == true){
            foreach ($cart as $key => $val){
                if($val['session_id'] == $session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message','Delete product success');
        }else{
            return Redirect()->back()->with('message','Delete failed products');
        }
    }
 public  function  update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            $message = '';
            foreach ($data['cart_qty'] as $key => $qty){
                $i=0;
                foreach ($cart as $session => $val){
                    $i++;
                    if($val['session_id']==$key && $qty<$cart[$session]['Quantity']){
                        $cart[$session]['product_qty'] = $qty;
                        $message.='<p style="color:blue">'.$i.') Update quantity :'.$cart[$session]['productName'].' success</p>';
                    }elseif($val['session_id']==$key && $qty>$cart[$session]['Quantity']){
                        $message.='<p style="color:red">'.$i.') Update quantity :'.$cart[$session]['productName'].' failure</p>';
                    }

                }
            }
            Session::put('cart',$cart);
            return Redirect()->back()->with('message',$message);
            } else{
                return Redirect()->back()->with('message','Update failed products');
            }
 }
 public  function  del_all_product(){
        $cart = Session::get('cart');
        if($cart == true){
            Session::forget('cart');
            Session::forget('coupon');
            return Redirect()->back()->with('message','Delete all products success');
        }
 }
 public  function check_coupon(Request $request){
        $data = $request->all();
        $coupon = Coupon::where('couponCode',$data['coupon'])->first();
        if($coupon){
            $count_coupon =$coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_available = 0;
                    if($is_available == 0){
                        $cou[] = array(
                            'couponCode' => $coupon->couponCode,
                            'couponCondition' => $coupon->couponCondition,
                            'couponNumber' => $coupon->couponNumber,
                        );
                        Session::put('coupon',$cou);
                    }
            }else{
                $cou[] = array(
                    'couponCode' => $coupon->couponCode,
                    'couponCondition' => $coupon->couponCondition,
                    'couponNumber' => $coupon->couponNumber,
                );
                Session::put('coupon',$cou);
            }
                Session::save();
                return redirect()->back()->with('message','Successfully added discount code');
            }
        }else{
            return redirect()->back()->with('error','Discount code is not available');
        }
    }
     public  function  show_cart_menu(){
        $cart = count(Session::get('cart'));
       $output = '';
         $output.='<span class="badges">'.$cart.'</span>';
//       if($cart >0) {
//           $output .= '<li><a href="' . url('/gio-hang') . '"><i class="fa fa-shopping-cart"></i>
//                                   Cart
//                               <span class="badges">' . $cart . '</span>
//                               </a></li>';
//       }else{
//           $output .= '<li><a href="' . url('/gio-hang') . '"><i class="fa fa-shopping-cart"></i>
//                                   Cart
//                               <span class="badges">' . $cart . '</span>
//                               </a></li>';
//       }
//       echo $output;
         echo $output;
     }


}


