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
                    <li class="breadcrumb-item active">Shipping Charge </li>
                </ol>

                <div class="row">

                     <div class="text-end">
                         <a class="btn btn-success" href="{{route('countryCharge')}} "> add Charge </a>
                     </div>
                    <div class="col-lg-8">
                        @include('admin.admin_message')
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">SL </th>
                            <th scope="col">Id</th>
                            <th scope="col">Country Name </th>
                            <th scope="col"> Charge </th>
                            <th scope="col"> statu </th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1
                            @endphp
                            @foreach ($shippingCharges as $category)
                                 <tr>
                                    <th scope="row"> {{$count++}} </th>
                                    <th scope="row"> {{$category->id}} </th>

                                    <th scope="row"> {{$category->country_name}} </th>
                                    <th scope="row"> {{$category->charge}} </th>
                                    <th scope="">
                                        @if($category->statu == 1)
                                            <a id="category_statu" href="{{url('admin/category_statu'.$category->id)}}" class="btn btn-success"> Active </a>
                                        @else
                                        <a id="category_statu" href="{{url('admin/category_statu'.$category->id)}} " class="btn btn-info"> Unactive </a>
                                        @endif
                                </th>
                                    <th scope="row">
                                         <a class="btn btn-success" href=" {{url('admin/category_edit'.$category->id)}} ">  <i class="far fa-edit"></i> </a>
                                         <a class="btn btn-success"href=" {{url('admin/category_destory'.$category->id)}} "> <i class="fas fa-trash-alt"></i> </a>
                                    </th>


                                </tr>
                            @endforeach


                        </tbody>
                      </table>
                    </div>


                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection


@section('category_index')


{{--  <script>


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


</script>  --}}

{{--  <script>
$('#category_statu').on('click',function(){
    var id = 1;
    alert(id)
   $.ajax({
       url:"category_statu"+id,
       type:"GET",
       dataType:"json",
       success:function(res){
           console.log(res);
       }
   })
})
</script>  --}}


@endsection
