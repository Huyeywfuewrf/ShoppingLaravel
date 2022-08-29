<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{
    public function AuthLogin(){

//        $admin_id = Session::get('admin_id');
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }

//        $admin_id = Auth::id();
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function  myformPost(Request $request){
        return $this->validate($request,[
            'couponCode' => 'required|min:3|max:100',
            'couponName' => 'required|min:3|max:100',
        ]);

    }
    public function  insert_coupon(){
        $this->AuthLogin();
        return view('Admin.coupon.insert_coupon');
    }
    public  function  insert_coupon_code(Request $request){
        $this->AuthLogin();
        $this->myformPost($request);
       $data = $request->all();

       $coupon = new coupon();
       $coupon->couponName = $data['couponName'];
       $coupon->couponCode = $data['couponCode'];
       $coupon->couponTime = $data['couponTime'];
       $coupon->couponCondition = $data['couponCondition'];
       $coupon->couponNumber = $data['couponNumber'];
       $coupon->save();
       Session::put('message', 'Coupon added successfully');
       return redirect::to('/insert-coupon');
    }
    public  function  list_coupon(){
        $this->AuthLogin();
        $coupon = Coupon::orderBy('couponID', 'desc')->get();
        return view('Admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public  function  delete_coupon($couponID){
        $this->AuthLogin();
        $coupon = Coupon::find($couponID);
        $coupon->delete();
        Session::put('message', 'Coupon deleted successfully');
        return redirect::to('/list-coupon');

    }
    public  function  unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon == true){
            Session::forget('coupon');
            return Redirect()->back()->with('message','Delete all promotion success');
        }
    }


}
