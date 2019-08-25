<?php
//////////  Frontend Route  //////////

Route::get('/', 'FrontendController@index');
Route::get('category/page/{category_id}', 'FrontendController@categorypage');
Route::get('product/details/{product_id}', 'FrontendController@productdetails');
Route::post('products/search', 'FrontendController@productsearch');
Route::get('add/cart/{product_id}', 'FrontendController@addcart');

Route::get('cart', 'FrontendController@cart');
Route::get('cart/{coupon_name}', 'FrontendController@cart');
Route::get('single/product/delete/{cart_id}', 'FrontendController@singleproductdelete');
Route::get('cart/item/delete', 'FrontendController@cartitemdelete');
Route::post('cart/update', 'FrontendController@cartupdate');

Route::post('checkout', 'FrontendController@checkout');
Route::post('checkout/post', 'FrontendController@checkoutpost');


Route::get('vistied/website', function(){
  return redirect('cart');
});

Route::get('customer/register', 'FrontendController@customerregister');
Route::post('customer/register/post', 'FrontendController@customerregisterpost');



Route::post('city/list', 'FrontendController@citylist');

Route::get('stripe', 'StripePaymentController@stripe');
Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');


//////////  Backend Route  //////////


//////////  Customer Route  //////////

Route::get('customer/profile', 'CustomerController@customerprofile');
Route::post('customer/profile/post', 'CustomerController@customerprofilepost');
Route::post('customer/profile/update/post', 'CustomerController@customerprofileupdatepost');

Route::get('customer/order', 'CustomerController@customerorder');
Route::get('customer/order/view', 'CustomerController@customerorderview');
Route::get('customer/product/view/{sale_id}', 'CustomerController@customerproductview');


//////////  Admin Route  //////////
Auth::routes();
Route::get('admin/dashboard', 'HomeController@index');

Route::get('add/category', 'CategoryController@addcategory');
Route::post('add/category/post', 'CategoryController@addcategorypost');
Route::get('manage/category', 'CategoryController@managecategory');
Route::get('category/delete/{category_id}', 'CategoryController@categorydelete');
Route::get('category/edit/{category_id}', 'CategoryController@categoryedit');
Route::post('category/edit/post', 'CategoryController@categoryeditpost');

Route::post('category/search', 'CategoryController@categorysearch');



Route::get('add/product', 'ProductController@addproduct');
Route::post('add/product/post', 'ProductController@addproductpost');
Route::get('manage/product', 'ProductController@manageproduct');
Route::get('product/delete/{product_id}', 'ProductController@productdelete');
Route::get('product/edit/{product_id}', 'ProductController@productedit');
Route::post('product/edit/post', 'ProductController@producteditpost');

Route::post('product/search', 'ProductController@productsearch');

Route::get('add/coupon', 'CouponController@addcoupon');
Route::post('add/coupon/post', 'CouponController@addcouponpost');
Route::get('coupon/delete/{coupon_id}', 'CouponController@coupondelete');

Route::get('add/slider', 'SliderController@addslider');
Route::post('add/slider/post', 'SliderController@addsliderpost');

Route::get('add/contact', 'AnotherController@addcontact');
Route::post('add/contact/post', 'AnotherController@addcontactpost');
Route::get('admin/customer/order/view', 'AnotherController@customerorderview');
Route::get('order/view/{shipping_id}', 'AnotherController@orderview');
Route::get('order/delete/{shipping_id}', 'AnotherController@orderdelete');
Route::get('order/paid/{shipping_id}', 'AnotherController@orderpaid');
