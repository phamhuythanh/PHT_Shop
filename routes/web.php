<?php

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
//  Fontend
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/trangchu', 'App\Http\Controllers\HomeController@index');
Route::post('/tim-kiem', 'App\Http\Controllers\HomeController@search');
Route::get('/size-notificate', 'App\Http\Controllers\HomeController@size_notificate');
Route::get('/contact', 'App\Http\Controllers\HomeController@contact');
Route::get('/about-us', 'App\Http\Controllers\HomeController@about_us');
Route::get('/question', 'App\Http\Controllers\HomeController@question');
Route::get('/shopping-guide', 'App\Http\Controllers\HomeController@shopping_guide');
Route::get('/privacy-policy', 'App\Http\Controllers\HomeController@privacy_policy');
Route::get('/production-partner', 'App\Http\Controllers\HomeController@production_partner');
Route::get('/test', 'App\Http\Controllers\HomeController@test');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}', 'App\Http\Controllers\CategoryProduct@show_category_home');
Route::get('/tat-ca-san-pham', 'App\Http\Controllers\CategoryProduct@show_all_product');
Route::get('/chi-tiet-san-pham/{product_id}', 'App\Http\Controllers\ProductController@detail_product');
Route::get('/new-product', 'App\Http\Controllers\CategoryProduct@new_product');


// Backend
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/sell-product', 'App\Http\Controllers\AdminController@sell_product');
Route::get('/product-inventory', 'App\Http\Controllers\AdminController@product_inventory');
Route::get('/statistical', 'App\Http\Controllers\AdminController@statistical')->middleware('auth.roles');;


Route::post('/filter-by-date', 'App\Http\Controllers\AdminController@filter_by_date');

//category
Route::get('/add-category-product', 'App\Http\Controllers\CategoryProduct@add_category_product');
Route::get('/all-category-product', 'App\Http\Controllers\CategoryProduct@all_category_product');
Route::get('/edit-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@delete_category_product');

Route::get('/unactive-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@active_category_product');

Route::post('/save-category-product', 'App\Http\Controllers\CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}', 'App\Http\Controllers\CategoryProduct@update_category_product');

//product
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/all-product', 'App\Http\Controllers\ProductController@all_product');
Route::get('/edit-product/{product_id}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-product/{category_product_id}', 'App\Http\Controllers\ProductController@delete_product');

Route::post('/search-product', 'App\Http\Controllers\ProductController@search_product');

Route::get('/unactive-product/{product_id}', 'App\Http\Controllers\ProductController@unactive_product');
Route::get('/active-product/{product_id}', 'App\Http\Controllers\ProductController@active_product');

Route::post('/save-product', 'App\Http\Controllers\ProductController@save_product');
Route::post('/update-product/{product_id}', 'App\Http\Controllers\ProductController@update_product');

//slider
Route::get('/manage-slider','App\Http\Controllers\SliderController@manage_slider');
Route::get('/add-slider','App\Http\Controllers\SliderController@add_slider');
Route::post('/insert-slider','App\Http\Controllers\SliderController@insert_slider');
Route::get('/unactive-slide/{slide_id}','App\Http\Controllers\SliderController@unactive_slide');
Route::get('/active-slide/{slide_id}','App\Http\Controllers\SliderController@active_slide');
Route::get('/delete-slide/{slide_id}', 'App\Http\Controllers\SliderController@delete_slide');

//cart ajax
Route::post('/add-cart-ajax','App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/gio-hang-ajax', 'App\Http\Controllers\CartController@gio_hang_ajax');
Route::post('/update-cart', 'App\Http\Controllers\CartController@update_cart');
Route::get('/del-product/{session_id}', 'App\Http\Controllers\CartController@delete_product');

Route::post('/select-delivery-home', 'App\Http\Controllers\CartController@select_delivery_home');
Route::post('/calculate-fee', 'App\Http\Controllers\CartController@calculate_fee');

//check out
Route::post('/order-place', 'App\Http\Controllers\CheckoutController@order_place');
Route::get('/checkout', 'App\Http\Controllers\CheckoutController@checkout');
//cổng thanh toán
Route::post('/vnpay-payment', 'App\Http\Controllers\CheckoutController@vnpay_payment');

//đơn hàng
Route::get('/print-order/{checkout_code}', 'App\Http\Controllers\OrderController@print_order');
Route::get('/manage-order', 'App\Http\Controllers\OrderController@manage_order');
Route::get('/view-order/{orderId}', 'App\Http\Controllers\OrderController@view_order');

Route::post('/update-order-qty', 'App\Http\Controllers\OrderController@update_order_qty');


//khách hàng
Route::get('/login-checkout', 'App\Http\Controllers\CustomerController@login_checkout');
Route::post('/add-customer', 'App\Http\Controllers\CustomerController@add_customer');
Route::post('/save-checkout-customer', 'App\Http\Controllers\CustomerController@save_checkout_customer');
Route::get('/logout-checkout)', 'App\Http\Controllers\CustomerController@logout_checkout');
Route::post('/login-customer', 'App\Http\Controllers\CustomerController@login_customer');

Route::get('/forget-password', 'App\Http\Controllers\CustomerController@forget_password');
Route::post('/recover-pass', 'App\Http\Controllers\CustomerController@recover_pass');
Route::get('/update-new-password', 'App\Http\Controllers\CustomerController@update_new_password');
Route::post('/reset-new-password', 'App\Http\Controllers\CustomerController@reset_new_password');

Route::get('/view-customer', 'App\Http\Controllers\CustomerController@view_customer');
Route::get('/delete-customer/{customer_id}', 'App\Http\Controllers\CustomerController@delete_customer');

Route::get('/edit-customer/{customer_id}', 'App\Http\Controllers\CustomerController@edit_customer');
Route::post('/update-customer/{customer_id}', 'App\Http\Controllers\CustomerController@update_customer');
Route::get('/view-customer-password/{customer_id}', 'App\Http\Controllers\CustomerController@view_customer_password');
Route::post('/update-customer-password/{customer_id}', 'App\Http\Controllers\CustomerController@update_customer_password');

Route::get('/view-customer-order/{customer_id}', 'App\Http\Controllers\CustomerController@view_customer_order');
Route::get('/order-customer/{customer_id}', 'App\Http\Controllers\CustomerController@order_customer');

//send mail
Route::get('/send-mail', 'App\Http\Controllers\HomeController@send_mail');

//Login facebook
Route::get('/login-facebook','App\Http\Controllers\AdminController@login_facebook');
Route::get('/admin/callback','App\Http\Controllers\AdminController@callback_facebook');

//login auth
Route::get('/register-auth','App\Http\Controllers\AuthController@register_auth');
Route::post('/register','App\Http\Controllers\AuthController@register');
Route::get('/admin','App\Http\Controllers\AuthController@login_auth');
Route::get('/logout-auth','App\Http\Controllers\AuthController@logout_auth');
Route::post('/login','App\Http\Controllers\AuthController@login');

Route::group(['middleware' => 'auth.roles'], function () {
//user
Route::get('/users','App\Http\Controllers\UserController@index');
Route::post('/assign-roles','App\Http\Controllers\UserController@assign_roles');
Route::get('/delete-user-roles/{admin_id}','App\Http\Controllers\UserController@delete_user_roles');
});


//gallery
Route::get('/add-gallery/{product_id}','App\Http\Controllers\GalleryController@add_gallery');
Route::post('/select-gallery','App\Http\Controllers\GalleryController@select_gallery');
Route::post('/insert-gallery/{pro_id}','App\Http\Controllers\GalleryController@insert_gallery');
Route::post('/update-gallery-name','App\Http\Controllers\GalleryController@update_gallery_name');
Route::post('/delete-gallery','App\Http\Controllers\GalleryController@delete_gallery');

//Delivery
Route::get('/delivery','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/insert-delivery','App\Http\Controllers\DeliveryController@insert_delivery');
Route::post('/select-feeship','App\Http\Controllers\DeliveryController@select_feeship');
Route::post('/update-delivery','App\Http\Controllers\DeliveryController@update_delivery');
Route::get('/delete-delivery/{fee_id}','App\Http\Controllers\DeliveryController@delete_delivery');

//biểu đồ
Route::get('/filter-by-date','App\Http\Controllers\AdminController@filter_by_date');

//tin tức
Route::get('/add-news','App\Http\Controllers\NewsController@add_news');
Route::post('/save-news','App\Http\Controllers\NewsController@save_news');
Route::get('/all-news','App\Http\Controllers\NewsController@all_news');
Route::get('/edit-news/{news_id}', 'App\Http\Controllers\NewsController@edit_news');
Route::post('/update-news/{news_id}', 'App\Http\Controllers\NewsController@update_news');
Route::get('/delete-news/{news_id}', 'App\Http\Controllers\NewsController@delete_news');
Route::get('/unactive-news/{news_id}', 'App\Http\Controllers\NewsController@unactive_news');
Route::get('/active-news/{news_id}', 'App\Http\Controllers\NewsController@active_news');


Route::get('/home-news','App\Http\Controllers\NewsController@home_news');
Route::get('/news-detail/{news_id}','App\Http\Controllers\NewsController@news_detail');
