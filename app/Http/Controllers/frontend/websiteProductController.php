<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
 
class websiteProductController extends Controller
{
    //

    // product search 

        public function search(Request $request){
                $product_latast = Product::where('name','LIKE','%'.$request->name.'%')->get();
                return view('frontend.website.ajax_productList',compact('product_latast'));   

        }
        public function productDetails($id){

            $product = Product::with("color")->where("id",$id) 
            ->first(); 
        
            // echo "<pre>"; print_r($product); die;
            $attribute = DB::table('attributes')->where('product_id',$id)
            ->select('attributes.*','colors.color_name')
            ->join('colors', 'colors.id', '=', 'attributes.color_id')
            ->groupBy('color_id')
            ->get();
            // echo "<pre>"; print_r($attribute); die;
            $category_id = $product->category_id;
            $relatedProduct = Product::where('category_id',$category_id)->where('id','!=',$id)->get();
            return view('frontend.product.product_details',compact('product','relatedProduct','attribute'));
            
        }


    // get attribute size 
        public function getSize(Request $request){
            $attribute = Attribute::where('color_id',$request->colorId)->where('product_id',$request->product_id)
            ->select("attributes.id","sizes.size_name")
            ->join("sizes","sizes.id","attributes.size_id")
            ->get();
            // echo "<pre>"; print_r($attribute); die;
            return response()->json($attribute);
        }

        public function sizeWise(Request $request){
           
            $attribute = Attribute::where('id',$request->id)->where('product_id',$request->product_id)
            // ->join('products','products.id','attributes.product_id')
            ->first();
            $attribute_price = $attribute->actual_price;

            $product = Product::where('id',$request->product_id)->first();
            $discount = $product->discount;
            $discount_price = $attribute_price - ($attribute_price * $discount/100);
            return response()->json(['attribute'=>$attribute,'discount_price'=>$discount_price,'discount'=>$discount]);
        }
        
       

        // product search controller 
       
        

}
