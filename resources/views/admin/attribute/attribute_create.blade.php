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
                 <div class="">
                    <h1> Product Stock  {{$product_stock}} </h1> 
                 </div>

                 
                 <div class="row">
                     <form action="{{url('admin/product_attri_store'.$id)}} " method="POST"
                         enctype="multipart/form-data">
                         @csrf
                         <div id="example-1" class="content"
                             data-mfield-options='{"section": ".group","btnAdd":"#btnAdd","btnRemove":".btnRemove"}'>
                             <div class="row">
                                 <div class="col-md-12">
                                     <button type="button" id="btnAdd" class="btn btn-primary">Add section</button>
                                 </div>
                             </div>

                             <div class="row group">

                                 <div class="card my-4">
                                     <div class="card-body">

                                         <div class="row ">
                                         <div class="form-group col-lg-3">
                                                 <label for=""> Attribute Color</label>
                                                 <select name="color_id[]" id="" class="form-control" value=" ">
                                                     <option value=" " selected disabled> color </option>
                                                     @foreach ($colors as $color)
                                                     <option value="{{$color->id}} "> {{$color->color_name}} </option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                             
                                             <div class="form-group col-lg-3">
                                                 <label for=""> Attribute Size</label>
                                                 <select name="size_id[]" id="" class="form-control" value=" ">
                                                     <option value=" " selected disabled> Size </option>
                                                     @foreach ($sizes as $size)
                                                     <option value="{{$size->id}} "> {{$size->size_name}} </option>
                                                     @endforeach
                                                 </select>
                                             </div>

                                             <div class="form-group col-lg-3">
                                                 <label for="actual_price">Actual price</label>
                                                 <input id="actual_price" class="form-control" type="text"
                                                     name="actual_price[]" value="{{ old('actual_price')}} ">
                                             </div>

                                             <div class="form-group col-lg-3">
                                                 <label for="stock"> stock</label>
                                                 <input id="stock" class="form-control" type="text" name="stock[]"
                                                     value="{{ old('stock')}} ">
                                             </div>
                                             <div class="form-group col-lg-3">
                                                 <label for="attri_image"> Attribute Imgae</label>
                                                 <input id="attri_image" class="form-control" type="file"
                                                     name="attri_image[]">
                                             </div>


                                             <div class="col-md-3 mt-4 pt-2">
                                                 <button type="button" class="btn btn-danger btnRemove">Remove</button>
                                             </div>
                                         </div>
                                     </div>

                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-3 form-group mt-4">
                             <input type="submit" name="" id="" class="btn btn-success btn-block" value="save">
                         </div>

                     </form>


 



                     @if(count($attributes)>0)
                    
                     @foreach ($attributes as $attribute)
                     
                        <form action=" {{url('admin/oneAttribute_update')}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$attribute->id}} " id="">
                            <div class="row ">
                                
                                <div class="form-group col-lg-3 ">
                                <label for="image">  Color</label>
                                    <select name="color_id" id="" class="form-control" value=" ">
                                        <option value=" " selected disabled> Color </option>
                                        @foreach ($colors as $color)
                                        <option value="{{$color->id}}" @php if($color->id == $attribute->color_id) {echo
                                            "selected"; } @endphp > {{$color->color_name}} </option>


                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="image"> Attribute Size</label>
                                    <select name="size_id" id="" class="form-control" value=" ">
                                        <option value=" " selected disabled> Size </option>
                                        @foreach ($sizes as $size)
                                        <option value="{{$size->id}} " @php if($size->id == $attribute->size_id) {echo
                                            "selected"; } @endphp > {{$size->size_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group col-lg-3">
                                    <label for="actual_price">Actual price</label>
                                    <input id="actual_price" class="form-control" type="text" name="actual_price"
                                        value="{{ $attribute->actual_price }} ">
                                </div>

                                <div class="form-group col-lg-3">
                                    <label for="stock"> stock</label>
                                    <input id="stock" class="form-control" type="text" name="stock"
                                        value="{{ $attribute->stock }} ">
                                </div>
                                <div class="form-group col-lg-3">
                                    <label for="attri_image"> Attribute Imgae</label>
                                    <input id="attri_image" class="form-control" type="file" name="attri_image">
                                    @if ($attribute->attri_image == null)

                                    @else
                                    <img src=" {{asset($attribute->attri_image)}} " height="80px" alt="">
                                    <input type="hidden" value="{{$attribute->attri_image}} " name="old_image" id="">
                                    @endif

                                </div>
                                <div class="col-lg-4">
                                    
                                    <a href="{{url('admin/attribute_destroy'.$attribute->id)}} "
                                        class="btn btn-success mt-4 pt-2"> delete </a>
                                    <a href="{{url('admin/attribute_edit'.$attribute->product_id)}} "
                                        class="btn btn-success mt-4 pt-2"> edit all </a>

                                        <input type="submit" value="update" class="btn btn-success mt-4 pt-2" name="" id="">
                                    
                                </div>

                                
                            </div>
                        </form>
                     @endforeach
                
                     @else
                        <h2 style="text-align: center;color:red;">This product has no attribute </h2>
                     @endif
             



                 </div>
             </div>
            
         </main>
         @include('admin.admin_footer')
     </div>
 </div>

 @endsection


  @section('attribute')
 <script src="{{asset('admin/js/multiField.min.js')}} "></script>
 <script>
     $('#example-1').multifield();

 </script>
 @endsection  
