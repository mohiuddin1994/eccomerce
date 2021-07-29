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
                    <div class="text-end">
                        <a class="btn btn-success" href="{{route('size')}} ">All Size </a>
                    </div>
                    <div class="col-lg-7">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SL </th>
                                    <th scope="col">Id</th>
                                    <th scope="col">Color Name </th>
    
    
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1
                                @endphp
                                @foreach ($colors as $color)
                                <tr>
                                    <th scope="row"> {{$count++}} </th>
                                    <th scope="row"> {{$color->id}} </th>
    
                                    <th scope="row"> {{$color->color_name}} </th>
    
                                    <th scope="row">
                                        <a class="btn btn-success" href=" {{url('admin/color_edit'.$color->id)}} ">
                                            edit
                                        </a>
                                        <a class="btn btn-success" href=" {{url('admin/color_destroy'.$color->id)}} ">
                                            delete </a>
                                    </th>
    
    
                                </tr>
                                @endforeach
    
    
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/color_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="color_name">Color Name and Size </label>
                                <input id="color_name" class="form-control" type="text" value="{{old('color_name')}} "
                                    name="color_name">
                            </div>
                            <div class="form-group">
                                <label for="color_id"> Select Color  </label>
                                <select name="color_id" id="color_id" class="form-control">
                                    <option value="" selected disabled> Select color</option>
                                    @foreach ($colors as $color)
                                        <option value="{{$color->id}} "> {{$color->color_name}}</option>
                                        @foreach ($color->size as $size)
                                            <option value="{{$size->id}} "disabled > =={{$size->size_name}}</option> 
                                         @endforeach
                                    @endforeach
                                </select>
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
