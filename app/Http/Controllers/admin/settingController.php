<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;  
use Image;
class settingController extends Controller
{
    //
    public function index(Setting $setting){
        $setting = Setting::first();
        return view('admin.setting.setting',compact('setting'));
    }

    public function update( Setting $setting, Request $request){
        // dd($request->all());
        $setting = Setting::first();
        $setting->company_name = $request->company_name;
        $setting->company_link = $request->company_link;
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;
        $setting->company_address = $request->company_address;
        $setting->company_description = $request->company_description;
        $setting->copy_text = $request->copy_text;
        $setting->facebook_icon = $request->facebook_icon;
        $setting->facebook_link = $request->facebook_link;
        $setting->twiter_icon = $request->twiter_icon;
        $setting->twiter_link = $request->twiter_link;
        $setting->youtube_icon = $request->youtube_icon;
        $setting->youtube_link = $request->youtube_link;
        $setting->linkdin_icon = $request->linkdin_icon;
        $setting->linkdin_link = $request->linkdin_link;
        $setting->instagram_icon = $request->instagram_icon;
        $setting->instagram_link = $request->instagram_link;

        if($request->hasFile("image")){
            if($request->old_image){
                unlink($request->old_image);
            }


            $path = public_path('logo');
           

            $image = $request->file("image");
            $image_name = rand(212121,121212).'.'.$image->extension(); 
            // $img = Image::make($image->path());
            // $img->resize(150,150,function($const){
            //     $const->aspectRatio();
            // });
            $image->move(public_path('logo'),$image_name);
            $setting->company_logo = "logo/".$image_name;
        }
        $setting->save();
        return back()->with('success','success fully update ');
         
    }
}
