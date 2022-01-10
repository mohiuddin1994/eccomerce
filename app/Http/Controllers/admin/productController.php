<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMultiImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    public function index(){
        $products = Product::with('multiImage','productAttribute')->get(); 
        $productMultiImage = ProductMultiImage::get();
        $productMultiImage = Attribute::get();
        return view('admin.product.product_index',compact('products','productMultiImage'));
    } 
     
    // category route 
    public function create(){ 
        $categories = Category::all(); 

    //    product filter 
            $sleeve = array('short sleeve','logn sleeve','full sleeve','sleeve less');
            $fabric = array('cutton','pholester','wool'); 
            $occassion = array('casul','formal');

        return view('admin.product.product_create',compact('categories','sleeve','fabric','occassion'));
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
        $product ->fabric = $request->fabric;
        $product ->sleeve = $request->sleeve;
        $product ->occassion = $request->occassion;
        $product ->weight = $request->weight;
        $product ->statu = 1;
            if($product ->is_fauture){
            $product ->is_fauture = $request->is_fauture; 
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

        $product_id = $product->id;
        
         if($request['multi_image']){
             foreach($request['multi_image'] as $key => $val ){
                 $multi_image = new ProductMultiImage();
                 $multi_image['product_id'] = $product_id;
                if($request->hasFile("multi_image.$key")){
                    $image = $request->file("multi_image.$key");
                    $image_name = rand(12121,2154544).'.'.$image->extension();
                   $image->move(public_path("pro_multi_image"),$image_name);
                   $multi_image['image']="pro_multi_image/".$image_name; 
                }
                $multi_image->save();
             }
         }

         $productCategory_id = $product->category_id;
         $catagory = Category::where('id',$productCategory_id)->first();
         $catagory->increment('count');
         $catagory->save();

         $productSubategory_id = $product->subcategory_id;
         $subcatagory = Subcategory::where('id',$productSubategory_id)->first();
         $subcatagory->increment('count');
         $subcatagory->save();
         
        return back()->with('success','product add success');

    }

    // change statu route 
    public function changeStatu($id){
        $product = Product::where('id',$id)->first();
         if($product->statu == 1){
             $product->statu = 0;
             $product->save();
         }else{
             $product->statu = 1 ;
             $product->save();
         }
         return back()->with('success','statu change success');
    }



    // fauture route 


 public function fauture($id){
        $product = Product::where('id',$id)->first();
         if($product->is_fauture == 1){
             $product->is_fauture = 0;
             $product->save();
         }else{
             $product->is_fauture = 1 ;
             $product->save();
         }
         return back()->with('success','statu change success');
    }



    
// edit route edit route 

    public function edit($id){
      
        $product = Product::where('id',$id)->first();
        $categories = Category::get();
        $subcategories = Subcategory::get();
        $productMultiImage = ProductMultiImage::where('product_id',$id)->get();

        // product filter 
        $sleeve = array('short sleeve','logn sleeve','full sleeve','sleeve less');
        $fabric = array('cutton','pholester','wool'); 
        $occassion = array('casul','formal');

        return view('admin.product.product_eidt',compact('product','categories','subcategories','productMultiImage','sleeve','fabric','occassion'));
    }



    public function update(Request $request,$id){
        // dd($request->all());

        $product = Product::where('id',$id)->first();
        $product ->name = $request->name;
        $product ->title = $request->title;
        $product ->pro_code = $request->pro_code;
        $product ->description = $request->description;
        $product ->price = $request->price;
        $product ->stock = $request->stock;
        $product ->category_id = $request->category_id;
        $product ->subcategory_id = $request->subcategory_id; 
        $product ->discount = $request->discount;
        $product ->fabric = $request->fabric;
        $product ->sleeve = $request->sleeve;
        $product ->occassion = $request->occassion;
        $product ->weight = $request->weight;
        // $product->is_fauture = $request->is_fauture; 
          
         if($request->hasFile("image")){
             if($request->old_image){
                 unlink($request->old_image);
             }
             $image = $request->file('image');
             $image_name = time().'.'.$image->extension();
             $image->move(public_path("product_image"),$image_name);
             $product->image = "product_image/".$image_name;
         }

         if($request->hasFile("video")){
            if($request->old_video){
                unlink($request->old_video);
            }
            $video = $request->file('video');
            $video_name = time().'.'.$video->extension();
            $video->move(public_path("product_video"),$video_name);
            $product->video = "product_video/".$video_name;
        }
 
         if($request['multi_image']){

            $productMultiImage = ProductMultiImage::where('product_id',$id)->get();
            foreach($productMultiImage as $item ){
                $item->delete();
            }
            foreach($request['multi_image'] as $key =>$val){
                    $multi_image = new ProductMultiImage();
                    $multi_image['product_id'] = $id;
                 if($request->hasFile("multi_image.$key")){
                     if($request["old_multi_image.$key"]){
                         unlink($request["old_multi_image.$key"]);
                     }
                    $image = $request->file("multi_image.$key");
                    $image_name = rand(121212, 454545 ).'.'.$image->extension();
                    $image->move(public_path("pro_multi_image"),$image_name);
                    $multi_image["image"] = "pro_multi_image/".$image_name;
                }

                $multi_image->save();
            }
         }

            $product->save();
        return back()->with('success','product update success');
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        $category_id = $product->category_id;
        $subcategory_id = $product->subcategory_id;
        $multi_image = ProductMultiImage::where('product_id',$id)->get();
        $image = $product->image;
        $video = $product->video;
        if($image){
            unlink($image);
        }
        if($video){
            unlink($video);
        }

        $product->delete();

        foreach($multi_image as $item ){
            unlink($item->image);
            $item->delete();
        }

        $attribute = Attribute::where('product_id',$id)->get();
        foreach($attribute as $item){
            $image = $item->image;
            if($image){
                unlink($image);
            }
            $item ->delete();
        }

        $category = Category::where('id',$category_id)->first();
        $category->decrement('count');
        $subcategory = Subcategory::where('id',$subcategory_id)->first();
        $subcategory->decrement('count');
        return back()->with('success','product delete success');
    }

}
