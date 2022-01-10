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
                    <a class="btn btn-success" href="{{route('product')}} "> All Product </a>
                </div>
                <div class="col-lg-5">
                    @include('admin.admin_message')
                </div>
                <div class="row">
                    <form action="{{url('admin/attribute_update'.$product_id)}} " method="post"
                        enctype="multipart/form-data">
                        @csrf 

                            @foreach ($attributes as $attribute)



                            <div class="row">


                                <input type="hidden" value="{{$attribute->id}}" name="attri_id[]">
                                <input type="hidden" value="{{$attribute->Product_id}}" name="Product_id[]">

                                <div class="form-group col-lg-3 ">
                                    <label for="image"> Attribute Color</label>
                                    <select name="color_id[]" id="" class="form-control" value=" ">
                                        <option value=" " selected disabled> Color </option>
                                        @foreach ($colors as $color)
                                        <option value="{{$color->id}}" @php if($color->id == $attribute->color_id) {echo
                                            "selected"; } @endphp > {{$color->color_name}} </option>


                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="image"> Attribute Size</label>
                                    <select name="size_id[]" id="" class="form-control" value=" ">
                                        <option value=" " selected disabled> Size </option>
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}} " @php if($size->id == $attribute->size_id) {echo
                                            "selected"; } @endphp > {{$size->size_name}} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="actual_price">Actual price</label>
                                    <input id="actual_price" class="form-control" type="text" name="actual_price[]"
                                        value="{{ $attribute->actual_price }} ">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="stock"> stock</label>
                                    <input id="stock" class="form-control" type="text" name="stock[]"
                                        value="{{ $attribute->stock }} ">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="attri_image"> Attribute Imgae</label>
                                    <input id="attri_image" class="form-control" type="file" name="attri_image[]">
                                    @if ($attribute->attri_image == null)

                                    @else
                                    <img src=" {{asset($attribute->attri_image)}} " height="80px" alt="">
                                    <input type="hidden" value="{{$attribute->attri_image}} " name="old_attri_image[]" id="">
                                    @endif

                                </div>
                             </div>
                        @endforeach 
                         
                        <input type="submit" value="Update" class="btn btn-success" name="" id="">
                    </form>



                </div>
            </div>

        </main>
        @include('admin.admin_footer')
    </div>
</div>

@endsection
 