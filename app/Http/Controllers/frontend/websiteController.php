<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class websiteController extends Controller
{
    //
    // index route 
    public function index(Request $request){
      
            $product_future = Product::where('statu',1)->get();
            $product_latast = Product::where('statu',1)->get();
            return view('frontend.website.website_index',compact('product_future','product_latast'));
        

       
    }
}
