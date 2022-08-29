<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;
Use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();
class CategoryController extends Controller
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
    public function  myformPost(){
       $this->validate(request(),[
            'categoryName' => 'required|max:100',
            'categoryDescription' => 'required|max:100',
        ]);

    }
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('Admin.add_category_product');
    }
    public function all_category_product()
    {
        $this->AuthLogin();
          $all_category_product = DB::table('tbl_category')->get();
        $manage_category_product = view('Admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manage_category_product);
    }
    public function save_category_product(Request $requesty, Category $category )
    {
        $this->AuthLogin();
           $data = array();
        $this -> myformPost();
            $data['categoryName'] = $requesty->categoryName;
            $data['categoryDescription'] = $requesty->categoryDescription;
            $data['categoryStatus'] = $requesty->categoryStatus;
            $category->insert($data);
            Session::put('message', 'Category added successfully');
            return Redirect::to('/add-category-product');
    }
    public function unactive_category_product($categoryID)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('categoryID', $categoryID)->update(['categoryStatus' => 0]);
        Session::put('message', 'Category unactive successfully');
        return redirect::to('/all-category-product');
    }
    public function active_category_product($categoryID)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('categoryID', $categoryID)->update(['categoryStatus' => 1]);
        Session::put('message', 'Category active successfully');
        return redirect::to('/all-category-product');
    }
    public function edit_category_product($categoryID)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category')->where('categoryID', $categoryID)->get();
        $manage_category_product = view('Admin.edit_category_product')->with('edit_category_product',   $edit_category_product);
        return view('admin_layout')->with('Admin.edit_category_product', $manage_category_product);
    }
    public function delete_category_product($categoryID)
    {
        $this->AuthLogin();
        DB::table('tbl_category')->where('categoryID', $categoryID)->delete();
        Session::put('message', 'Category delete successfully');
        return redirect::to('/all-category-product');
    }
    public  function  update_category_product(Request $requesty ,  $categoryID)
    {
        $this->AuthLogin();
        $data = array();
        $data['categoryName'] = $requesty->categoryName;
        $data['categoryDescription'] = $requesty->categoryDescription;
        DB::table('tbl_category')->where('categoryID', $requesty->categoryID)->update($data);
        Session::put('message', 'Category updated successfully');
        return redirect::to('/all-category-product');
    }
    //end category product admin

    public function show_category_home($categoryID){
        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_id', $categoryID)->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $categoryID)->paginate(12);
        $categoryName = DB::table('tbl_category')->where('tbl_category.categoryID',$categoryID)->limit(1)->get();


//        $category_by_id
        //có nghĩ là nếu chọn sort_by thì sẽ lấy theo ký tự  sort_by
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                    ->where('tbl_category.categoryID', $categoryID)->orderBy('Price', 'asc')->paginate(12)->appends(Request()->query());
            }
            elseif($sort_by == 'giam_dan'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                    ->where('tbl_category.categoryID', $categoryID)->orderBy('Price', 'desc')->paginate(12)->appends(Request()->query());
            }
            elseif($sort_by == 'kytu_az'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                    ->where('tbl_category.categoryID', $categoryID)->orderBy('productName', 'asc')->paginate(12)->appends(Request()->query());
            }
            elseif($sort_by == 'kytu_za'){
                $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                    ->where('tbl_category.categoryID', $categoryID)->orderBy('productName', 'desc')->paginate(12)->appends(Request()->query());
            }
        } elseif (isset($_GET['start_price'] ) && isset($_GET['end_price'])){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];
            $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                ->where('tbl_category.categoryID', $categoryID)->whereBetween('Price', [$min_price, $max_price])->paginate(12)->appends(Request()->query());
        } else{
            $category_by_id = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
                ->where('tbl_category.categoryID', $categoryID)->paginate(12);
        }

         $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $categoryID)->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $categoryID)->max('Price');
        $max_price_range = $max_price + 10000000;;
        $min_price_range = $min_price - 500000;;
        return view('pages.Category.show_category')->with('category', $cate_product)->with('brand', $brand_product)
            ->with('category_by_id', $category_by_id) ->with('categoryName', $categoryName) ->with('slider', $slider) ->with('category_post', $category_post)
            ->with('min_price', $min_price) ->with('max_price', $max_price)->with('max_price_range', $max_price_range) ->with('min_price_range', $min_price_range)
             ;
    }


}
