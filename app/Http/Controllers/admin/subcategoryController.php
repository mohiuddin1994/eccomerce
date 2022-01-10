<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subcategoryController extends Controller
{
    //index route 
    public function index(){
        $subcategories = Subcategory::with('category')->get();
        // return $subcategories;
        return view('admin.subcategory.subcategory_index',compact('subcategories'));
    }

    // edit route 

    public function edit($id){
        $categories = Category::all();
        $subcategory = Subcategory::where('id',$id)->first();
        return view('admin.subcategory.subcategory_edit',compact('subcategory','categories'));
    }
// updae route 
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
    // delete route 
    public function destroy($id){ 
        $product = Product::where('subcategory_id',$id)->get();
        if(count($product)>0){
            return back()->with('success',' Subcategory already add to product ');
        }else{
            $subcategory = Subcategory::where('id',$id)->first()->delete(); 
            return back()->with('success','delete success'); 
        }
       
    }

    // statu change
    public function changeStatu($id){
        $subcategory = Subcategory::where('id',$id)->first();
         if($subcategory->statu == 1){
             $subcategory->statu = 0;
             $subcategory->save();
         }else{
             $subcategory->statu = 1 ;
             $subcategory->save();
         }
         return back()->with('success','statu change success');
    }
}
