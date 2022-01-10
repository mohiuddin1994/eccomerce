<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Orders_log;
use App\Models\Permission;
use App\Models\RoleWisePermission;
use App\Models\RoleWiseUser;
use App\Models\Shiping;
use App\Models\User;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class userLoginController extends Controller
{
    //
   
  
        public function create(){
            return view('frontend.user.user_loginPage');
        }

        // create account user 

        public function store(Request $request){
            // dd($request->all());
            $validated = $request->validate([
                'email' => 'required|unique:users',
                // 'phone' => 'required|min:11|max:11'
                 
            ]);
         
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password =Hash::make($request->password);
            $user->save();
            return back()->with('success','success fully create account');

        }

        public function loginto(Request $request ){

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                if(Auth::user()->role==1){
                    return redirect()->route('admin');
                }else{
                  return redirect()->route('profile');  
                }
                
            }else{
                return redirect()->route('loginPage');
            }







            // dd($request->all()); 

            // $user =  User::where('email',$request->email)->first();
            // if(Hash::check($request->password, $user->password) != null){
            //     // dd($user->id); 
            // //    Session()->put('loginId',$user->id); 
            //     // $this->idToPermisson($user->id);
            //     return redirect()->route('admin');
            // }else{
            //     return back()->with('success','success login failed ');
            // } 
    }

//     function idToPermisson($id){
//         $role_id = DB::table('role_wise_users')->where('user_id',$id)->first();
//         // dd($role_id);

//         $roleWisePermission = DB::table('role_wise_permissions')
//         ->where('role_id',$role_id->role_id)
//         ->get();

//             // dd($roleWisePermission);

//         foreach($roleWisePermission as $key => $val){
//             //  dd($val);
//             $permission = DB::table('permissions')->where('id',$val->permission_id)->first();
//             // dd($permission);
//             $key = $permission->permission_name;
//             $route = $permission->permission_route;
//               Session()->put($key,$route);
            
//         }
//         //  echo "<pre> ";print_r($permission); die;

//    }

    public function loginOut(){
            
            Auth::logout();
            return redirect()->route('/')->with('success',' login out ');
            
        }
// profile index 


        public function profileIndex(){
            $admin = Auth()->user();
            $page_name = "profile_index";
            return view('profile.profile_index',compact('admin','page_name'));
        }
        
        // user order 

        public function userOrder(){
            $orders = Order::select('orders.*','orders_logs.date')
            ->where('user_id',Auth::user()->id)
            ->leftJoin('orders_logs','orders_logs.order_id','=','orders.id')
            ->get();
            //  echo "<pre> ";print_r($orders); die;
            return view('profile.user_order',compact('orders'));
        }


        public function orderDetails($id){
                    $order = Order::where('user_id',Auth::user()->id)->where('id',$id)->first(); 
                    $order_log = Orders_log::where('order_id',$id)->first();
                    $order_items = Order_item::where('order_id',$id)
                    ->select('order_items.*','products.name','products.image','colors.color_name','sizes.size_name','attributes.attri_image')
                    ->leftJoin('products','products.id','=','order_items.product_id')
                    ->leftJoin('attributes','attributes.id','=','order_items.attribute_id')
                    ->leftJoin('colors','colors.id','=','attributes.color_id')
                    ->leftJoin('sizes','sizes.id','=','attributes.size_id') 
                    ->get();
                   
                    $shipping = Shiping::where('order_id',$id)->first();
                    // echo "<pre> ";print_r($order_items); die;
                    return view('profile.order_details',compact('order','order_items','shipping','order_log',));
                }




    




}
