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
                    <li class="breadcrumb-item active">Product</li>
                </ol>
                <div class=" text-end ">
                    <a class="btn btn-success" href="{{route('product')}} "> All Product  </a>
                </div>
                <div class="row">
                    <div class="col-lg-7 m-auto">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/product_store')}} " method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Name </label>
                                <input id="name" class="form-control" type="text" value="{{old('name')}} " name="name">
                            </div>
                            <div class="form-group">
                                <label for="title">Product Title </label>
                                <input id="title" class="form-control" type="text" value="{{old('title')}} " name="title">
                            </div>
                            <div class="form-group">
                                <label for="pro_code">Product Code </label>
                                <input id="pro_code" class="form-control" type="text" value="{{old('pro_code')}} " name="pro_code">
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image </label>
                                <input id="image" class="form-control" type="file" value="{{old('image')}} " name="image">

                            </div>
                            <div class="form-group">
                                <label for="description">Product Description </label>
                               <textarea name="description" class=" form-control" > {{old('description')}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price </label>
                                <input id="price" class="form-control" type="text" value="{{old('price')}} " name="price">
                            </div>
                            <div class="form-group">
                                <label for="stock">Product Stock </label>
                                <input id="stock" class="form-control" type="text" value="{{old('stock')}} " name="stock">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Product Category </label>
                                 <select name="category_id" id="category_id" class="form-control" >
                                     <option value=""  > Selecte Category </option>
                                     @foreach ($categories as $category)
                                         <option value=" {{$category->id}} "> {{$category->cat_name}} </option>
                                     @endforeach
                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="subcategory_id">Product Subcategory </label>
                                 <select name="subcategory_id" id="subcategory_id" class="form-control">
                                      <option value="" selected disabled>Select Subcategory  </option>
                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="video">Product Video </label>
                                <input id="video" class="form-control" type="file" value="{{old('video')}} " name="video">
                            </div>

                            <div class="form-group">
                                <label for="discount">Product Discoutn % </label>
                                <input id="discount" class="form-control" type="text" value="{{old('discount')}} " name="discount">
                            </div>
                            <div class="form-group">
                                <label for="fabric">Product Fabric </label>
                                <select name="fabric" id="fabric" class="form-control">
                                    <option value="" selected disabled > selecte Ocassion </option>
                                    @foreach ($fabric as $item)
                                        <option value="{{$item}}"> {{$item}} </option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label for="sleeve">Product Sleeve </label>
                                <select name="sleeve" id="sleeve" class="form-control">
                                    <option value="" selected disabled > selecte Sleeve </option>
                                    @foreach ($sleeve as $item)
                                        <option value="{{$item}}"> {{$item}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="occassion">Product Ocassion </label>
                                <select name="occassion" id="occassion" class="form-control">
                                    <option value="" selected disabled > selecte Ocassion </option>
                                    @foreach ($occassion as $item)
                                        <option value="{{$item}}"> {{$item}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">Product Weight  </label>
                                <input id="weight" class="form-control" type="text" value="{{old('weight')}} " name="weight">
                            </div>
                             <div class="form-group">
                                <label for="is_fauture">Product Fauture </label>
                                <input type="checkbox" name="is_fauture" id="is_fauture" value="1"><br>

                            </div>
                            <div class="form-group">
                                <label for="is_fauture"> Slider image  </label>
                                <input type="file" name="multi_image[]" multiple id="multi_image" class="form-control">

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

@section('product_create')

    <Script>
        $("#category_id").on('change',function(){
            var id = $(this).val();
            $.ajax({
                url:"subcategoryGet"+id,
                type:"GET",
                dataType:'json',
                success:function(res){
                    console.log(res);
                    $data = "";
                    $data = $data + "<option selected disabled > Select Subcategory </option>";
                        $.each(res,function(key,value){
                            $data = $data + "<option value='"+value.id+"' > "+ value.sub_name+" </option>";
                        });
                        $("#subcategory_id").html($data);


                }
            })
        })
    </Script>

@endsection

