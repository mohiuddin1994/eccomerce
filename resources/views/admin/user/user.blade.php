@extends('admin.admin_layouts')
@section('admin_content')


@include('admin.admin_header')

<div id="layoutSidenav" style="padding-right: 15px;">

    @include('admin.admin_sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class=" text-end ">
                    <a class="btn btn-success" href="{{url('admin/category_add')}} "> Add category  </a>
                </div>
                <div class="col-lg-4">
                    @include('admin.admin_message')
                </div>
                <div class="row">  

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL </th>
                            <th scope="col">Image </th>
                            <th scope="col">Name </th>
                            <th scope="col"> email </th> 
                            <th scope="col"> phone  </th> 
                            <th scope="col">address </th> 
                            <th scope="col">description </th> 
                            <th scope="col">statu </th> 
                         
                           
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1
                            @endphp
                            @foreach($users as $user) 
                                 <tr>
                                    <th scope="row"> {{$count++}} </th> 
                                    <th scope="row">
                                        <img src="{{asset($user->image)}} " alt="" height="60px">
                                     </th>
                                    <th scope="row"> {{$user->name}} </th>
                                    <th scope="row"> {{$user->email}} </th>
                                    <th scope="row"> {{$user->phone}} </th>
                                    <th scope="row"> {{$user->address}} </th>
                                    <th scope="row"> {{$user->description}} </th>
                                    <th scope="">
                                        @if($user->statu == 1)
                                            <a id=" " href="{{url('admin/subcategory_statu'.$user->id)}}" class="btn btn-success"> Active </a>
                                        @else 
                                        <a id=" " href="{{url('admin/subcategory_statu'.$user->id)}} " class="btn btn-info"> Unactive </a>
                                        @endif
                                </th>
                               
                                    <th scope="row">  
                                        <a class="btn btn-success" href=" {{url('admin/user_edit'.$user->id)}} ">  <i class="far fa-edit"></i> </a> 
                                        <a class="btn btn-success"href=" {{url('admin/user_delete'.$user->id)}} "> <i class="fas fa-trash-alt"></i> </a> 
                                         
                                    </th>
                                    
                                     
                                </tr>
                            @endforeach
                         
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
 