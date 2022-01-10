<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class websiteSubcategoryController extends Controller
{
    //
    public function subcategoryProduct(Request $request,$id){

        if($request->ajax()){
            
            $data = $request->all();
            //  echo "<pre>"; print_r($data); die;
                $subcategory =Subcategory::where('id',$id)->where("statu",1)->first();
                $category_id = $subcategory->category_id; 
                $products = Product::where('category_id',$category_id)->where('subcategory_id',$id)->where('statu',1);
                    if(isset($data['fabric']) && !empty($data['fabric'])){
                        $products->whereIn('products.fabric',$data['fabric']);
                    } 
                    if(isset($data['sleeve']) && !empty($data['sleeve'])){
                        $products->whereIn('products.sleeve',$data['sleeve']);
                    } 
                    if(isset($data['occassion']) && !empty($data['occassion'])){
                        $products->whereIn('products.occassion',$data['occassion']);
                    }
                     
                if(isset($data['sort']) && !empty($data['sort'])){
                    if($data['sort']=="name_a_z"){
                        $products->orderBy('name','desc');

                    }else if($data['sort']=="name_z_a"){
                        $products->orderBy('name','asc');

                    }
                    else if($data['sort']=="priceHigh"){
                        $products->orderBy('price','desc');

                    }
                    else if($data['sort']=="priceLow"){
                        $products->orderBy('price','asc');

                    }
                    
                }
                $products = $products->get(); 
                return view('frontend.product.ajaxSubcategoryProduct',compact('products','subcategory','id'));
        }
        $id = $id;
         $subcategory =Subcategory::where('id',$id)->where("statu",1)->first();
         $category_id = $subcategory->category_id; 
        $products = Product::where('category_id',$category_id)->where('subcategory_id',$id)->where('statu',1)->get();
        $sleeve = array('short sleeve','logn sleeve','full sleeve','sleeve less');
        $fabric = array('cutton','pholester','wool'); 
        $occassion = array('casul','formal');
        $page_name = "subcategoryProduct";
        return view('frontend.product.subcategoryProduct',compact('products','subcategory','id','sleeve','fabric','occassion','page_name'));
    } 
}
