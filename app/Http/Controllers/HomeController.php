<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Models\Social;
use Illuminate\Http\Request;
Use DB;
use Socialite;
use App\Http\Requests;
Use Session;
use Mail;
use App\Models\Slider;
use App\Models\Post;
Use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){

         //category post
        $category_post =  Post::orderBy('cate_post_id', 'desc')->get();
        $slider = Slider::orderBy('slider_id','DESC')->take(4)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        $supplier_product = DB::table('tbl_suppliers')->orderby('supplierID', 'desc')->get();
        $category = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//        $post_product = DB::table('tbl_post')->orderby('postID', 'desc')->get();


        $all_product = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.categoryID', '=', 'tbl_product.categoryID')
            ->join('tbl_brand','tbl_brand.brandID', '=', 'tbl_product.brandID')
            ->join('tbl_suppliers','tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
            ->orderby('tbl_product.productID', 'desc')->paginate(6);

        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
             if($sort_by == 'tang_dan') {
                 $all_product = DB::table('tbl_product')
                     ->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                     ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                     ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                     ->orderby('tbl_product.Price', 'asc')->paginate(12)->appends(Request()->query());
             }
                else if($sort_by == 'giam_dan') {
                    $all_product = DB::table('tbl_product')
                        ->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                        ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                        ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                        ->orderby('tbl_product.Price', 'desc')->paginate(12)->appends(Request()->query());
                }
                else if($sort_by == 'kytu_az') {
                    $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                        ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                        ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                        ->orderby('tbl_product.productName', 'asc')->paginate(12)->appends(Request()->query());
                }
                else if($sort_by == 'kytu_za') {
                    $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                        ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                        ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                        ->orderby('tbl_product.productName', 'desc')->paginate(12)->appends(Request()->query());
                }
        } elseif (isset($_GET['start_price'] ) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                ->whereBetween('tbl_product.Price', [$min_price, $max_price])->paginate(12)->appends(Request()->query());
        } else {
            $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                ->orderby('tbl_product.productID', 'desc')->paginate(6);
        }
        $min_price = DB::table('tbl_product')->min('Price');
        $max_price = DB::table('tbl_product')->max('Price');
        $min_price_range = $min_price - 500000;
        $max_price_range = $max_price + 10000000;
//        $all_product = DB::table('product')->where('Status','1')->orderby('productID', 'desc')->paginate(6); ;
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('supplier', $supplier_product)
            ->with('all_product', $all_product)->with('slider', $slider) ->with('category_post', $category_post)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range)
            ->with('category', $category);
    }


    public function search(Request $request){
        $keywords = $request->keywords_submit;
        if(isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang_dan') {
                $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                    ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                    ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                    ->orderby('tbl_product.Price', 'asc')->paginate(12)->appends(Request()->query());
            }
            else if($sort_by == 'giam_dan') {
                $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                    ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                    ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                    ->orderby('tbl_product.Price', 'desc')->paginate(12)->appends(Request()->query());
            }
            else if($sort_by == 'kytu_az') {
                $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                    ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                    ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                    ->orderby('tbl_product.productName', 'asc')->paginate(12)->appends(Request()->query());
            }
            else if($sort_by == 'kytu_za') {
                $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                    ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                    ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                    ->orderby('tbl_product.productName', 'desc')->paginate(12)->appends(Request()->query());
            }
        } elseif (isset($_GET['start_price'] ) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                ->whereBetween('tbl_product.Price', [$min_price, $max_price])->paginate(12)->appends(Request()->query());
        } else {
            $all_product = DB::table('tbl_product')->join('tbl_category', 'tbl_category.categoryID', '=', 'tbl_product.categoryID')
                ->join('tbl_brand', 'tbl_brand.brandID', '=', 'tbl_product.brandID')
                ->join('tbl_suppliers', 'tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
                ->orderby('tbl_product.productID', 'desc')->paginate(6);
        }
        $min_price = DB::table('tbl_product')->min('Price');
        $max_price = DB::table('tbl_product')->max('Price');
        $min_price_range = $min_price - 500000;
        $max_price_range = $max_price + 10000000;
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        $search_product = DB::table('tbl_product')->where('productName','like','%'.$keywords.'%')->get();
        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();
        $slider = DB::table('tbl_slider')->where('slider_status','1')->orderby('slider_id', 'desc')->get();
        return view('pages.Product.seach')->with('category', $cate_product)->with('brand', $brand_product) ->with('search_product', $search_product)
            ->with('category_post', $category_post) ->with('slider', $slider)
             ->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range);
    }


    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri
            $account_name = Login::where('employeeID',$account->user)->first();
            Session::put('FullName',$account_name->FullName);
            Session::put('employeeID',$account_name->employeeID);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'FullName' => $provider->getName(),
                    'Email' => $provider->getEmail(),
                    'Password' => '',
                    'Phone' => '',
                    'admin_status' => 1

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('employeeID',$account->user)->first();

            Session::put('FullName',$account_name->FullName);
            Session::put('employeeID',$account_name->employeeID);
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }
    }
}
