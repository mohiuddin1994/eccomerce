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
                    <li class="breadcrumb-item active">Color</li>
                </ol>
               
                <div class="row">
                  
                    <div class="col-lg-7">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL </th>
                                    <th scope="col">Id</th>
                                    <th scope="col">coupon Name </th>
                                    <th scope="col">Discount </th>
    
    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1
                                @endphp
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <th scope="row"> {{$count++}} </th>
                                    <th scope="row"> {{$coupon->id}} </th>
    
                                    <th scope="row"> {{$coupon->name}} </th>
                                    <th scope="row"> {{$coupon->discount}} % </th>
                                    <th scope="">
                                        @if($coupon->statu == 1)
                                            <a id="color_statu" href="{{url('admin/coupon_statu'.$coupon->id)}}" class="btn btn-success"> Active </a>
                                        @else 
                                        <a id="color_statu" href="{{url('admin/coupon_statu'.$coupon->id)}} " class="btn btn-info"> Unactive </a>
                                        @endif
                                </th>
                                    <th scope="row">
                                        <a class="btn btn-success" href=" {{url('admin/coupon_edit'.$coupon->id)}} ">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-success" href=" {{url('admin/coupon_destroy'.$coupon->id)}} ">
                                            <i class="fas fa-trash-alt"></i> </a>
                                    </th>
    
    
                                </tr>
                                @endforeach
    
    
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/coupon_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Coupon </label>
                                <input id="name" class="form-control" type="text" value="{{old('name')}} "
                                    name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Discount </label>
                                <input id="name" class="form-control" type="text" value="{{old('discount')}} "
                                    name="discount">
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


@section('category_index')


<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        // subcategory ajax 
        $('#parent_category').on('change', function () {

            var id = $(this).val();
            $.ajax({
                url: "subcategory_select" + id,
                dataType: "json",
                type: "GET",
                success: function (res) {
                    $data = " ";

                    $data = $data +
                        '<option value= " "selected disabled >  sub category   </option>'
                    $.each(res, function (key, value) {

                        $data = $data + '<option value= " ' + value.id + ' ">' +
                            value.name + '</option>'

                    })
                    $("#subcategory").html($data);
                }

            })

        })

    });

</script>

<script>
    $('#subcategory').on('change', function () {

        var id = $(this).val();

        $.ajax({
            url: "subSubcategory_select" + id,
            dataType: "json",
            type: "GET",
            success: function (res) {
                $data = " ";

                $data = $data +
                    '<option value= " "selected disabled >  sub sub category   </option>'
                $.each(res, function (key, value) {

                    $data = $data + '<option value= " ' + value.id + ' ">' + value.name +
                        '</option>'

                })
                $("#subSubcategory").html($data);
            }

        })

    })

</script>



@endsection
