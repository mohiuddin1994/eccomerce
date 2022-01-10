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
                    <li class="breadcrumb-item active">Product Edit </li>
                </ol>
                <div class=" text-end ">
                    <a class="btn btn-success" href="{{route('product')}} "> All Product  </a>
                </div>
                <div class="row">
                    <div class="col-lg-7 m-auto">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/product_update'.$product->id)}} " method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label for="name">Product Name </label>
                                <input id="name" class="form-control" type="text" value="{{$product->name}} " name="name">
                            </div>
                            <div class="form-group">
                                <label for="title">Product Title </label>
                                <input id="title" class="form-control" type="text" value="{{$product->title}} " name="title">
                            </div>
                            <div class="form-group">
                                <label for="pro_code">Product Code </label>
                                <input id="pro_code" class="form-control" type="text" value="{{$product->pro_code}} " name="pro_code">
                            </div>
                            <div class="form-group">
                                <label for="image">Product Image </label>
                                <input id="image" class="form-control" type="file" value="{{old('image')}} " name="image">
                                <img src="{{asset($product->image)}} " height="80px" alt="">
                                <input type="hidden" name="old_image" value="{{$product->image}} " id="">
                             
                            </div>
                            <div class="form-group">
                                <label for="description">Product Description </label>
                               <textarea name="description" class="form-control"> {{$product->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Product Price </label>
                                <input id="price" class="form-control" type="text" value="{{$product->price}} " name="price">
                            </div>
                            <div class="form-group">
                                <label for="stock">Product Stock </label>
                                <input id="stock" class="form-control" type="text" value="{{$product->stock}} " name="stock">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Product Category </label>
                                 <select name="category_id" id="category_id" class="form-control" >
                                     <option value=""  > Selecte Category </option>
                                     @foreach ($categories as $category)
                                         <option value=" {{$category->id}} "  @php if($category->id == $product->category_id){ echo "selected"; }  @endphp  > {{$category->cat_name}} </option>
                                     @endforeach 
                                 </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="subcategory_id">Product Subcategory </label>
                                 <select name="subcategory_id" id="subcategory_id" class="form-control">
                                      <option value=""   disabled>Select Subcategory  </option>
                                      @foreach ($subcategories as $item)
                                      <option value="{{$item->id}} " @php if($item->id == $product->subcategory_id){ echo "selected"; }  @endphp    >  {{$item->sub_name }} </option>
                                      @endforeach
                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="video">Product Video </label>
                                <input id="video" class="form-control" type="file" value="{{old('video')}} " name="video">
                                @if ($product->video == null)
                                    
                                @else
                                <video width="100" height="100" controls class="" >
                                    <source src="{{ asset($product->video) }}">
                                  </video>
                                @endif
                               
                                  <input type="hidden" value="{{$product->video}} "  name="old_video" id="">
                            </div>

                            <div class="form-group">
                                <label for="discount">Product Discoutn % </label>
                                <input id="discount" class="form-control" type="text" value="{{$product->discount}}  " name="discount">
                            </div>
                            <div class="form-group">  
                                <label for="fabric">Product Fabric </label>
                                <select name="fabric" id="fabric" class="form-control">
                                    <option value="" selected disabled > selecte Ocassion </option>
                                    @foreach ($fabric as $item) 
                                        <option value="{{$item}}" @php if($item == $product->fabric) echo "selected";  @endphp > {{$item}}  </option>
                                    @endforeach
                                </select>
                            </div> 
                             <div class="form-group">
                                <label for="sleeve">Product Sleeve </label>
                                <select name="sleeve" id="sleeve" class="form-control">
                                    <option value="" selected disabled > selecte Sleeve </option>
                                    @foreach ($sleeve as $item) 
                                        <option value="{{$item}}" @php  if($item == $product->sleeve) echo "selected"; @endphp  > {{$item}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="occassion">Product Ocassion </label>
                                <select name="occassion" id="occassion" class="form-control">
                                    <option value="" selected disabled > selecte Ocassion </option>
                                    @foreach ($occassion as $item) 
                                        <option value="{{$item}}" @php  if($item == $product->occassion) echo "selected"; @endphp  > {{$item}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">Product Weight  </label>
                                <input id="weight" class="form-control" type="text" value="{{$product->weight}}  " name="weight">
                            </div>
                            
                            <input type="file" name="multi_image[]" multiple id="multi_image" class="form-control">
                            <div style="width: 200px, height:50px ">
                                @foreach ($productMultiImage as $item)
                                       <img src="{{asset($item->image)}} " height="40px" alt="">
                                       <input type="hidden" name="old_multi_image[]" value="{{$item->image}} " id="">
                                @endforeach
                             
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

