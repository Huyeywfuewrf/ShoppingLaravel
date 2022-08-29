<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//user
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/home','App\Http\Controllers\HomeController@index');
Route::post('/seach','App\Http\Controllers\HomeController@search');

//Category home
Route::get('/category/{categoryID}','App\Http\Controllers\CategoryController@show_category_home');
//Route::get('/category/{slug_category_product}','App\Http\Controllers\CategoryController@show_category_home');
Route::get('/brand/{brandID}','App\Http\Controllers\BrandController@show_brand_home');
Route::get('/detail/{productID}','App\Http\Controllers\ProductController@detail_product');


//admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard') ;
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');

Route::post('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');


Route::get('/logout','App\Http\Controllers\AdminController@logout');

//Category
Route::get('/add-category-product','App\Http\Controllers\CategoryController@add_category_product');
Route::get('/edit-category-product/{categoryID}','App\Http\Controllers\CategoryController@edit_category_product');
Route::get('/delete-category-product/{categoryID}','App\Http\Controllers\CategoryController@delete_category_product');
Route::get('/all-category-product','App\Http\Controllers\CategoryController@all_category_product');

Route::get('/unactive-category-product/{categoryID}','App\Http\Controllers\CategoryController@unactive_category_product');
Route::get('/active-category-product/{categoryID}','App\Http\Controllers\CategoryController@active_category_product');

Route::get('/save-category-product','App\Http\Controllers\CategoryController@save_category_product');
Route::get('/update-category-product/{categoryID}','App\Http\Controllers\CategoryController@update_category_product');

//Brand
Route::get('/add-brand-product','App\Http\Controllers\BrandController@add_brand_product');
Route::get('/edit-brand-product/{brandID}','App\Http\Controllers\BrandController@edit_brand_product');
Route::get('/delete-brand-product/{brandID}','App\Http\Controllers\BrandController@delete_brand_product');
Route::get('/all-brand-product','App\Http\Controllers\BrandController@all_brand_product');

Route::get('/unactive-brand-product/{brandID}','App\Http\Controllers\BrandController@unactive_brand_product');
Route::get('/active-brand-product/{brandID}','App\Http\Controllers\BrandController@active_brand_product');

Route::get('/save-brand-product','App\Http\Controllers\BrandController@save_brand_product');
Route::get('/update-brand-product/{brandID}','App\Http\Controllers\BrandController@update_brand_product');

//Post bài viết
Route::get('/add-category-post','App\Http\Controllers\CategoryPost@add_category_post');
Route::get('/save-category-post','App\Http\Controllers\CategoryPost@save_category_post');
Route::get('/all-category-post','App\Http\Controllers\CategoryPost@all_category_post');
//Route::get('/danh-muc-bai-viet/{cate_post_slug}','App\Http\Controllers\CategoryPost@danh_muc_bai_viet');
Route::get('/edit-category-post/{cate_post_id}','App\Http\Controllers\CategoryPost@edit_category_post');
Route::get('/update-category-post/{cate_post_id}','App\Http\Controllers\CategoryPost@update_category_post');
Route::get('/delete-category-post/{cate_post_id}','App\Http\Controllers\CategoryPost@delete_category_post');

//post
Route::get('/add-post','App\Http\Controllers\PostController@add_post');
Route::post('/save-post','App\Http\Controllers\PostController@save_post');
Route::get('/all-post','App\Http\Controllers\PostController@all_post');
Route::get('/delete-post/{post_id}','App\Http\Controllers\PostController@delete_post');
//supplier
Route::get('/add-supplier-product','App\Http\Controllers\SupplierController@add_supplier_product');
Route::get('/edit-supplier-product/{supplierID}','App\Http\Controllers\SupplierController@edit_supplier_product');
Route::get('/delete-supplier-product/{supplierID}','App\Http\Controllers\SupplierController@delete_supplier_product');
Route::get('/all-supplier-product','App\Http\Controllers\SupplierController@all_supplier_product');

Route::get('/unactive-supplier-product/{supplierID}','App\Http\Controllers\SupplierController@unactive_supplier_product');
Route::get('/active-supplier-product/{supplierID}','App\Http\Controllers\SupplierController@active_supplier_product');

Route::get('/save-supplier-product','App\Http\Controllers\SupplierController@save_supplier_product');
Route::get('/update-supplier-product/{supplierID}','App\Http\Controllers\SupplierController@update_supplier_product');

//product
Route::get('/add-product','App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/{productID}','App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{productID}','App\Http\Controllers\ProductController@delete_product');
Route::get('/all-product','App\Http\Controllers\ProductController@all_product');

Route::get('/unactive-product/{productID}','App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{productID}','App\Http\Controllers\ProductController@active_product');

Route::post('/save-product','App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{productID}','App\Http\Controllers\ProductController@update_product');


//Cart
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::post('/update-cart','App\Http\Controllers\CartController@update_cart');
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');

Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/gio-hang','App\Http\Controllers\CartController@gio_hang');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::get('/del-product/{session_id}','App\Http\Controllers\CartController@del_product');
Route::get('/del-all-product','App\Http\Controllers\CartController@del_all_product');

Route::get('/show-cart','App\Http\Controllers\CartController@show_cart_menu');

// checkout
//Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
//Route::get('/del-fee','App\Http\Controllers\CheckoutController@del_fee');
//Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
//Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
//Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
//Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
//Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
//Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
//Route::post('/oder-place','App\Http\Controllers\CheckoutController@oder_place');
//Route::post('/select-delivery-home','App\Http\Controllers\CheckoutController@select_delivery_home');
//Route::post('/calculate-fee','App\Http\Controllers\CheckoutController@calculate_fee');
//Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::get('/del-fee','App\Http\Controllers\CheckoutController@del_fee');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/oder-place','App\Http\Controllers\CheckoutController@oder_place');
Route::post('/select-delivery-home','App\Http\Controllers\CheckoutController@select_delivery_home');
Route::post('/calculate-fee','App\Http\Controllers\CheckoutController@calculate_fee');
Route::post('/confirm-order','App\Http\Controllers\CheckoutController@confirm_order');


//order
Route::get('/manage-order','App\Http\Controllers\OrderController@manage_order');
//Route::get('/manage-order','App\Http\Controllers\CheckoutController@manage_order');
Route::get('/view-order/{order_code}','App\Http\Controllers\OrderController@view_order');
Route::get('/print-order/{checkout_code}','App\Http\Controllers\OrderController@print_order');
Route::post('/update-order-qty','App\Http\Controllers\OrderController@update_order_qty');
Route::post('/update-qty','App\Http\Controllers\OrderController@update_qty');


//coupon
Route::post('/check-coupon','App\Http\Controllers\CartController@check_coupon');
Route::get('/insert-coupon','App\Http\Controllers\CouponController@insert_coupon');
Route::get('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/insert-coupon-code','App\Http\Controllers\CouponController@insert_coupon_code');
Route::get('/list-coupon','App\Http\Controllers\CouponController@list_coupon');
Route::get('/delete-coupon/{couponID}','App\Http\Controllers\CouponController@delete_coupon');
Route::get('/unset-coupon','App\Http\Controllers\CouponController@unset_coupon');

//Customer
Route::get('/add-customer-product','App\Http\Controllers\CustomerController@add_customer_product');
Route::get('/delete-customer/{customerID}','App\Http\Controllers\CustomerController@delete_customer');
Route::get('/all-customer','App\Http\Controllers\CustomerController@all_customer');

//
//Route::get('/unactive-customer-product/{customerID}','App\Http\Controllers\CustomerController@unactive_customer_product');
//Route::get('/active-customer-product/{customerID}','App\Http\Controllers\CustomerController@active_customer_product');
//
//Route::get('/save-customer-product','App\Http\Controllers\CustomerController@save_customer_product');
//Route::get('/update-customer-product/{customerID}','App\Http\Controllers\CustomerController@update_customer_product');

//Send mail
Route::get('/send-mail','App\Http\Controllers\HomeController@send_mail');

//Login facebook
Route::get('/login-facebook','App\Http\Controllers\AdminController@login_facebook');
Route::get('/admin/callback','App\Http\Controllers\AdminController@callback_facebook');

//Login  google
Route::get('/login-google','App\Http\Controllers\AdminController@login_google');
Route::get('/google/callback','App\Http\Controllers\AdminController@callback_google');
//Route::get('/login-customer-google','App\Http\Controllers\AdminController@login_customer_google');
//Route::get('/customer/google/callback','App\Http\Controllers\AdminController@callback_customer_google');

//Delevery
Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');


//banner
Route::get('/manage-slider','App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider','App\Http\Controllers\SliderController@add_slider');
Route::post('/insert-slider','App\Http\Controllers\SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');
Route::get('/delete-slide/{slide_id}','App\Http\Controllers\SliderController@delete_slide');


//Authentication roles
Route::get('/register-auth','App\Http\Controllers\AuthController@register_auth');
Route::post('/register','App\Http\Controllers\AuthController@register');
Route::get('/login-auth','App\Http\Controllers\AuthController@login_auth');

Route::get('/logOut','App\Http\Controllers\AuthController@logOut');

Route::post('/login','App\Http\Controllers\AuthController@login');
//Route::get('/logout','App\Http\Controllers\AuthController@logout_auth');


//bai viẻt
Route::get('/danh-muc-bai-viet/{post_id}','App\Http\Controllers\PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_id}','App\Http\Controllers\PostController@bai_viet');

//Route::get('users',
//
//    [
//        'users'=>'App\Http\Controllers\UserController@index',
//        'as' => 'Users' ,
//        'middleware' => 'roles'
//    ]) ;
//
//Route::get('add-users','App\Http\Controllers\UserController@add_users');
//Route::post('store-users','App\Http\Controllers\UserController@store_users');
//Route::post('assign-roles','App\Http\Controllers\UserController@assign_roles');

Route::get('/quen-mat-khau','App\Http\Controllers\CheckoutController@quen_mat_khau');
Route::post('/recover-pass','App\Http\Controllers\CheckoutController@recover_pass');
Route::get('/information/{customerID}','App\Http\Controllers\CustomerController@information');
Route::post('/update-customer/{customerID}','App\Http\Controllers\CustomerController@update_customer');


