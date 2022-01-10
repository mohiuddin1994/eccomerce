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
                
                <div class="col-lg-4">
                        @include('admin.admin_message')
                 </div>
                <div class="row">
                    <div class="col-lg-8">   
                    <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">SL </th> 
                            <th scope="col">role Name </th> 
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 1
                            @endphp
                            @foreach ($userRole as $role) 
                                 <tr>
                                    <th scope="row"> {{$count++}} </th> 
                                    <th scope="row"> {{$role->role_name}} </th> 
                                    <th scope="row"> 
                                         <a class="btn btn-success" href=" {{url('admin/category_edit'.$role->id)}} ">  <i class="far fa-edit"></i> </a> 
                                         <a class="btn btn-success"href=" {{url('admin/category_destory'.$role->id)}} "> <i class="fas fa-trash-alt"></i> </a> 
                                    </th>
                                    
                                     
                                </tr>
                            @endforeach
                         
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-4">
                        <form action=" {{url('admin/role_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="role_name"> Role Name</label>
                                <input id="role_name" class="form-control" type="text" value="{{old('role_name')}} " name="role_name">
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




{{--             
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


