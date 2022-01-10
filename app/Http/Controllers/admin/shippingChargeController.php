<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shippingChargeController extends Controller
{
    //
    public function index(){

    $shippingCharges = ShippingCharge::get();
    return view('admin.shippingCharge.shippingCharge',compact('shippingCharges'));
    }

    public function getShippingCharge(Request $request){
        if($request->ajax()){
            $cart= DB::table('carts')
            ->select('carts.*','products.price','products.image','products.name','products.occassion','products.weight','attributes.attri_image','attributes.actual_price','colors.color_name','sizes.size_name')
            ->join('products','products.id','=','carts.product_id')
            ->leftJoin('attributes','attributes.id','=','carts.attribute_id')
            ->leftJoin('colors','colors.id','=','attributes.color_id')
            ->leftJoin('sizes','sizes.id','=','attributes.size_id')
            ->where('user_ip',request()->ip())
            ->get();
            //   echo "<pre>"; print_r($cart); die;


            $total_gm = $cart->sum(function($carts){
                return $carts->weight* $carts->quanty;
            });
            //   echo "<pre>"; print_r($total_gm); die;

            $data = $request->all();
            // echo "<pre> " ;print_r($data); die;
            $shippingCharges =DB::table('shipping_charges')->where('country_name',$data['country'])->first();

          //    echo "<pre> " ;print_r($shippingCharges); die;
            $charge = ($shippingCharges->charge /1000) * $total_gm;
            $country_name = $shippingCharges->country_name;
         return response()->json(['charge'=>$charge,'country_name'=>$country_name]);
        }
     }

        public function countryCharge(Request $request){
            dd($request->all());
        }





   }



