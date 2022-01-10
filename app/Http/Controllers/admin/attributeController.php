<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Color;
use App\Models\ColorSize;
use App\Models\Product;
use App\Models\Size; 
use Illuminate\Http\Request;

class attributeController extends Controller
{
    //  index route 
    public function create($id){
        $product_stock = Product::where('id',$id)->first()->stock;
        $product_id = $id;
        $colors = Color::all();
        $sizes = Size::all();
        $attributes = Attribute::where('product_id',$id)->get();
        return view('admin.attribute.attribute_create',compact('id','colors','sizes','attributes','product_stock'));
    }

    // attribute store  
    public function store(Request $request,$id){
        // dd($request->all());

       
        foreach($request['color_id'] as $key =>$val ){
            $attribute = new Attribute();
            $attribute['product_id'] =$id;
            $attribute['color_id'] = $request['color_id'][$key];
            $attribute['size_id'] = $request['size_id'][$key];
            $attribute['actual_price'] = $request['actual_price'][$key];
            $attribute['stock'] = $request['stock'][$key];
            if($request->hasFile("attri_image.$key")){
                $image = $request->file("attri_image.$key");
                $image_name = rand(12121, 45454545).'.'.$image->extension();
                $image->move(public_path("attri_image"),$image_name);
                $attribute['attri_image'] = "attri_image/".$image_name;
            }
            $attribute->save();
        }


        return redirect()->back()->with('success','success fully add attribute ');
     }


     
// edit function route 
    public function edit($product_id){
        $product_id = $product_id;
        $colors = Color::all();
        $sizes = Size::all();
        $attributes = Attribute::where('product_id',$product_id)->get();
        return view('admin.attribute.attribute_edit',compact('product_id','colors','sizes','attributes'));
    }


        // product attribute update 
    public function update(Request $request,$product_id){
            // dd($request->all());

            // $attribute = Attribute::where('product_id',$product_id)->get();
            // foreach($attribute as $item){
            //     // unlink($item->image);
            //     $item->delete();
            // }

            foreach($request['attri_id'] as $key => $val){
                $attribute = Attribute::where('id',$request['attri_id'][$key])->first();
                $attribute['product_id'] = $product_id;
                $attribute['color_id'] = $request['color_id'][$key];
                $attribute['size_id'] = $request['size_id'][$key];
                $attribute['actual_price'] = $request['actual_price'][$key];
                $attribute['stock'] = $request['stock'][$key];
                if($request->hasFile("attri_image.$key")){
                    if($request["old_attri_image.$key"]){
                        unlink($request["old_attri_image.$key"]);
                    }
                    $image = $request->file("attri_image.$key");
                    $image_name = rand(121545,12124).'.'.$image->extension();
                    $image->move(public_path("attri_image"),$image_name);
                    $attribute['attri_image'] = "attri_image/".$image_name;
                       
                 }
                 $attribute->save();

                // foreach($request['color_id'] as $key=>$val){
                //     $attribute = new Attribute();
                //     $attribute['id']= $request['attri_id'][$key];
                //     $attribute['product_id'] = $product_id;
                //     $attribute['color_id'] = $request['color_id'][$key];
                //     $attribute['size_id'] = $request['size_id'][$key];
                //     $attribute['actual_price'] = $request['actual_price'][$key];
                //     $attribute['stock'] = $request['stock'][$key];
                //     if($request->hasFile("attri_image.$key")){
                //             if($request["old_attri_image.$key"]){
                //                 unlink($request["old_attri_image.$key"]);
                //             }
                //         $image = $request->file("attri_image.$key");
                //         $image_name = rand(121545,12124).'.'.$image->extension();
                //         $image->move(public_path("attri_image"),$image_name);
                //         $attribute['image'] = "attri_image/".$image_name;
                //     }else{
                //         $attribute['image'] = $request['old_attri_image'][$key];
                //     }
                //     $attribute->save();

                 }


            return redirect()->back()->with('success','success fully update ');

    }


    // destroy route  

    public function destroy($id){

        $attribute = Attribute::where('id',$id)->first();
        $attri_image = $attribute->attri_image;
        if($attri_image){
           unlink($attri_image); 
        }
        $attribute->delete();
        return redirect()->back()->with('success','delete success fully ');
        
    }

    public function oneUpdate(Request $request){
        // dd($request->all());
        $attribute = Attribute::where('id',$request->id)->first();
        $attri_image = $attribute->attri_image;
        $attribute->color_id = $request->color_id;  
        $attribute->size_id = $request->size_id;  
        $attribute->actual_price = $request->actual_price;  
        $attribute->stock = $request->stock;  
            if($request->hasFile('attri_image')){
                if($attri_image){
                    unlink($attri_image); 
                 }
                $image = $request->file("attri_image");
                $image_name = rand(121212, 1212121).'.'.$image->extension();
                $image->move(public_path("attri_image"),$image_name);
                $attribute->attri_image = "attri_image/".$image_name;
            } 

            $attribute->save();
            return redirect()->back()->with('success','update success fully');
    
    }

}
