<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function index(){
        $products = Product::where('statu',1)->get();
        return view('admin.product.product_index',compact('products'));
    } 
     
    // category route 
    public function create(){ 
        $categories = Category::all(); 
        return view('admin.product.product_create',compact('categories'));
    }

    // subcategory route with ajax 
    public function subcategoryGet($id){
        $subcategories = Subcategory::where('category_id',$id)->get();
        return response()->json($subcategories);
    }

    public function store(Request $request){
        // dd($request->all());
        $product = new Product();
        $product ->name = $request->name;
        $product ->title = $request->title;
        $product ->pro_code = $request->pro_code;
        $product ->description = $request->description;
        $product ->price = $request->price;
        $product ->stock = $request->stock;
        $product ->category_id = $request->category_id;
        $product ->subcategory_id = $request->subcategory_id; 
        $product ->discount = $request->discount;
        $product ->statu = 1;
            if($product ->is_fauture){
            $product ->is_fauture = $request->is_fauture; 
            }else{
                $product ->is_fauture='no';
            }
        
        if($request->hasFile('image')){
           $image =  $request->file('image');
           if($image){
               $image_name = time().'.'.$image->extension();
               $image->move(public_path('product_image'),$image_name);
               $product->image = "product_image/".$image_name;
           }
        }
        if($request->hasFile('video')){
            $video =  $request->file('video');
            if($video){
                $video_name = time().'.'.$video->extension();
                $video->move(public_path('product_video'),$video_name);
                $product->video = "product_video/".$video_name;
            }
         }
        $product->save();
        return back()->with('success','product add success');

    }

    // change statu route 
    public function changeStatu($id){
        $product = Product::where('id',$id)->first();
         if($product->statu == 1){
             $product->statu = 0;
         }else{
             $product->statu = 1 ;
         }
         return back()->with('success','statu change success');
    }





}
