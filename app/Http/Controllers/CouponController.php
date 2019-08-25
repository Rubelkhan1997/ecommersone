<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rollchecker');
  }

    function addcoupon(){
      $coupons = Coupon::orderBy('id','desc')->paginate(20);
      return view('coupon',compact('coupons'));
    }
    function addcouponpost(Request $request){
      $request->validate([
        'coupon_name' => 'required',
        'coupon_amount' => 'required',
        'coupon_date' => 'required',
      ],[
        'coupon_name.required' => 'Enter Your Coupon Name',
        'coupon_amount.required' => 'Enter Your Coupon Amount',
        'coupon_date.required' => 'Enter Your Coupon Valid Date',
      ]);
      $request->validate([
        'coupon_name' => 'unique:coupons,coupon_name',
        'coupon_amount' => 'numeric|max:70',
      ]);

      Coupon::insert([
        'coupon_name' => $request->coupon_name,
        'coupon_amount' => $request->coupon_amount,
        'coupon_date' => $request->coupon_date,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('add','Coupon Added Successfully');
    }
    function coupondelete($coupon_id){
      Coupon::find($coupon_id)->delete();
      return back()->with('delete','Coupon Deleted Successfully');
    }

}
