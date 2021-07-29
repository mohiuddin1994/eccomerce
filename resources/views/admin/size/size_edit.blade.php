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
                    <a class="btn btn-success" href="{{route('size')}} "> All Size  </a>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/size_update'.$size->id)}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="color_id">Color </label>
                               <select name="color_id" id="color_id" class="form-control" >
                                   <option value="" selected disabled > Select Category</option>
                                   @foreach ($colors as $color)
                                        <option  value="{{$color->id}}" <?php if($color->id == $size->color_id){ echo "selected" ; } ?> > {{$color->color_name}}</option>
                                           
                                   @endforeach
                               </select>
                            </div>

                            <div class="form-group">
                                <label for="size_name">Sub Category Name </label>
                                <input id="size_name" class="form-control" type="text" value=" {{$size->size_name}} " name="size_name">
                            </div> 
                            
                            <input type="submit" class="btn btn-success" value="Update" name="" id="">
                        </form>
                    </div>

                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
