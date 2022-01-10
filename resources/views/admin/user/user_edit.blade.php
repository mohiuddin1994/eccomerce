

   @extends('admin.admin_layouts')
   @section('admin_content')


   @include('admin.admin_header')

   <div id="layoutSidenav" style="padding-right: 15px;">

       @include('admin.admin_sidebar')

       <div id="layoutSidenav_content">
           <main>
               <div class="container-fluid px-4">
                   
                   <h1 class="mt-4">User info </h1>
                   <ol class="breadcrumb mb-4">
                       <li class="breadcrumb-item active">{{$admin->name}}   </li>
                   </ol>
               <div class="row">
                   <div class="col-lg-6 m-auto">
                       @include('admin.admin_message')
                    <form action="{{ url('admin/user_update'.$admin->id)}} " method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{$admin->name}} ">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email" value="{{$admin->email}} ">
                        </div> 
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" class="form-control" type="text" name="phone" value="{{$admin->phone}} ">
                        </div> 

                        <div class="form-group">
                            <label for="email">Address </label>
                            <textarea id=" " class="form-control" name="address">{{$admin->address}}  </textarea>
                        </div> 

                        <div class="form-group">
                            <label for="old_password"> Old Password </label>
                            <input id="old_password" class="form-control" type="text" name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="new_password">New  Password </label>
                            <input id="new_password" class="form-control" type="text " name="new_password">
                        </div>
                        <div class="form-group">
                            <label for="con_password"> Confirm Password </label>
                            <input id="con_password" class="form-control" type="text" name="con_password">
                        </div>  
                        <div class="form-group">
                            <label for="image"> Image </label>
                            <input id="image" class="form-control" type="file" name="image"><br>
                            <img src="{{asset($admin->image)}}" height="120px" alt="">
                            <input id="old_image" class="form-control" type="hidden" value="{{$admin->image}} " name="old_image">
                        </div>
                        <div class="form-group">
                            <label for="description">Description </label> 
                            <textarea class="summernote" name="description"> {{$admin->description}}  </textarea>
                        </div>
                        <div class="form-group">
                            
                            <input id="my-input" value="Update" class="btn btn-success" type="submit" name="">
                        </div>
                    </form>
                   </div>
               </div>

               </div>
           </main>
           @include('admin.admin_footer')
       </div>


   </div>

   @endsection
 


 