<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class cartWebsiteController extends Controller
{
    //


    public function singleProductAddCart( Request $request){
//    dd($request->all()); 
            $cartProduct = Cart::where('product_id',$request->product_id)->first();
            // dd($request->all()); 
            if($cartProduct){
                $quanty = $cartProduct->quanty;
                $product = Product::where('id',$request->product_id)->first();
                $stock = $product->stock;
                if($quanty > $stock){
                    return back()->with('success',' out of stock ');
                }else{   
                    $cartProduct->increment('quanty');
                    $cartProduct->save();
                    return back()->with('success',' increment this product  ');
                }

            }else{
                $cart = new Cart();
                $cart ->user_ip = request()->ip(); 
                $cart->product_id = $request->product_id;
                $cart ->quanty = 1; 
                $cart ->cart_price = $request->cart_price; 
                $cart->save();
                return back()->with('success',' success fully add to cart  ');
            }
    }


    public function addCart(Request $request){

        // dd($request->all()); 
        

        if($request->product_id && $request->attribute_id){
            // product attribute add to cart 

                // attribute product stock check 
                $attributeProduct = Attribute::where('id',$request->attribute_id)->first();
                $attributeStock = $attributeProduct->stock;
                if($attributeStock < $request->quanty){
                     // attribute product stock check 
                    return back()->with('success','product attribute out of stock ');
                }else{ 

                       // same attibute cart quanty add
                            $cartAttibute = Cart::where('product_id',$request->product_id)->where('attribute_id',$request->attribute_id)->first();
                            if($cartAttibute){
                                        // same attibute cart quanty check 
                                    $attribute = Attribute::where('id',$request->attribute_id)->first();
                                    $attributeStock = $attribute->stock;
                                        $totalQuanty = $cartAttibute->quanty + $request->quanty;
                                            //    echo "<pre>";Print_r($totalQuanty); die;
                                            if($attributeStock < $totalQuanty){
                                                return back()->with('success',' product add already in cart '.'=' .$cartAttibute->quanty.' Product stock is '.' = '.$attributeStock );
                                            }else{
                                                // same attibute cart quanty add
                                                $cartAttibute->quanty += $request->quanty;
                                                $cartAttibute->save();
                                                return back()->with('success','attribute product quanty add  ');
                                            //    echo "<pre>";Print_r($cartTotalQuanty); die;
        
                                            } 
                            }

                            // new attribute product add to cart 
                  $session_id = Session::get('session_id');
                    if(empty($session_id)){
                        $session_id = Session::getId();
                        Session::put('session_id',$session_id);
                    }
                    $cart = new Cart();
                    
                    $cart ->user_ip = request()->ip(); 
                    $cart ->product_id = $request->product_id; 
                    $cart ->attribute_id = $request->attribute_id; 
                    $cart ->quanty = $request->quanty;
                    $cart ->cart_price = $request->cart_price;  
                    $cart->save();
                    return back()->with('success',' success fully add to cart attribute product  ');
    
                }

                
        }else{
                //  normal product add to cart  
            $product = Product::where('id',$request->product_id)->first();
            $product_stock = $product->stock;
                // product stock check 
            if($product_stock < $request->quanty){
                return back()->with('success','out of stock  ');

            }else{ 
                            // cart quanty and  product  stock check 
                        $cartProduct_id = Cart::where('product_id',$request->product_id)->first();
                        //  echo "<pre>";Print_r($cartQuanty); die;
                    if($cartProduct_id){
                        $cartQuanty = $cartProduct_id-> quanty;
                        $cartTotalQuanty =  $cartQuanty + $request->quanty;
                            //  same product id stock check 
                            if($product_stock < $cartTotalQuanty){
                                return back()->with('success',' product add already in cart '.'=' .$cartQuanty.' Product stock is '.' = '.$product_stock );
                            }else{
                                  //  quanty assign in cart  
                                 $cartProduct_id->quanty += $request->quanty;
                                $cartProduct_id->save();
                                return back()->with('success','successfully successfully to cart ');
                            }
                       
                    }else{ 

                        // get session_id 
                        $session_id = Session::get('session_id');
                        if(empty($session_id)){
                            $session_id = Session::getId();
                            Session::put('session_id',$session_id);
                        }
                        // new product add to cart 
                        $cart = new Cart();
                        $cart ->user_ip = request()->ip(); 
                        $cart ->product_id = $request->product_id;
                        $cart->quanty = $request->quanty;
                        $cart ->cart_price = $request->cart_price;  
                        $cart->save();
                        return back()->with('success','successfully to cart ');
                    }
            }  
            



        }
 
    }

    // 'products.price','products.image','products.name','products.occassion','products.discount','attributes.color_id','attributes.color_id','attributes.attri_image','attributes.size_id','attributes.actual_price','colors.color_name','sizes.size_name'



    public function index(){
        
        $cart= DB::table('carts')
        ->select('carts.*','products.price','products.image','products.name','products.occassion','products.discount','attributes.attri_image','attributes.actual_price','colors.color_name','sizes.size_name')
        ->join('products','products.id','=','carts.product_id')
        ->leftJoin('attributes','attributes.id','=','carts.attribute_id')
        ->leftJoin('colors','colors.id','=','attributes.color_id')
        ->leftJoin('sizes','sizes.id','=','attributes.size_id')
        ->where('user_ip',request()->ip())->get();
        //    echo "<pre>";Print_r($cart); die;
        return view('frontend.cart.cart_index',compact('cart'));
    }


    public function decrement($id){




        $cart = Cart::where('id',$id)->first();
         $quanty = $cart->quanty;
            $product_id = $cart->product_id;
            $attribute_id = $cart->attribute_id;
            if($product_id && $attribute_id ==null){
                // check product stock 
                $product = Product::where('id',$product_id)->first();
                $productStock = $product->stock;
                    if( $cart->quanty > 1 ){
                       $cart->decrement('quanty');
                       return back()->with('success',' quanty decress ');
                    }else{
                        return back()->with('success',' not decress less than 1');
                    }
                   
                //  echo "<pre>"; print_r($productStock); die;
            } 
            elseif($product_id && $attribute_id){
                // check attribute stock 
                $attribute = Attribute::where('product_id',$product_id)->where('id',$attribute_id)->first();
                $attributeStock = $attribute->stock;
                    if( $cart->quanty > 1 ){
                        $cart->decrement('quanty');
                        return back()->with('success',' quanty decress ');
                    }else{
                        return back()->with('success',' not decress less than 1');
                    }
                
                // echo "<pre>"; print_r($attributeStock); die;

            }
      
    }


    
    public function increment($id){
        $cart = Cart::where('id',$id)->first();
        $product_id = $cart->product_id;
        $attribute_id = $cart->attribute_id;
        if($product_id && $attribute_id ==null){
            // check product stock 
            $product = Product::where('id',$product_id)->first();
            $productStock = $product->stock;
            // echo "<pre>"; print_r($productStock); die;
            if($productStock <= $cart->quanty){
                return back()->with('success',' out of stock ');
            }else{
                $cart->increment('quanty');
                return back()->with('success','quanty updata ');
            }
            //  echo "<pre>"; print_r($productStock); die;
        } 
        elseif($product_id && $attribute_id){
            // check attribute stock 
            $attribute = Attribute::where('product_id',$product_id)->where('id',$attribute_id)->first();
            $attributeStock = $attribute->stock;
            // echo "<pre>"; print_r($attributeStock); die;
            if($attributeStock <= $cart->quanty){
                
                return back()->with('success','out of stock');
            }else{
                $cart->increment('quanty');
                return back()->with('success','quanty updata  ');
            }
            
        }

        
    }

    public function destroy($id){
        $cart = Cart::where('id',$id)->first()->delete();
        return back()->with('success','delete cart success fully ');
    }


}
