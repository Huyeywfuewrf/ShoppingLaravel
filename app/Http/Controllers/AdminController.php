<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Social;
use App\Models\Statistic;
use Illuminate\Http\Request;
use Socialite;
use DB;
use App\Http\Requests;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();
use App\models\Customer;
use App\models\SocialCustomers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\oder;
use App\Models\order_details;


class AdminController extends Controller
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
    public  function index()
    {

        return view('admin_login');

    }
    public  function show_dashboard()
    {
        $this->AuthLogin();
        //Count the number of columns quantity
        $product_count = Product::count();
//        $product_count = Product::count()->where('Quantity', 1);
        $order_count = oder::count();
        $customer_count = Customer::count();
        $order_detail = order_details::count();
        $order = oder::where('order_status', 0)->count();
        return view('Admin.dashboard')->with(compact('product_count','order_count','customer_count' ,'order_detail' ,'order'));
    }

     public function dashboard(Request $request)
     {
//         $data = $request->all();
         $data = $request->validate([
             //validation laravel
             'admin_email' => 'required',
             'admin_password' => 'required',
         ]);

         $admin_email = $data['admin_email'];
         $admin_password = md5($data['admin_password']);
         $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
//         $login_count = $login->count();
         if($login){
             $login_count = $login->count();
            if($login_count >0 ) {
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/dashboard');
                     }
            } else {
                Session::put('message', 'Email or Password is incorrect');
                return Redirect::to('/admin');

         }
//         $email = $request->Email;
//         $password = md5($request->Password);
//         $result = DB::table('employees')->where('Email', $email)->where('Password', $password)->first();
//         if ($result) {
//             Session::put('FullName', $result->FullName);
//             Session::put('employeeID', $result->employeeID);
//             return Redirect::to('/dashboard');
//         } else {
//             Session::put('message', 'Email or Password is incorrect');
//             return Redirect::to('/admin');
//         }
     }
     public  function  logout()
     {
            $this->AuthLogin();
            Session::put('admin_name', null);
            Session::put('admin_id', null);
            Session::put('message', 'You have successfully logged out');
            return Redirect::to('/admin');
     }

     public  function  login_google(){
         return Socialite::driver('google')->redirect();
     }
     public  function  callback_google(){
          $user = Socialite::driver('google')->stateless()->user();
          $authUser = $this->findOrCreateCustomer($user, 'google');
          if($authUser){
             $account_name = Customer::where('customerID',$authUser->user)->first();
             Session::put('customerID', $account_name->customerID);
             Session::put('customerName', $account_name->customerName);
             Session::put('customer_picture', $account_name->customer_picture);
          } elseif ($customer_new){
              $account_name = Customer::where('customerID',$authUser->user)->first();
              Session::put('customerID', $account_name->customerID);
              Session::put('customerName', $account_name->customerName);
              Session::put('customer_picture', $account_name->customer_picture);
          }
            return Redirect::to('/checkout')->with('message', 'Sign in google account <span style="color: red">'.$account_name->customerEmail.'</span> Successfully');
     }
    public function findOrCreateCustomer($users, $provider){

             $authUser =SocialCustomers ::where('provider_user_id', $users->id)->first();
             if($authUser){
                 return $authUser;
             } else {
                 $customer_new = new SocialCustomers([
                        'provider_user_id' => $users->id,
                        'provider_use_email' => $users->email,
                        'customer_picture' => $users->avatar,
                        'provider' => strtoupper($provider),
                 ]);
                 $customer = Customer::where('customerEmail',$users->email)->first();
                 if(!$customer){
                     $customer = Customer::create([
                         'customerName' => $users->name,
                         'customerEmail' => $users->email,
                         'customerPassword' => '',
                         'customerPhone' => '',
                     ]);
                 }
                    $customer_new->customer()->associate($customer);
                    $customer_new->save();
                    return $customer_new;
             }
    }

  public  function  filter_by_date(Request $request){

        $data = $request->all();
        $form_date = $data['form_date'];
        $to_date = $data['to_date'];

        $get = Statistic::whereBetween('order_date', [$form_date, $to_date])->orderBy('order_date', 'ASC')->get();
        foreach ($get as $key => $val){
            $chart_data[] = array(
                 'period' => $val->order_date,
                 'order' => $val->total_order,
                 'sales' => $val->sales,
                 'profit' => $val->profit,
                'quantity' => $val->quantity,
            );
        }
        echo $data = json_encode($chart_data);
  }

}
