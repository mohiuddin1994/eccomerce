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
                    <a class="btn btn-success" href="{{route('subcategory')}} "> All category  </a>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/subcategory_update'.$subcategory->id)}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_id">Parent Category </label>
                               <select name="category_id" id="category_id" class="form-control" >
                                   <option value="" selected disabled > Select Category</option>
                                   @foreach ($categories as $category)
                                        <option  value="{{$category->id}}" <?php if($category->id == $subcategory->category_id){ echo "selected" ; } ?> > {{$category->cat_name}}</option>
                                           
                                   @endforeach
                               </select>
                            </div>

                            <div class="form-group">
                                <label for="sub_name">Sub Category Name </label>
                                <input id="sub_name" class="form-control" type="text" value=" {{$subcategory->sub_name}} " name="sub_name">
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
