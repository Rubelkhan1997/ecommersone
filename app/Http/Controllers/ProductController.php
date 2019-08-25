<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Productimage;
use Carbon\Carbon;
use DB;
use Image;

class ProductController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rollchecker');
  }

    function addproduct(){
      $categories = Category::orderBy('id','desc')->get();
      return view('product.addproduct',compact('categories'));
    }
    function addproductpost(Request $request){
      $request->validate([
          'category_id' => 'required',
          'product_name' => 'required',
          'product_price' => 'required|numeric',
          'product_quantity' => 'required|numeric',
          'alert_quantity' => 'required|numeric',
          'product_description' => 'required',
          'product_image' => 'required',
        ],
        [
          'product_name.required' => 'Enter Your Product Name',
          'product_price.required' => 'Enter Your Product Price',
          'product_quantity.required' => 'Enter Your Product Quantity',
          'alert_quantity.required' => 'Enter Your Alert Quantity',
          'product_description.required' => 'Enter Your Product Description',
          'product_image.required' => 'Enter Your Product Photos',
        ] );

          $product_id = Product::insertGetId([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alert_quantity' => $request->alert_quantity,
            'product_description' => $request->product_description,
            'created_at'=> Carbon::now(),
          ]);



          if ($request->hasFile('product_image')) {
            foreach ($request->product_image as $main_photo) {
              $image_extension = $main_photo->getClientORiginalExtension();
              $image_size = $main_photo->getClientSize();

              $image_name = $product_id.$image_size.".".$image_extension;
              Image::make($main_photo)->resize(300,300)->save(public_path('product/addproduct/'.$image_name));

                Productimage::insert([
                  'product_id' => $product_id,
                  'product_image' => $image_name,
                  'created_at'=> Carbon::now(),
                ]);
              }
          }

          return back()->with('add','Product Added Successfully');

        }

        function manageproduct(){

          $products = Product::orderBy('id','desc')->paginate(30);
          return view('product.manageproduct',compact('products'));

        }
        function productdelete($product_id){
          $product_images = Productimage::where('product_id',$product_id)->get();
          foreach ($product_images as $product_image) {
             $product_image->product_image;
             unlink(public_path('product/addproduct/'.$product_image->product_image));
          }
          Productimage::where('product_id',$product_id)->delete();
          Product::find($product_id)->delete();
          return back()->with('delete','Product Deleted Successfully');
        }

        function productedit($product_id){
            $categories = Category::orderBy('id','desc')->get();
            $product = Product::findOrFail($product_id);
            return view('product.editproduct',compact('product','categories'));
        }

        function producteditpost(Request $request){
          $product_id = Product::findOrFail($request->product_id)->update([
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'alert_quantity' => $request->alert_quantity,
            'product_description' => $request->product_description,
          ]);


          if ($request->hasFile('product_image')) {

            $product_imgs = Productimage::where('product_id',$request->product_id)->get();
            foreach ($product_imgs as $product_img) {
              $product_img->product_image;
              unlink(public_path('product/addproduct/'.$product_img->product_image));
            }
            Productimage::where('product_id',$request->product_id)->delete();

            foreach ($request->product_image as $main_photo) {
              $image_extension = $main_photo->getClientORiginalExtension();
              $image_size = $main_photo->getClientSize();

              $image_name = $request->product_id.$image_size.".".$image_extension;
              Image::make($main_photo)->resize(300,300)->save(public_path('product/addproduct/'.$image_name));

                Productimage::insert([
                  'product_id' => $request->product_id,
                  'product_image' => $image_name,
                  'created_at'=> Carbon::now(),
                ]);
              }
          }

          return back()->with('update','Product Updated Successfully');
        }

        function productsearch(Request $request){
          $product_name = $request->product_name;
          $products = Product::where('product_name','like','%'.$product_name.'%')->paginate(30);
          return view('product.productsearch',compact('products'));
        }

}
