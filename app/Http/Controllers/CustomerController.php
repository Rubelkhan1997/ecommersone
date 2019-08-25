<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customerprofile;
use App\Sale;
use App\Shippingaddress;
use App\Billingdetail;
use Carbon\Carbon;
use DB;
use Session;
use Image;
use Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function customerprofile(){
      $customerprofile = Customerprofile::where('user_id', Auth::id())->first();
      return view('customer.customerprofile',compact('customerprofile'));
    }
    function customerprofilepost(Request $request){
      $customer_id = Customerprofile::insertGetId([
        'user_id' =>  Auth::id(),
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'created_at' =>Carbon::now(),
      ]);


      if ($request->hasFile('photo')) {
        $main_photo = $request->photo;
        $photo_extension =  $main_photo->getClientOriginalExtension();
        $validate_extension = array("jpg", "png","JPG","JPEG");
        if (in_array($photo_extension,$validate_extension )) {
          $photo_name = $customer_id.'.'.$photo_extension;
          Image::make($main_photo)->resize(160,160)->save(public_path('customer_photo/'.$photo_name));
          Customerprofile::find($customer_id)->update([
            'photo' => $photo_name,
          ]);
        }
        else {
          return back()->with('invalid','Your Photo Extension Invalid');
        }
      }
      return back()->with('add','Your Information Added Successfully');
    }

    function customerprofileupdatepost(Request $request){
      Customerprofile::find($request->customer_id)->update([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
      ]);


      if ($request->hasFile('photo')) {
        $delte_photo_name = Customerprofile::find($request->customer_id)->first()->photo;
        unlink(public_path('customer_photo/'.$delte_photo_name));

          $main_photo = $request->photo;
          $photo_extension =  $main_photo->getClientOriginalExtension();
          $validate_extension = array("jpg", "png","JPG","JPEG");
          if (in_array($photo_extension,$validate_extension )) {
            $photo_name = $request->customer_id.'.'.$photo_extension;
            Image::make($main_photo)->resize(160,160)->save(public_path('customer_photo/'.$photo_name));
            Customerprofile::find($request->customer_id)->update([
              'photo' => $photo_name,
            ]);
          }
          else {
            return back()->with('invalid','Your Photo Extension Invalid');
          }
      }
      return back()->with('add','Your Information Added Successfully');

    }

    function customerorder(){
      $sale = Sale::where('user_id',Auth::id())->count();
      return view('customer.customerorder',compact('sale'));
    }
    function customerorderview(){
      $sales = Sale::where('user_id', Auth::id())->get();
      return view('customer.customerorderview',compact('sales'));
    }
    function customerproductview($sale_id){
     $billingdetails =  DB::table('billingdetails')
      ->join('products','products.id','billingdetails.product_id')
      ->select('billingdetails.*','products.product_name')
      ->where('sale_id',$sale_id)
      ->get();

      return view('customer.customerproductview',compact('billingdetails'));
    }


}
