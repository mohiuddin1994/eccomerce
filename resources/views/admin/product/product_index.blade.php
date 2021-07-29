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
                    <a class="btn btn-success" href="{{url('admin/product_create')}} "> Add Product  </a>
                </div>
                <div class="row"> 
                    <div class="col-lg-4">
                        @include('admin.admin_message')
                    </div>

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL </th>
                            <th scope="col"> Name </th> 
                            <th scope="col"> title </th> 
                            <th scope="col"> code </th> 
                            <th scope="col"> Image </th> 
                            <th scope="col"> Description </th> 
                            <th scope="col"> Price </th> 
                            <th scope="col"> Stock </th> 
                            <th scope="col"> Category </th> 
                            <th scope="col"> Subctegory </th> 
                            <th scope="col"> Video </th> 
                            <th scope="col"> Discount </th> 
                            <th scope="col"> Fauture </th> 
                            <th scope="col"> statu </th> 
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1
                            @endphp
                            @foreach ($products as $product) 
                                 <tr>
                                    <th scope=""> {{$count++}} </th>
                                    <th scope=""> {{$product->name}} </th> 
                                    <th scope=""> {{$product->title}} </th>
                                    <th scope=""> {{$product->pro_code}} </th>
                                    <th scope=""> <img src="{{asset($product->image)}}" height="50px" alt=""> </th>
                                    <th scope=""> {{ Str::limit($product->description,10)}} </th>
                                    <th scope=""> {{$product->price}} </th>  
                                     <th scope=""> {{$product->stock}} </th>
                                     <th scope=""> {{$product->category_id}} </th>
                                     <th scope=""> {{$product->subcategory_id}} </th>
                                     <th scope=""> 
                                         @if ($product->video == null)
                                             
                                         @else
                                         <video width="100" height="100" controls class="thumb" data-full="{{ asset($product->video) }}">
                                            <source src="{{ asset($product->video) }}">
                                          </video>
                                         @endif
                                       
                                    </th>
                                     <th scope=""> {{$product->discount}} </th>
                                     <th scope=""> {{$product->is_fauture}} </th>
                                     
                                    <th scope=""> 
                                         <a class="btn btn-success" href=" {{url('admin/category_edit'.$product->id)}} "> edit </a> 
                                         <a class="btn btn-success"href=" {{url('admin/category_destory'.$product->id)}} "> delete </a> 
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


@section('category_index')

           
<script>
            
    
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        // subcategory ajax 
        $('#parent_category').on('change',function(){

            var id = $(this).val();
             $.ajax({
                 url:"subcategory_select"+id,
                 dataType:"json",
                 type:"GET",
                 success:function(res){  
                     $data = " ";
                    
                     $data = $data + '<option value= " "selected disabled >  sub category   </option>' 
                    $.each(res,function(key ,value ){
                        
                        $data = $data + '<option value= " '+ value.id +' ">'+ value.name +'</option>'
                        
                    })
                    $("#subcategory").html($data);
                 }
                 
             })

        })
         
});
</script>

<script>

    $('#subcategory').on('change',function(){

        var id = $(this).val();
        
         $.ajax({
             url:"subSubcategory_select"+id,
             dataType:"json",
             type:"GET",
             success:function(res){  
                 $data = " ";
                
                 $data = $data + '<option value= " "selected disabled >  sub sub category   </option>' 
                $.each(res,function(key ,value ){
                    
                    $data = $data + '<option value= " '+ value.id +' ">'+ value.name +'</option>'
                    
                })
                $("#subSubcategory").html($data);
             }
             
         })

    })


</script>



@endsection