<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rollchecker');
  }

    function addcategory(){
      return view('category.addcategory');
    }
    function addcategorypost(Request $request){
      $request->validate([
        'category_name' => 'required'
      ],
      [
        'category_name.required' => 'Enter Your Category Name',
      ]);
      Category::insert([
        'category_name' => $request->category_name,
        'created_at' => Carbon::now(),
      ]);

      return back()->with('add','Category Added Successfully');
    }
    function managecategory(){
      $categories = Category::orderBy('id','desc')->get();
      return  view('category.managecategory',compact('categories'));
    }
    function categorydelete($category_id){
      Category::find($category_id)->delete();
      return back()->with('delete','Category Deleted Successfully');
    }
    function categoryedit($category_id){
      $category_info = Category::find($category_id);
      return view('category.editcategory',compact('category_info'));
    }
    function categoryeditpost(Request $request){
      Category::find($request->category_id)->update([
        'category_name' =>   $request->category_name,
      ]);

      return back()->with('edit','Category Edited Successfully');

    }

    function categorysearch(Request $request){

      $category_name = $request->category_name;
      $category_searches = Category::where('category_name','like','%'.$category_name.'%')->get();

      return view('category.categorysearch',compact('category_searches'));
    }


}
