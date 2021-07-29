<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){
        return view('admin.admin_index');
    }

    public function profile(){
        $role = Auth::user()->role;
        $id = Auth::user()->id;
        $admin = User::where('role',$role)->where('id',$id)->first();
        return view('admin.setting.setting',compact('admin')) ;
    }

    // update profile route                 

    public function update(Request $request,$id){

        $role = Auth::user()->role; 
        $admin = User::where('role',$role)->where('id',$id)->first();
        $admin ->name = $request->name;
        $admin ->email = $request->email;
        $admin ->phone = $request->phone;
        $admin ->address = $request->address;
        if( $request->new_password && $request->con_password && $request->old_password){ 
                    if($request->old_password ){    
                             if(Hash::check($request->old_password, $admin->password)){ 
                                if($request->new_password == $request->con_password){
                                    $admin->password = Hash::make($request->new_password);
                                }else{
                                    return redirect()->back()->with('error','new and con password  not match');
                                }
                    }else{
                        return redirect()->back()->with('error','password not match');
                    }
                }
        }
        $admin ->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
             if($image){
                 if($request->old_image){
                    unlink($request->old_image);
                 }
                 $image_name = time().'.'.$image->extension();
                 $image->move(public_path('profile_image'),$image_name);
                 $admin->image = 'profile_image/'.$image_name;
             }
        }



         $admin->save();
         return back()->with('success','success fully update ');
        
    }


}
