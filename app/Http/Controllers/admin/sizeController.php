<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Http\Request;

class sizeController extends Controller
{
   
    //index route 
    public function index(){
        $sizes = Size::with('color')->where('statu',1)->get();
        // return $subcategories;
        return view('admin.size.size_index',compact('sizes'));
    }

    // subcategory edit

    public function edit($id){
        $colors = Color::all();
        $size = Size::where('id',$id)->first();
        return view('admin.size.size_edit',compact('colors','size'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'size_name' => 'required',
             
        ]);

       $size = Size::where('id',$id)->first(); 
        $size->color_id = $request->color_id;
        $size->size_name = $request->size_name;
        $size->save();
        return back()->with('success','successfully update size');
    }
    public function destroy($id){ 
        $size = Size::where('id',$id)->first()->delete(); 
        return back()->with('success','delete success');
    }
}
