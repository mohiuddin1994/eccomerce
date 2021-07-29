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
                    <a class="btn btn-success" href="{{route('category')}} "> All category  </a>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/category_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="cat_name">Category Name </label>
                                <input id="cat_name" class="form-control" type="text" value="{{old('cat_name')}} " name="cat_name">
                            </div>
                                <div class="form-group">
                                    <label for="category_id">Parent Category </label>
                                   <select name="category_id" id="category_id" class="form-control" >
                                       <option value="" selected disabled > Select Category</option>
                                       @foreach ($categories as $category)
                                            <option  value="{{$category->id}} "> {{$category->cat_name}}</option>
                                                @foreach ($category->subcategory as $category)
                                                    <option value="{{$category->id}} "disabled> == {{$category->sub_name}}</option>
                                                @endforeach
                                       @endforeach
                                   </select>
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

@section('category_create')
  
@endsection

