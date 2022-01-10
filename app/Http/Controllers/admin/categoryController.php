<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
 

class categoryController extends Controller
{
    //category index route 
    public function index(){
        $categories = Category::get();
        return view('admin.category.category_index',compact('categories'));
    } 

    // category create route 
    public function create(){
        $categories = Category::with('subcategory')->get();
        // return $categories;
        return view('admin.category.category_create',compact('categories'));
    }

    // category store route 
    public function store(Request $request){
        $validated = $request->validate([
            'cat_name' => 'required|unique:categories|max:255',
             
        ]);
    
        if($request->category_id){
            $validated = $request->validate([
                'cat_name' => 'required',
                 
            ]);

            $subcategory = new Subcategory();
            $subcategory->category_id = $request->category_id;
            $subcategory->sub_name = $request->cat_name;
            $subcategory->save();
            return back()->with('success','successfully add sub category ');
        }
        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->save();
        return back()->with('success','successfully add category ');
    }



    // category edit rotue 
    public function edit($id){
        $category = Category::where('id',$id)->first();
        return view('admin.category.category_edit',compact('category'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'cat_name' => 'required',
             
        ]);
        $category = Category::where('id',$id)->first();
        $category->cat_name = $request->cat_name;
        $category->save();
        return back()->with('success','successfully update  category ');
    }
    // category destroy rotue 
    public function destroy($id){
        $product = Product::where('category_id','=',$id)->get();
        
            if(count($product)>0){
                return back()->with('success',' not delete it add to  product ');
            }else{
                 $category = Category::where('id',$id)->first()->delete();
                $subcategory = Subcategory::where('category_id',$id)->get();
                foreach($subcategory as $item){
                    $item->delete();
                }
                return back()->with('success','delete success');
            }
            
        }
        // change statu 
       
        public function changeStatu($id){
            $category = Category::where('id',$id)->first();
             if($category->statu == 1){
                 $category->statu = 0;
                 $category->save();
             }else{
                 $category->statu = 1 ;
                 $category->save();
             }
             return back()->with('success','statu change success');
        }

}
