<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Orders_log;
use App\Models\Shiping;
use App\Models\ShippingCharge;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Cloner\Data;

class orderController extends Controller
{
    public function index(Request $request){

        if(Auth::check()){
            $cart= DB::table('carts')
            ->select('carts.*','products.price','products.image','products.name','products.occassion','products.weight','attributes.attri_image','attributes.actual_price','colors.color_name','sizes.size_name')
            ->join('products','products.id','=','carts.product_id')
            ->leftJoin('attributes','attributes.id','=','carts.attribute_id')
            ->leftJoin('colors','colors.id','=','attributes.color_id')
            ->leftJoin('sizes','sizes.id','=','attributes.size_id')
            ->where('user_ip',request()->ip())
            ->get();
            //   echo "<pre>"; print_r($cart); die;

            $shippingCountry =DB::table('shipping_charges')->get();
            $total_gm = $cart->sum(function($carts){
                return $carts->weight* $carts->quanty;
            });
            // echo "<pre>"; print_r($total_gm); die;


            if($request->ajax()){
                // echo "<pre>"; print_r($request->all()); die;


                if($request->currency == "bd" ){

                //   echo "<pre>"; print_r($request->all()); die;
                    $total_Price = $cart->sum(function($carts){
                        return $carts->cart_price *$carts->quanty  ;
                        });
                        $total_tax = $cart->sum(function($carts){
                            return $carts->cart_price  * 10/100 ;
                            });

                            $shippingCharges =DB::table('shipping_charges')->where('country_name',$request->country)->first();


                            $charge = ($shippingCharges->charge /1000) * $total_gm;
                            // echo "<pre>"; print_r($charge); die;

                        if(Session()->has('coupon')){
                            $discount = Session()->get('coupon')['coupon_discount'] * $total_Price/100 ;
                            $total =  $total_Price + $total_tax -   $discount ;
                            //   echo "<pre>"; print_r($total); die;
                            return view('frontend.order.ajax_orderIndex',compact('cart','total_Price','total_tax','total','discount','charge','shippingCountry'));

                        }else{
                            $total =  $total_Price + $total_tax ;
                            return view('frontend.order.ajax_orderIndex',compact('cart','total_Price','total_tax','total','charge','shippingCountry'));
                            }
                } else if($request->currency == "usa" ){

                    // echo "<pre>"; print_r($request->all()); die;

                        $total_Price = $cart->sum(function($carts){
                            return round($carts->cart_price *$carts->quanty/80 ,2) ;
                            });
                            $total_tax = $cart->sum(function($carts){
                                return round($carts->cart_price  * 10/100/80,2)  ;
                                });


                                $charge = round($request->charge/80,2);

                                // echo "<pre>"; print_r($charge); die;
                            if(Session()->has('coupon')){
                                $discount = round(Session()->get('coupon')['coupon_discount'] * $total_Price/100,2) ;

                                $total =  round($total_Price + $total_tax /80,2) -  $discount ;
                                //   echo "<pre>"; print_r($total); die;
                                return view('frontend.order.ajax_orderIndex',compact('cart','total_Price','total_tax','total','discount','charge','shippingCountry'));

                            }else{
                                $total =  round($total_Price + $total_tax /80,2);
                                return view('frontend.order.ajax_orderIndex',compact('cart','total_Price','total_tax','total','charge','shippingCountry'));
                                }
                    }

             } else{

                    $total_Price = $cart->sum(function($carts){
                        return round($carts->cart_price *$carts->quanty ,2);
                        });
                        $total_tax = $cart->sum(function($carts){
                            return round($carts->cart_price  * 10/100 ,2) ;
                            });
                        $charge = 0;
                        if(Session()->has('coupon')){
                            $discount = round(Session()->get('coupon')['coupon_discount'] * $total_Price/100,2) ;
                            $total =  round($total_Price + $total_tax,2) -   $discount ;
                            //   echo "<pre>"; print_r($total); die;
                            return view('frontend.order.order_index',compact('cart','total_Price','total_tax','total','discount','charge','shippingCountry'));

                        }else{
                            $total =  round($total_Price + $total_tax,2);
                            return view('frontend.order.order_index',compact('cart','total_Price','total_tax','total','charge','shippingCountry'));
                            }
                    //   echo "<pre>"; print_r($total_Price); die;

                  }


            }else{
                    return redirect()->route('loginPage');
                }



            // echo "<pre>"; print_r($cart); die;

    }


    // order store

    public function orderStore(Request $request){
        // dd($request->all());
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total_price = $request->total_price;
        $order->total_tax = $request->total_tax;
        $order->payment_type = $request->payment_type;

        if($request->discount){
           $order->discount = $request->discount;
        }
        $order->shippingCharge = $request->shippingCharge;
        $order->total = $request->total + $request->shippingCharge;
        $order->currency = $request->currency;
        $order->invoice_no = time();
        $order->statu = 'pending';
        $order->save();
        $order_id = $order->id;

        $carts = Cart::where('user_ip',request()->ip())->get();
        foreach($carts as $cart){
            $order_item = new Order_item();
            $order_item ->order_id = $order_id;
                $order_item ->product_id = $cart->product_id;
                $order_item ->attribute_id = $cart->attribute_id;
                $order_item ->quanty = $cart->quanty;
             if($request['currency']=='usa'){
                $order_item ->currency = $request->currency;
                $price = $cart->cart_price;
                $usa_price = $price / 80;
                $order_item ->price = $usa_price;
             }else if($request['currency']=='db'){
                $order_item ->currency = $request->currency;
                $order_item ->price = $cart->cart_price;
             }

             $order_item ->save();
        }

        $shiping = new Shiping();
        $shiping->order_id = $order_id;
        $shiping->name = $request->name;
        $shiping->email = $request->email;
        $shiping->phone = $request->phone;
        $shiping->address = $request->address;
        $shiping->country = $request->country_name;
        $shiping->city = $request->city;
        $shiping->division = $request->division;
        $shiping->zep_code = $request->zep_code;
        $shiping->save();

        // $carts = Cart::where('user_ip',request()->ip())->get();
        foreach($carts as $cart){

            $cart->delete();
        }

        if(Session()->has('coupon')){
            Session()->forget('coupon');
        }

        return redirect()->route('profile');

    }


    public function adminOrders(){
        $orders = Order:: select('orders.*','orders_logs.date')
         ->leftJoin('orders_logs','orders_logs.order_id','=','orders.id')
        ->get();
    //   echo "<pre> ";print_r($orders); die;
        return view('admin.order.order_index',compact('orders'));
    }


    // order statu update
    public function orderStatuUpdata(Request $request){



            $date = date('Y-m-d H:i:s');


             $data = $request->all();

             $order = Order::where('id',$data['order_id'])->where('invoice_no',$data['invoice_no'])->first();
                $order->statu = $data['updata_statu'];
                $order->save();



                $Orders_log = Orders_log::where('order_id',$data['order_id'])->where('invoice_no',$data['invoice_no'])->first();
                 if($Orders_log){
                    $Orders_log ->statu = $data['updata_statu'];
                    $Orders_log->date = $date;
                    $Orders_log ->save();
                 }else{
                $order_log = new Orders_log();
                $order_log ->order_id = $data['order_id'];
                $order_log ->invoice_no = $data['invoice_no'];
                $order_log ->statu = $data['updata_statu'];
                $order_log->date = $date;
                $order_log ->save();

                 }

         return redirect()->route('order');
    }


    // admin order detatils



    public function orderDetails($id){
        $order = Order::where('id',$id)->first();
        // echo "<pre> ";print_r($order); die;
        $order_log = Orders_log::where('order_id',$id)->first();
        //   echo "<pre> ";print_r($order_log); die;
        $order_items = Order_item::where('order_id',$id)
        ->select('order_items.*','products.name','products.image','colors.color_name','sizes.size_name','attributes.attri_image')
        ->join('products','products.id','=','order_items.product_id')
        ->leftJoin('attributes','attributes.id','=','order_items.attribute_id')
        ->leftJoin('colors','colors.id','=','attributes.color_id')
        ->leftJoin('sizes','sizes.id','=','attributes.size_id')
        ->get();
        $shipping = Shiping::where('order_id',$id)->first();
        // echo "<pre> ";print_r($order_items); die;
        return view('admin.order.order_details',compact('order','order_items','shipping','order_log'));
    }

    //admin  creaet invoice no
    public function createInvoice($id){
        $order = Order::where('id',$id)->first();
        $order_log = Orders_log::where('order_id',$id)->first();
        $order_items = Order_item::where('order_id',$id)
        ->select('order_items.*','products.name','products.image','colors.color_name','sizes.size_name','attributes.attri_image')
        ->join('products','products.id','=','order_items.product_id')
        ->leftJoin('attributes','attributes.id','=','order_items.attribute_id')
        ->leftJoin('colors','colors.id','=','attributes.color_id')
        ->leftJoin('sizes','sizes.id','=','attributes.size_id')
        ->get();
        $shipping = Shiping::where('order_id',$id)->first();
        return view('admin.order.invoice_index',compact('order','order_items','shipping','order_log'));
    }


// download invoice

        public function invoiceDwonload($id){

        }

    // order shiping charge

}
