<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Addcart;
use App\Coupon;
use App\User;
use App\Customerprofile;
use App\Shippingaddress;
use App\Sale;
use App\Billingdetail;
use App\Country;
use App\City;
use App\Contact;
use App\Order;
use App\Slider;
use Carbon\Carbon;
use Session;
use Auth;
use DB;

class FrontendController extends Controller
{
    function index(){
      $sliders = Slider::orderBy('id','desc')->limit(3)->get();
      $products = Product::orderBy('id','desc')->paginate(30);
      return view('welcome',compact('products','sliders'));
    }
    function categorypage($category_id){
        $sliders = Slider::orderBy('id','desc')->limit(3)->get();
       $products = Product::where('category_id', $category_id)->orderBy('id','desc')->get();
       return view('categorypage',compact('products','sliders'));
    }
    function productdetails($product_id){
       $single_product = Product::find($product_id);
       return view('productdetails',compact('single_product'));
    }
    function productsearch(Request $request){
        $search_product = $request->product_or_category_name;
        $products = Product::where('product_name','like','%'.$search_product.'%')->get();
        return view('productsearch',compact('products'));
    }
    function addcart($product_id){
      $ip_adderss = $_SERVER['REMOTE_ADDR'];

      if (Addcart::where('ip_address',$ip_adderss)->where('product_id',$product_id)->exists()) {
        Addcart::where('ip_address',$ip_adderss)->where('product_id',$product_id)->increment('product_quantity', 1);
        return back()->with('ince','Product Increment Successfully');
      }
      else {
        Addcart::insert([
          'product_id' => $product_id,
          'ip_address' => $ip_adderss,
          'created_at' => Carbon::now(),
        ]);
      }
      return back()->with('add','Cart Added Successfully');

    }

    function cart($coupon_name = ""){
      if ($coupon_name == "") {
        $ip_adderss = $_SERVER['REMOTE_ADDR'];
        $cart_items = DB::table('addcarts')
        ->join('products','products.id','addcarts.product_id')
        ->select('addcarts.*','products.product_name','products.product_price')
        ->where('ip_address',$ip_adderss)->get();
        $coupon_amount = 0;
        return view('cart',compact('cart_items','coupon_amount','coupon_name'));
      }
      else {
        if (Coupon::where('coupon_name', $coupon_name)->exists()) {
          if (Coupon::where('coupon_name', $coupon_name)->first()->coupon_date >= Carbon::now()->format('Y-m-d') ) {
              $coupon_amount = Coupon::where('coupon_name', $coupon_name)->first()->coupon_amount;
              $ip_adderss = $_SERVER['REMOTE_ADDR'];
              $cart_items = DB::table('addcarts')
              ->join('products','products.id','addcarts.product_id')
              ->select('addcarts.*','products.product_name','products.product_price')
              ->where('ip_address',$ip_adderss)->get();
              return view('cart',compact('cart_items','coupon_amount','coupon_name'));
          }
          else {
            return back()->with('invalid','Discount Amount Invalid');
          }
        }
        else {
          return back()->with('no','Coupon Name Nai');
        }
      }
    }
    function singleproductdelete($cart_id){
      Addcart::find($cart_id)->delete();
      return back()->with('singledelete','Single Item Delete Successfully');
    }
    function cartitemdelete(){
      $ip_adderss = $_SERVER['REMOTE_ADDR'];
      Addcart::where('ip_address',$ip_adderss)->delete();
      return back()->with('cartdelete','Cart Item Delete Successfully');
    }
    function cartupdate(Request $request){
      $ip_adderss = $_SERVER['REMOTE_ADDR'];

      foreach ($request->product_id as $key_index => $product_id) {
        if (Product::where('id',$request->product_id)->first()->product_quantity >= $request->product_quantity[$key_index] ) {
          if (Addcart::where('ip_address',$ip_adderss)->where('product_id',$product_id)->exists()) {
            Addcart::where('ip_address',$ip_adderss)->where('product_id',$product_id)->update([
            'product_quantity' => $request->product_quantity[$key_index],
            ]);

          }
        }
        else {
            return back()->with('noupdate','Product Quantity Do Not Avilable');
        }
      }
        return back()->with('update','Cart Item Updated Successfully');
    }
    function checkout(Request $request){
      $countries = Country::all();
      $customerprofile = Customerprofile::where('user_id', Auth::id())->first();
      $grand_total = $request->grand_total;
      return view('checkout',compact('grand_total','customerprofile','countries'));
    }
    function customerregister(){
      return view('customer.customerregister');
    }
    function customerregisterpost(Request $request){

      User::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 2,
        'created_at' => Carbon::now(),
      ]);

      return redirect('login');
    }
    function citylist(Request $request){
      $country_id = $request->country_id;
      $stringTOsend = "<option>-Select One-</option>";
       $cities = City::where('country_id',$country_id)->get() ;
       foreach ($cities as $city) {
          $stringTOsend .= "<option value='".$city->id."'>".$city->name."</option>";
       }
       echo $stringTOsend;
    }
    function checkoutpost(Request $request){
      $shipping_id = Shippingaddress::insertGetId([
        'user_id' => Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'zip_code' => $request->zip_code,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'payment_type' => $request->payment_type,
        'payment_status' => 1,
        'created_at' => Carbon::now(),
      ]);
        if ($request->country_id) {
          Shippingaddress::find($shipping_id)->update([
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
          ]);
        }
        $sale_id = Sale::insertGetId([
          'user_id' => Auth::id(),
          'shipping_id' => $shipping_id,
          'grand_total' => $request->grand_total,
          'payment_type' => $request->payment_type,
          'payment_status' => 1,
          'created_at' => Carbon::now(),
        ]);

         $ip_adderss = $_SERVER['REMOTE_ADDR'];
         $cart_itemes = Addcart::where('ip_address',$ip_adderss)->get();
         foreach ($cart_itemes as $cart_iteme) {
             Billingdetail::insert([
               'user_id' => Auth::id(),
               'sale_id' => $sale_id,
               'product_id' => $cart_iteme->product_id,
               'product_price' => Product::find($cart_iteme->product_id)->product_price,
               'product_quantity' => $cart_iteme->product_quantity,
               'created_at' => Carbon::now(),
             ]);
           Product::find($cart_iteme->product_id)->decrement('product_quantity', $cart_iteme->product_quantity);
            $cart_iteme->delete();
         }

         Order::insert([
           'shipping_id' => $shipping_id,
           'order_view' => 1,
           'paid' => 1 ,
         ]);


         if ( $request->payment_type == 1) {
           Session::flash('success_cod','Your Order Placed Successfully!');
           return redirect('cart');
         }
         elseif ($request->payment_type == 2) {
          $grand_total = $request->grand_total;
           Session::flash('success_cc','Your Order Placed Successfully!');
           return redirect('stripe')->with('grand_total',$grand_total)->with('shipping_id',$shipping_id);
         }
    }



}
