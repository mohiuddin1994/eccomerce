<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class couponController extends Controller
{
    //
    public function index()
    {
        $coupons = Coupon::get();
        // return $colors;
        return view('admin.coupon.coupon_index',compact('coupons'));
    }

      // category store route 
      public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'discount' => 'required',
             
        ]); 
        
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->save();
        return back()->with('success','successfully add coupon ');
    }



    // category edit rotue 
    public function edit($id){
        $coupon = Coupon::where('id',$id)->first();
        return view('admin.coupon.coupon_edit',compact('coupon'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required',
            'discount' => 'required',
             
        ]);
        $coupon = Coupon::where('id',$id)->first();
        $coupon->name = $request->name;
        $coupon->discount = $request->discount;
        $coupon->save();
        return back()->with('success','successfully update  coupon ');
    }
    // category destroy rotue 
    public function destroy($id){

        $coupon = Coupon::where('id',$id)->first()->delete();
        return back()->with('success','delete success');
    }
    
// statu change 
    public function changeStatu($id){
        $coupon = Coupon::where('id',$id)->first();
        if($coupon->statu == 1){
            $coupon->statu = 0;
            $coupon->save();
        }else{
            $coupon->statu = 1 ;
            $coupon->save();
        }
        return back()->with('success','statu change success');
    }

         // frontend coupon applied route 
    public function couponAplied(Request $request){
        
        $coupon = Coupon::where('name',$request->name)->first();
        if($coupon){
            Session()->put('coupon',[
                'coupon_name'=>$coupon->name,
                'coupon_discount'=>$coupon->discount,
            ]);
            return back()->with('success','Coupn name applied');
        }else{
            return back()->with('success','Coupn name not match');
        }
    }
    public function couponRemove(){ 
            Session()->forget('coupon'); 
        return back()->with('success','Coupn name remove');
    }

}
