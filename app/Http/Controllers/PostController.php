<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Articles;
use App\Models\Post;
Use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();

class PostController extends Controller
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
    public  function valudation(Request $request){
        return $this->validate($request,[
            'post_title' => 'required|min:3|max:255',
            'post_desc' => 'required|min:3|max:255',
            'post_content' => 'required|min:3|max:10000',
            'post_image' => 'required|min:3|max:10000',
        ]);
    }
    public function add_post()
    {
        $this->AuthLogin();
        $cate_post = Post::orderby('cate_post_id', 'desc')->get();
       return view('Admin.post.add_post')->with(compact('cate_post'));
    }
    public function all_post()
    {
        $this->AuthLogin();
        $data = request()->all();
        $all_post = Articles::orderby('post_id', 'desc')->paginate(50);
        return view('Admin.post.list_post')->with(compact('all_post'));

    }
    public function save_post(Request $request)
    {
        $this->AuthLogin();
        $this -> valudation($request);
        $data = $request->all();
        $post = new Articles();
        $post->post_title = $data['post_title'];
//        $post->post_slug = $data['post_slug'];
        $post->post_desc = $data['post_desc'];
        $post->post_content = $data['post_content'];
//        $post->post_meta_desc = $data['post_meta_desc'];
//        $post->post_meta_keyword = $data['post_meta_keyword'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id  = $data['cate_post_id'];
        $get_image = $request->file('post_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh
            $name_image = current(explode('.', $get_name_image)); // lấy tên đầu tiên cảu anh
            $new_image =$name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension(); // radom tên hình ảnh để ko trùng lặp tên ảnh và hàm OriginalExtension lấy phần mở rộng của hình ảnh
            $get_image -> move('public/uploads/post',  $new_image );
            $post->post_image = $new_image;
            $post->save();
            Session::put('message', 'Post Added Successfully');
            return redirect()->back();
        }else{
            Session::put('message', 'More pictures please');
            return redirect()->back();
        }

    }
//    public function edit_product($productID)
//    {
//        $this->AuthLogin();
//        $cate_product = DB::table('category')->orderby('categoryID', 'desc')->get();
//        $brand_product = DB::table('brand')->orderby('brandID', 'desc')->get();
//        $supplier_product = DB::table('suppliers')->orderby('supplierID', 'desc')->get();
//        $edit_product = DB::table('product')->where('productID', $productID)->get();
//        $manage_product = view('Admin.Product.edit_product')->with('edit_product',   $edit_product)
//            ->with('cate_product', $cate_product)
//            ->with('brand_product', $brand_product)
//            ->with('supplier_product', $supplier_product);
//        return view('admin_layout')->with('Admin.Product.edit_product', $manage_product);
//    }
    public function delete_post($post_id)
    {
        $this->AuthLogin();
           $post = Articles::find($post_id);
           $post_image = $post->post_image;
           if($post_image) {
               $path = 'public/uploads/post/'.$post_image;
               unlink($path);
           }
           $post->delete();
        Session::put('message', 'Post delete successfully');
        return redirect()->back();
    }
//    public  function  update_product(Request $request ,$productID )
//    {
//        $this->AuthLogin();
//        $data = array();
//        $data['productName'] = $request->productName;
//        $data['Material'] = $request->Material;
//        $data['Size'] = $request->Size;
//        $data['Color'] = $request->Color;
//        $data['Price'] = $request->Price;
//        $data['Designs'] = $request->Designs;
//        $data['Quantity'] = $request->Quantity;
//        $data['Origin'] = $request->Origin;
//        $data['Intro'] = $request->Intro;
//        $data['Featured'] = $request->Featured;
//        $data['Status'] = $request->Status;
//        $data['CategoryID'] = $request->product_cate;
//        $data['BrandID'] = $request->product_brand;
//        $data['SupplierID'] = $request->product_supplier;
//        $get_image = $request->file('ImageUrl');
//        if ($get_image) {
//            $get_name_image = $get_image->getClientOriginalName();
//            $name_image = current(explode('.', $get_name_image));
//            $new_image =$name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
//            $get_image -> move('public/uploads/product',  $new_image );
//            $data['ImageUrl'] = $new_image;
//            DB::table('product')->where('productID',$productID) ->update($data);
//            Session::put('message', 'Product Update Successfully');
//            return Redirect::to('/all-product');
//        }
//        $data['ImageUrl'] = '';
//        DB::table('product')->where('productID',$productID) ->update($data);
//        Session::put('message', 'Product Update successfully');
//        return Redirect::to('/all-product');
//    }

//

public  function  danh_muc_bai_viet(Request $request,$post_id){
    $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();
    $post_product = Articles::orderBy('post_id', 'desc')->where('post_id', $post_id)->get();
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status', '1')->take(4)->get();
    $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
    $supplier_product = DB::table('tbl_suppliers')->orderby('supplierID', 'desc')->get();
//    $post = DB::table('tbl_posts')->join('tbl_category_post','tbl_posts.cate_post_id','=','tbl_category_post.cate_post_id')
//        ->where('tbl_category_post.cate_post_id',$post_slug)->where('post_status','1')->orderBy('post_id','DESC')->get();

    $post = DB::table('tbl_posts')->join('tbl_category_post','tbl_posts.cate_post_id','=','tbl_category_post.cate_post_id')
        ->where('tbl_category_post.cate_post_id',$post_id)->where('post_status','1')->orderBy('post_id','DESC')->get();

//     $post = Articles::orderBy('post_id', 'desc')->where('post_id', $post_id)->get();
//    $post = Articles::with('cate_post')->where('post_status',0)->where('cate_post_id', $cate_id)->paginate(10);
    $cate_post_name = DB::table('tbl_category_post')->where('cate_post_id',$post_id)->get();
    $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
        ->where('tbl_category.categoryID', $post_id)->min('Price');
    $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
        ->where('tbl_category.categoryID', $post_id)->max('Price');
    $max_price_range = $max_price + 10000000;;
    $min_price_range = $min_price - 500000;;

        return view('pages.baiviet.danhmucbaiviet')->with('category', $cate_product)
            ->with('brand', $brand_product)->with('supplier', $supplier_product)
           ->with('slider', $slider)->with('category_post', $category_post) ->with('post', $post)
            ->with('post_product', $post_product) ->with('cate_post_name', $cate_post_name)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('max_price_range', $max_price_range)->with('min_price_range', $min_price_range);
}
public  function  bai_viet(Request $request,$post_id){
    $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_status', '1')->get();
    $post_product = Articles::orderBy('post_id', 'desc')->where('post_id', $post_id)->get();
    $slider = Slider::orderBy('slider_id','DESC')->where('slider_status', '1')->take(4)->get();
    $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
    $supplier_product = DB::table('tbl_suppliers')->orderby('supplierID', 'desc')->get();

//    $baiviet = DB::table('tbl_posts')->join('tbl_category_post','tbl_posts.cate_post_id','=','tbl_category_post.cate_post_id')
//        ->where('tbl_category_post.cate_post_id',$post_id)->where('post_status','1')->orderBy('post_id','DESC')->get();

    $baiviet = DB::table('tbl_posts')->where('post_status','1')->where('post_id',$post_id)->take(1)->get();
    $cate_post_name = DB::table('tbl_posts')->where('post_id',$post_id)->get();
    $related =DB::table('tbl_posts')->join('tbl_category_post','tbl_posts.cate_post_id','=','tbl_category_post.cate_post_id')
        ->orderBy('post_id','DESC')->get();
    $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
        ->where('tbl_category.categoryID', $post_id)->min('Price');
    $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
        ->where('tbl_category.categoryID', $post_id)->max('Price');
    $max_price_range = $max_price + 10000000;;
    $min_price_range = $min_price - 500000;;

    return view('pages.baiviet.baiviet')->with('category', $cate_product)
        ->with('brand', $brand_product)->with('supplier', $supplier_product)
        ->with('slider', $slider)->with('category_post', $category_post) ->with('post', $baiviet)
        ->with('post_product', $post_product) ->with('cate_post_name', $cate_post_name) ->with('related', $related)
        ->with('min_price', $min_price)->with('max_price', $max_price)->with('max_price_range', $max_price_range)->with('min_price_range', $min_price_range);
}

}
