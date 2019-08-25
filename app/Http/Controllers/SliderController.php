<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    function addslider(){
      return view('slider.addslider');
    }
    function addsliderpost(Request $request){
      $slider_id = Slider::insertGetId([
        'title_one' => $request->title_one,
        'title_two' => $request->title_two,
        'title_three' => $request->title_three,
        'created_at' =>  Carbon::now(),
      ]);


      if ($request->hasFile('slider_photo')) {
        $main_photo = $request->slider_photo;
        $image_extension = $main_photo->getClientOriginalExtension();
        $validate_extension = array('jpg','png','JPEG','JPG');
        if (in_array($image_extension, $validate_extension)) {
          $new_name = $slider_id.'.'.$image_extension;
          Image::make($main_photo)->resize(1063,730)->save(public_path('slider/slider_photo/'.$new_name));
          Slider::find($slider_id)->update([
            'slider_photo' => $new_name,
          ]);

        }
        else {
          echo "invalid";
        }
      }

      return back();
    }
}
