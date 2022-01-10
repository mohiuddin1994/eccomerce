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
                            <th scope="col"> Fabric </th> 
                            <th scope="col"> sleeve </th> 
                            <th scope="col"> Occassion </th> 
                            <th scope="col"> Weight </th> 
                            <th scope="col"> Fauture </th> 
                            <th scope="col"> statu </th> 
                            <th scope="col">Action</th>
                            <th scope="col">image</th>
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
                                    <td> {{substr( $product->description , 0, 30)}}</td>
                                    <th scope=""> {{$product->price}} </th>  
                                     <th scope=""> {{$product->stock}} </th>
                                     <th scope=""> {{$product->category->cat_name}} </th>
                                     @if ($product->subcategory_id == null)
                                         <th>  </th>
                                     @else
                                            <th scope=""> {{$product->subcategory->sub_name}} </th>
                                     @endif
                                  
                                     
                                     
                                         @if ($product->video == null)
                                              <th>  </th>
                                         @else 
                                         <th scope=""> 
                                         <video width="50" height="50" controls class="thumb" data-full="{{ asset($product->video) }}">
                                            <source src="{{ asset($product->video) }}">
                                          </video>
                                        </th>
                                         @endif
                                       
                                   
                                     <th scope=""> {{$product->discount}} % </th>
                                     <th scope=""> {{$product->fabric}} </th>
                                     <th scope=""> {{$product->sleeve}} </th>
                                     <th scope=""> {{$product->occassion}} </th>
                                     <th scope=""> {{$product->weight}} </th>

                                      <th>
                                        @if($product->is_fauture == 1)
                                              <a href="{{url('admin/product_fauture'.$product->id)}} " class="btn btn-secondary"> yes </a>
                                        @else
                                            <a href="{{url('admin/product_fauture'.$product->id)}} " class="btn btn-secondary"> no </a>
                                        @endif
                                      </th>
                                     <th scope="">
                                            @if($product->statu == 1)
                                                <a href="{{url('admin/product_statu'.$product->id)}} "class="btn btn-success"> Active </a>
                                            @else 
                                            <a href="{{url('admin/product_statu'.$product->id)}}  "class="btn btn-info"> Unactive </a>
                                            @endif
                                    </th>
                                    <th  class=" "> 
                                        <div style="width: 200px">
                                            @if(count($product->productAttribute)>0)
                                                    <a class="btn btn-success" href=" {{url('admin/product_attri_create'.$product->id)}} ">added attri </a> 
                                            @else
                                                <a class="btn btn-danger" href=" {{url('admin/product_attri_create'.$product->id)}} "> add attri </a> 
                                            @endif
                                            
                                            <a class="btn btn-success" href=" {{url('admin/proudct_edit'.$product->id)}} "> <i class="far fa-edit"></i> </a> 
                                            <a class="btn btn-success"href=" {{url('admin/proudct_destory'.$product->id)}} "> <i class="fas fa-trash-alt"></i> </a> 
                                        </div>
                                    </th>

                                    <th>
                                        @foreach ($product->multiImage as $item)
                                        <th scope=""> <img src="{{asset($item->image)}}" height="50px" alt=""> </th>
                                        @endforeach
                                    </th>
                                   
                                </tr>

                            @endforeach
                            
                          
                        </tbody>
                      </table>
                </div>
            </div>

            {{--  <nav aria-label="...">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#"> {{$products->links()}} </a></li>
                   
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
            </nav>  --}}
        </main>
        @include('admin.admin_footer')
    </div>

    {{--  {{ $users->links() }}  --}}
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