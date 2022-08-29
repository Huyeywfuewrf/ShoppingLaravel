<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
Use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
Use Session;
Use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
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
    public  function  validateProduct()
    {
        $this->validate(request(), [
            'productName' => 'required|max:255',
            'Price' => 'required|max:255',
            'Quantity' => 'required|max:255',
            'Size' => 'required|max:255',
            'Color' => 'required|max:255',
            'Material' => 'required|max:255',
            'ImageUrl' => 'required|max:255',
            'Origin' => 'required|max:255',
            'Intro' => 'required|max:255',
        ]);
    }

    public function add_product()
{
    $this->AuthLogin();
    $cate_product = DB::table('tbl_category')->orderby('categoryID', 'desc')->get();
    $brand_product = DB::table('tbl_brand')->orderby('brandID', 'desc')->get();
    $supplier_product = DB::table('tbl_suppliers')->orderby('supplierID', 'desc')->get();
    return view('Admin.Product.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('supplier_product', $supplier_product);

}
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category','tbl_category.categoryID', '=', 'tbl_product.categoryID')
            ->join('tbl_brand','tbl_brand.brandID', '=', 'tbl_product.brandID')
            ->join('tbl_suppliers','tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
            ->orderby('tbl_product.productID', 'desc')->paginate(50);
        $manage_product = view('Admin.Product.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('Admin.Product.all_product', $manage_product);
    }
    public function save_product(Request $request, Product $product)
    {
        $this->AuthLogin();
        $data = array();
        $this -> validateProduct();
        $data['productName'] = $request->productName;
        $data['Material'] = $request->Material;
        $data['Size'] = $request->Size;
        $data['Color'] = $request->Color;
        $data['Price'] = $request->Price;
        $data['Designs'] = $request->Designs;
        $data['Quantity'] = $request->Quantity;
        $data['Origin'] = $request->Origin;
        $data['Intro'] = $request->Intro;
        $data['Featured'] = $request->Featured;
        $data['Status'] = $request->Status;
        $data['CategoryID'] = $request->product_cate;
        $data['BrandID'] = $request->product_brand;
        $data['SupplierID'] = $request->product_supplier;
        $get_image = $request->file('ImageUrl');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =$name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
            $get_image -> move('public/uploads/product',  $new_image );
            $data['ImageUrl'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message', 'Product Added Successfully');
            return Redirect::to('/add-product');
        }
        $data['ImageUrl'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Product added successfully');
        return Redirect::to('/add-product');
//        $product = new Product;
//        $product->productName = $request->productName;
//        $product->Material = $request->Material;
//        $product->Size = $request->Size;
//        $product->Color = $request->Color;
//        $product->Price = $request->Price;
//        $product->Designs = $request->Designs;
//        $product->Quantity = $request->Quantity;
//        $product->Origin = $request->Origin;
//        $product->Intro = $request->Intro;
//        $product->Featured = $request->Featured;
//        $product->Status = $request->Status;
//        $product->CategoryID = $request->product_cate;
//        $product->BrandID = $request->product_brand;
//        $product->SupplierID = $request->product_supplier;
//        $get_image = $request->file('ImageUrl');
//        if ($get_image) {
//            $get_name_image = $get_image->getClientOriginalName();
//            $name_image = current(explode('.', $get_name_image));
//            $new_image =$name_image.rand(0,99).'.'. $get_image->getClientOriginalExtension();
//            $get_image -> move('public/uploads/product',  $new_image );
//            $product->save();
//            Session::put('message', 'Product Added Successfully');
//            return Redirect::to('/add-product');
//        }
//        $product->ImageUrl = '';
//        $product->save();
//        Session::put('message', 'Product added successfully');
//        return Redirect::to('/add-product');

    }
    public function unactive_product($productID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('productID', $productID)->update(['Status' => 0]);
        Session::put('message', 'Product unactive successfully');
        return redirect::to('/all-product');
    }
    public function active_product($productID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('productID', $productID)->update(['Status' => 1]);
        Session::put('message', 'Product active successfully');
        return redirect::to('/all-product');
    }
    public function edit_product($productID)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brandID', 'desc')->get();
        $supplier_product = DB::table('tbl_suppliers')->orderby('supplierID', 'desc')->get();
        $edit_product = DB::table('tbl_product')->where('productID', $productID)->get();
        $manage_product = view('Admin.Product.edit_product')->with('edit_product',   $edit_product)
            ->with('cate_product', $cate_product)
            ->with('brand_product', $brand_product)
            ->with('supplier_product', $supplier_product);
        return view('admin_layout')->with('Admin.Product.edit_product', $manage_product);
    }
    public function delete_product($productID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('productID', $productID)->delete();
        Session::put('message', 'Product delete successfully');
        return redirect::to('/all-product');
    }
    public  function  update_product(Request $request ,$productID )
    {
        $this->AuthLogin();
        $data = array();
        $data['productName'] = $request->productName;
        $data['Material'] = $request->Material;
        $data['Size'] = $request->Size;
        $data['Color'] = $request->Color;
        $data['Price'] = $request->Price;
        $data['Designs'] = $request->Designs;
        $data['Quantity'] = $request->Quantity;
        $data['Origin'] = $request->Origin;
        $data['Intro'] = $request->Intro;
        $data['Featured'] = $request->Featured;
        $data['Status'] = $request->Status;
        $data['CategoryID'] = $request->product_cate;
        $data['BrandID'] = $request->product_brand;
        $data['SupplierID'] = $request->product_supplier;
        $get_image = $request->file('ImageUrl');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('productID',$productID)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }

        DB::table('tbl_product')->where('productID',$productID)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    //    End Product
    public function  detail_product($productID)
    {
        $category_post =  Post::orderBy('cate_post_id', 'desc')->where('cate_post_id', '1')->get();
        $slider = Slider::orderBy('slider_id', 'DESC')->where('slider_status', '1')->take(4)->get();
        $cate_product = DB::table('tbl_category')->where('categoryStatus','1')->orderby('categoryID', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brandStatus','1')->orderby('brandID', 'desc')->get();
        $detail_product = DB::table('tbl_product')->join('tbl_category','tbl_category.categoryID', '=', 'tbl_product.categoryID')
            ->join('tbl_brand','tbl_brand.brandID', '=', 'tbl_product.brandID')
            ->join('tbl_suppliers','tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
            ->where('tbl_product.productID', $productID)->get();
        foreach ($detail_product as $key => $value) {
            $catgoryID = $value->categoryID;
        }
        $min_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $productID)->min('Price');
        $max_price = DB::table('tbl_product')->join('tbl_category','tbl_product.categoryID', '=', 'tbl_category.categoryID')
            ->where('tbl_category.categoryID', $productID)->max('Price');
        $max_price_range = $max_price + 10000000;
        $min_price_range = $min_price - 500000;

        $related_product = DB::table('tbl_product')->join('tbl_category','tbl_category.categoryID', '=', 'tbl_product.categoryID')
            ->join('tbl_brand','tbl_brand.brandID', '=', 'tbl_product.brandID')
            ->join('tbl_suppliers','tbl_suppliers.supplierID', '=', 'tbl_product.supplierID')
            ->where('tbl_product.categoryID', $catgoryID)->whereNotIn('tbl_product.productID',[$productID])->paginate(3);
        return view('pages.Product.show_detail')->with('category', $cate_product)->with('brand', $brand_product)
            ->with('detail_product', $detail_product)->with('relate', $related_product) ->with('slider', $slider )->with('category_post', $category_post)
            ->with('min_price', $min_price)->with('max_price', $max_price)->with('min_price_range', $min_price_range)->with('max_price_range', $max_price_range);
    }

}
