<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    //index route 
    public function index(){
        $subcategories = Subcategory::with('category')->where('statu',1)->get();
        // return $subcategories;
        return view('admin.subcategory.subcategory_index',compact('subcategories'));
    }

    // subcategory edit

    public function edit($id){
        $categories = Category::all();
        $subcategory = Subcategory::where('id',$id)->first();
        return view('admin.subcategory.subcategory_edit',compact('subcategory','categories'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'sub_name' => 'required',
             
        ]);

       $subcategory = Subcategory::where('id',$id)->first(); 
        $subcategory->category_id = $request->category_id;
        $subcategory->sub_name = $request->sub_name;
        $subcategory->save();
        return back()->with('success','successfully update sub category ');
    }
    public function destroy($id){ 
        $subcategory = Subcategory::where('id',$id)->first()->delete(); 
        return back()->with('success','delete success');
    }
}
