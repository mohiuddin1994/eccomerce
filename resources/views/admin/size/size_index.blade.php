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
                    <li class="breadcrumb-item active">Size</li>
                </ol>
                <div class=" text-end ">
                    <a class="btn btn-success" href="{{url('admin/color')}} "> Add Size </a>
                </div>
                <div class="col-lg-4">
                    @include('admin.admin_message')
                </div>
                <div class="row">  

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL </th>
                            <th scope="col">Id</th>
                            <th scope="col">  Color Name </th> 
                            <th scope="col"> Size Name </th> 
                         
                           
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1
                            @endphp
                            @foreach ($sizes as $size) 
                                 <tr>
                                    <th scope="row"> {{$count++}} </th>
                                    <th scope="row"> {{$size->id}} </th> 
                                    <th scope="row"> {{$size->color->color_name}} </th>
                                    <th scope="row"> {{$size->size_name}} </th>
                                    
                                    <th scope="row"> 
                                         <a class="btn btn-success" href=" {{url('admin/size_edit'.$size->id)}} "> edit </a> 
                                         <a class="btn btn-success"href=" {{url('admin/size_destroy'.$size->id)}} "> delete </a> 
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

 