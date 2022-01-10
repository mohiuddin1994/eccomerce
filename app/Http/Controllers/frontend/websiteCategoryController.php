<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class websiteCategoryController extends Controller
{
    //
    public function categoryProduct(Request $request, $id){

        if($request->ajax()){
           
            $data = $request->all();
            //  echo "<pre>";print_r($data);die;
            $products = Product::where('category_id',$data['id'])->where("statu",1);
            $category = Category::where('id',$id)->first(); 
                  if(isset($data['fabric']) && !empty($data['fabric']) ){
                    $products->whereIn('products.fabric',$data['fabric']);
                  }
                  if(isset($data['sleeve']) && !empty($data['sleeve']) ){
                    $products->whereIn('products.sleeve',$data['sleeve']);
                  }
                  if(isset($data['occassion']) && !empty($data['occassion']) ){
                    $products->whereIn('products.occassion',$data['occassion']);
                  }
  
                    if(isset($_GET['sort']) && !empty($_GET['sort'])){
                        if($_GET["sort"] == "name_A_Z"){
                            $products->orderBy('name','asc');
                        } else if($_GET["sort"] == "name_Z_A"){
                            $products->orderBy('name','desc');
                        }
                        else if($_GET["sort"] == "prichHigh"){
                            $products->orderBy('price','desc');
                        }
                        else if($_GET["sort"] == "priceLow"){
                            $products->orderBy('price','asc');
                        }
                        
                    }
                    $products = $products->paginate(5);
                    // print_r($products);
                    return view('frontend.product.ajaxcategoryProduct',compact('products','category','id'));
              
                }else{
                    $id = $id;
                    $products = Product::where('category_id',$id)->where("statu",1)->orderBy("id",'desc');
                    $category = Category::where('id',$id)->first();
                    $sleeve = array('short sleeve','logn sleeve','full sleeve','sleeve less');
                    $fabric = array('cutton','pholester','wool'); 
                    $occassion = array('casul','formal');
                    $page_name = "categoryProduct";
                    $products = $products->paginate(5);
                    return view('frontend.product.categoryProduct',compact('products','category','id','sleeve','fabric','occassion','page_name'));
                }
            
            } 
        
}
