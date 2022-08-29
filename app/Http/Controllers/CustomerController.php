<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Illuminate\Support\Facades\Redirect;
Use Session;
use App\Models\Customer;
session_start();
class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public  function  all_customer(){
        $this->AuthLogin();
        $data = request()->all();
        $customer =  Customer::orderBy('customerID', 'desc')->paginate(10);
        return view('Admin.customer.all_customer')->with(compact('customer'));
    }
    public function  delete_customer($customerID){
        $customer = Customer::find($customerID);
        $customer->delete();
        Session::put('message', 'Delete Customer Successfully !');
        return redirect()->back();
    }
    public  function  valudateCustomer(Request $request){
        return $this->validate($request,[
            'customerName' => 'required|max:100',
            'customerEmail' => 'required|max:100',
            'customerPassword' => 'required|max:100',
            'customerPhone' => 'required|max:100',
        ]);
    }
    public  function  information($customerID){

        $customer = Customer::where('customerID', $customerID)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
        $category = DB::table('tbl_category')->where('categoryStatus', '1')->orderby('categoryID', 'desc')->get();
        $brand = DB::table('tbl_brand')->where('brandStatus', '1')->orderby('brandID', 'desc')->get();
        $category_post = Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $customerID)->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $customerID)->max('Price');
        $max_price_range = $max_price + 10000000;
        $min_price_range = $min_price - 500000;


        return view('pages.Checkout.information')->with(compact('customer', 'category_post', 'slider',
            'cate_product', 'brand_product' ,'category' ,'brand' ,'min_price_range' ,'max_price_range','min_price','max_price'));


    }
    public  function  update_customer(Request $request, $customerID){
        $this->valudateCustomer($request);
        $data = request()->all();
        $customer = Customer::find($customerID);
        $customer = new  Customer();
        $customer->customerName = $data['customerName'];
        $customer->customerEmail = $data['customerEmail'];
        $customer->customerPassword = md5($data['customerPassword']);
        $customer->customerPhone = $data['customerPhone'];
        $customer->save();
        Session::put('message', 'Update Customer Successfully !');
        return redirect()->back();
    }

}
