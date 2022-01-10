<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\ServiceTabel;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    //
    public function index(AboutPage $aboutPage){
        $about = AboutPage::first();
        $serve = ServiceTabel::all();
        return view('admin.about.about_index',compact("about","serve"));
    }

    public function updateAbout( AboutPage $aboutPage,Request $request){
        // dd($request->all());
        $about = AboutPage::first();
        $about->headerTitle = $request->headerTitle;
        $about->description = $request->description;

        if($request->hasFile("image")){ 
             $old_image = $request->old_image;
             if($old_image){
                 unlink($old_image);
             }
                $image = $request->file("image");
                $image_name = rand(212121,121212).'.'.$image->extension();
                $image->move(public_path('about'),$image_name);
                $about->image = "about/".$image_name;
            
        }
        if($request->hasFile("imageTwo")){ 
            $old_imageTwo = $request->old_imageTwo;
            if($old_imageTwo){
                unlink($old_imageTwo);
            }
               $image = $request->file("imageTwo");
               $image_name = rand(212121,121212).'.'.$image->extension();
               $image->move(public_path('about'),$image_name);
               $about->imageTwo = "about/".$image_name;
           
       }
       if($request->hasFile("imageOne")){ 
        $old_imageOne = $request->old_imageOne;
        if($old_imageOne){
            unlink($old_imageOne);
        }
           $image = $request->file("imageOne");
           $image_name = rand(212121,121212).'.'.$image->extension();
           $image->move(public_path('about'),$image_name);
           $about->imageOne = "about/".$image_name;
       
   }
        $about->save();
        return back()->with('success',"successfully update aboute page ");

 

    }

    // about frontend page of the page  

    public function aboutIndex(AboutPage $aboutPage ){
        $about = AboutPage::first();
        $service = ServiceTabel::all();
        return view('frontend.about.about_index',compact('about','service'));
    }














}
