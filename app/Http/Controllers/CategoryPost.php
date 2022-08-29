<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Slider;

Use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
use App\Models\Post;
Use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryPost extends Controller
{
    public function AuthLogin(){

//        $admin_id = Session::get('admin_id');
//        if($admin_id){
//            return Redirect::to('dashboard');
//        }else{
//            return Redirect::to('admin')->send();
//        }
//
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
    public  function valudation(Request $request){
        return $this->validate($request,[
            'cate_post_name' => 'required|min:3|max:10000',
            'cate_post_desc' => 'required|min:3|max:10000',
        ]);
    }
    public function add_category_post()
    {
        $this->AuthLogin();
        return view('Admin.category_post.add_category');
    }
    public function all_category_post()
    {
        $this->AuthLogin();
        $data = request()->all();
        $category_post =  Post::orderBy('cate_post_id', 'desc')->paginate(10);
        return view('Admin.category_post.list_category_post')->with(compact('category_post'));
    }
    public function save_category_post(Request $requesty)
    {
        $this->AuthLogin();
        $this -> valudation($requesty);
        $data = request()->all();
        $category_post = new Post();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message', 'Category Post added successfully');
        return redirect()->back();
    }


    public function edit_category_post($cate_post_id)
    {
        $this->AuthLogin();
        $category_post =  Post::find($cate_post_id);
        return view ('Admin.category_post.edit_category_post')->with(compact('category_post'));
    }
    public function delete_category_post($cate_post_id)
    {
        $this->AuthLogin();
        $category_post =  Post::find($cate_post_id);
        $category_post->delete();
        Session::put('message', 'Category Post deleted successfully');
        return redirect()->back();
    }
    public  function  update_category_post(Request  $request,$cate_post_id)
    {
        $this->AuthLogin();
        $data = request()->all();
        $this->validate($request, [
            'cate_post_name' => 'required|max:255',
            'cate_post_desc' => 'required',
        ]);
        $category_post =  Post::find($cate_post_id);
        $category_post = new Post();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message', 'Category Post Updated successfully');
        return redirect('/all-category-post');

    }
//    //end category product admin
//
//    public function show_category_home($categoryID){
//        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
//        $cate_product = DB::table('category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
//        $brand_product = DB::table('brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
//        $category_by_id = DB::table('product')->join('category','product.categoryID', '=', 'category.categoryID')
//            ->where('category.categoryID', $categoryID)->get();
//        $categoryName = DB::table('category')->where('category.categoryID',$categoryID)->limit(1)->get();
//
//        return view('pages.Category.show_category')->with('category', $cate_product)->with('brand', $brand_product)
//            ->with('category_by_id', $category_by_id) ->with('categoryName', $categoryName) ->with('slider', $slider);
//    }
}
