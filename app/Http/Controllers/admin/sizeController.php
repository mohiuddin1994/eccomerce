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
        $sizes = Size::get();
        // return $subcategories;
        return view('admin.size.size_index',compact('sizes'));
    }
        // size store route
        public function store(Request $request){
            $validated = $request->validate([
                'size_name' => 'required',

            ]);

            $size = new Size();
            $size->size_name = $request->size_name;
            $size->save();
            return back()->with('success','successfully add size ');
        }




    // size edit

    public function edit($id){
        $size = Size::where('id',$id)->first();
        return view('admin.size.size_edit',compact('size'));
    }
    // size update
    public function update(Request $request, $id){
        $validated = $request->validate([
            'size_name' => 'required',

        ]);

       $size = Size::where('id',$id)->first();
        $size->size_name = $request->size_name;
        $size->save();
        return back()->with('success','successfully update size');
    }
    // size destroy
    public function destroy($id){
        $size = Size::where('id',$id)->first()->delete();
        return back()->with('success','delete success');
    }
// statu change
    public function changeStatu($id){
        $size = Size::where('id',$id)->first();
         if($size->statu == 1){
             $size->statu = 0;
             $size->save();
         }else{
             $size->statu = 1 ;
             $size->save();
         }
         return back()->with('success','statu change success');
    }

    public function charge(Request $request){
        dd($request->all());
    }

}
