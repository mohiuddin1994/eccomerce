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

                <div class="col-lg-4">
                    @include('admin.admin_message')
                </div>
                <div class="row">
                    <div class="col-lg-7">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL </th>
                                    <th scope="col">Id</th>
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
                                    <th scope="row"> {{$size->size_name}} </th>
                                    <th scope="">
                                        @if($size->statu == 1)
                                            <a id=" " href="{{url('admin/size_statu'.$size->id)}}" class="btn btn-success"> Active </a>
                                        @else 
                                        <a id=" " href="{{url('admin/size_statu'.$size->id)}} " class="btn btn-info"> Unactive </a>
                                        @endif
                                </th>
                                    <th scope="row">
                                        <a class="btn btn-success" href=" {{url('admin/size_edit'.$size->id)}} ">  <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-success" href=" {{url('admin/size_destroy'.$size->id)}} ">
                                            <i class="fas fa-trash-alt"></i> </a>
                                    </th>


                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/size_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="size_name"> Size </label>
                                <input id="size_name" class="form-control" type="text" value="{{old('size_name')}} "
                                    name="size_name">
                            </div>
        
                            <input type="submit" class="btn btn-success" value="save" name="" id="">
                        </form>
                    </div>

                </div>
            </div>

           
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
