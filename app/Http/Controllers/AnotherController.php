<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Shippingaddress;
use App\Order;
use App\Billingdetail;
use Carbon\Carbon;
use DB;

class AnotherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rollchecker');
    }

    function addcontact(){
      return view('another.addcontact');
    }
    function addcontactpost(Request $request){
      $request->validate([
        'company_name' => 'required',
        'phone_number' => 'required',
        'email_address' => 'required|email',
        'company_address' => 'required',
      ],
      [
        'company_name.required' => 'Enter Your Company Name',
        'phone_number.required' => 'Enter Your Phone Number',
        'email_address.required' => 'Enter Your Email Address',
        'company_address.required' => 'Enter Your Company Address',
      ]);

      Contact::insert([
        'company_name' => $request->company_name,
        'phone_number' => $request->phone_number,
        'email_address' => $request->email_address,
        'company_address' => $request->company_address,
        'created_at' => Carbon::now(),
      ]);
      return back()->with('add','Contact Infromation Added Successfully');
    }

    function customerorderview(){
      $shippingaddress = DB::table('shippingaddresses')
      ->join('countries','countries.id','shippingaddresses.country_id')
      ->select('shippingaddresses.*','countries.name')
      ->orderBy('id','desc')->paginate('25');

      return view('another.customerorderview',compact('shippingaddress'));
    }
    function orderview($shipping_id){
      Order::where('shipping_id', $shipping_id)->update([
        'order_view' => 2,
      ]);

      $billingdetails = DB::table('billingdetails')
      ->join('products','products.id','billingdetails.product_id')
      ->select('billingdetails.*','products.product_name')
      ->where('sale_id',$shipping_id)->get();

      return view('another.customerproductview',compact('billingdetails'));

    }

    function orderdelete($shipping_id){
      Shippingaddress::find($shipping_id)->delete();
      Order::where('shipping_id',$shipping_id)->delete();
      return back()->with('delete','Order Deleted Successfully');
    }
    function orderpaid($shipping_id){
      Order::find($shipping_id)->update([
        'paid' => 2,
      ]);
      return back()->with('paid','Order Paid Successfully');
    }

}
