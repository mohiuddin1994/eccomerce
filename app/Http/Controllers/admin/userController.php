<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\RoleWisePermission;
use App\Models\RoleWiseUser;
use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //
    public function index(){
        $users = User::get();
        return view('admin.user.user',compact('users'));
    }

    // user edit 
    public function edit($id){
        $admin = User::where('id',$id)->first();
        return view('admin.user.user_edit',compact('admin'));
    }

    public function update(Request $request,$id){
// dd($request->all());
        $id = Auth::user()->id; 
        $admin = User::where('id',$id)->first();
        $admin ->name = $request->name;
        $admin ->email = $request->email;
        $admin ->phone = $request->phone;
        $admin ->address = $request->address;
        if( $request->new_password && $request->con_password && $request->old_password){ 
                    if($request->old_password ){    
                             if(Hash::check($request->old_password, $admin->password)){ 
                                if($request->new_password == $request->con_password){
                                    $admin->password = Hash::make($request->new_password);
                                }else{
                                    return redirect()->back()->with('error','new and con password  not match');
                                }
                    }else{
                        return redirect()->back()->with('error','password not match');
                    }
                }
        }
        $admin ->description = $request->description;
        if($request->hasFile('image')){
            $image = $request->file('image');
             if($image){
                 if($request->old_image){
                    unlink($request->old_image);
                 }
                 $image_name = time().'.'.$image->extension();
                 $image->move(public_path('profile_image'),$image_name);
                 $admin->image = 'profile_image/'.$image_name;
             }
        }



         $admin->save();
         return back()->with('success','success fully update ');
        
    }

    public function roleIndex(){
        $userRole = User_role::get();
        return view('admin.user.userRole.userRole',compact('userRole'));
    }

    public function roleStore(Request $request){
        $validated = $request->validate([
            'role_name' => 'required|unique:user_roles',
             
        ]);

        $userRole = new User_role();
        $userRole ->role_name = $request->role_name;
        $userRole->save();
        return back()->with('success','success fully add ');
    }

    // role wise user index
     public function roleWiseUserIndex(){
        $roleWiseUser =DB::table('role_wise_users')
        ->select('users.name','user_roles.role_name','role_wise_users.id')
        ->join('users','users.id','role_wise_users.user_id')
        ->join('user_roles','user_roles.id', 'role_wise_users.role_id')
        ->get();
        //  echo "<pre>   "; print_r($roleWiseUser); die;
        $userRole = User_role::get();
        $user = User::get();
        return view('admin.user.roleWiseUser.roleWiseUser',compact('roleWiseUser','user','userRole'));
    }

    //role wise user  add  
        public function roleWiseUserStore(Request $request){ 
            // dd($request->all());
            $validated = $request->validate([
                'user_id' => 'required',
                'role_id' => 'required',
                 
            ]);
    
        $roleWiseUser = new RoleWiseUser() ;
        $roleWiseUser ->user_id = $request->user_id;
        $roleWiseUser ->role_id = $request->role_id;
        $roleWiseUser->save();
        return back()->with('success','success fully add ');
    }

        //Permission  index 
        public function permissionIndex(){
                $permission = Permission::get();
                return view('admin.user.permission.permission',compact('permission'));
            }

            public function permissionStore(Request $request){ 
                        // dd($request->all());
                        $validated = $request->validate([
                            'permission_name' => 'required',
                            'permission_route' => 'required',
                        ]);
                
                    $permission = new Permission() ;
                    $permission ->permission_name = $request->permission_name; 
                    $permission ->permission_route = $request->permission_route; 
                    $permission->save();
                    return back()->with('success','success fully add ');
                }


                public function roleWisePermissionIndex( Request $request ){
                   if($request->ajax()){
                       $data = $request->all();
                       $permission = DB::table('permissions') 
                       ->leftJoin('role_wise_permissions',"role_wise_permissions.permission_id", "=", "permissions.id")
                       ->where('role_id',$data['role_id'])
                       ->get();
                       
                        
                       return view('admin.user.roleWisePermission.ajax_roleWisePermission',compact("permission"));
                 

                        // echo "<pre>   "; print_r($data); die;
                   }
                        $roleWisePermission = DB::table('role_wise_permissions')
                        ->join("user_roles","user_roles.id", '=', "role_wise_permissions.role_id")
                        ->join("permissions",'permissions.id', "=", "role_wise_permissions.permission_id")
                       ->get();
                        //  echo "<pre>   "; print_r($roleWisePermission); die;
                        $userRole = User_role::get();
                        $permission = Permission::get();
                        return view('admin.user.roleWisePermission.roleWisePermission',compact('roleWisePermission',"userRole","permission"));
                  

                    
                }
    


                public function roleWisePermissionStore(Request $request){ 
                    // dd($request->all());
                    $validated = $request->validate([
                        'permission_id' => 'required',
                        'role_id' => 'required',
                    ]);

                   
                    foreach($request->permission_id as $key =>$value){
                        $roleWisePermission = new RoleWisePermission() ;
                        $roleWisePermission['role_id'] = $request->role_id;
                        $roleWisePermission['permission_id'] = $request['permission_id'][$key];
                       
                        $roleWisePermission->save();
                    }
            
                return back()->with('success','success fully add ');
            }

       
       
            
      
                 
           
       




}
