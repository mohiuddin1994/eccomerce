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
                    <div class="col-lg-7">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col">SL </th>
                                    <th scope="col">Role Name </th>
                                    <th scope="col">permission Name </th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $count = 1
                                @endphp

                                @csrf
                                @foreach ($roleWisePermission as $item)
                                <tr>
                                    <th scope="row"> {{$count++}} </th>
                                    <th scope="row"> {{$item->role_name}} </th>
                                    <th scope="row"> {{$item->permission_name}} </th>
                                    <th scope="row">
                                        <a class="btn btn-success" href=" {{url('admin/category_edit'.$item->id)}} "> <i
                                                class="far fa-edit"></i> </a>
                                        <a class="btn btn-success" href=" {{url('admin/category_destory'.$item->id)}} ">
                                            <i class="fas fa-trash-alt"></i> </a>

                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-5 " id="">


                        <form action=" {{url('admin/userWisePermission_store')}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="role_name">Role Name </label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="" disabled selected> Select User</option>
                                    @foreach ($userRole as $item)
                                    <option value="{{$item->id}}"> {{$item->role_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="permission_id"> Rermission Name </label> <br>
                                        @foreach ($permission as $item)
                                        <input type="checkbox" name="permission_id[]" id="permission"
                                            value="{{$item->id}} " class="mr-2"> {{$item->permission_name}} <br>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-6 permission_name">
                                    @if(isset($_GET['role_id'])) 
                                         @include('admin.user.roleWisePermission.ajax_roleWisePermission') 
                                   @endif
                                </div>
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

@section('permission')
<script>
    $(document).ready(function () {
        $("#role_id").on('change', function () {
            var role_id = $(this).val();
            
            $.ajax({
                url: "{{route('role_wise_permission')}}",
                method: "GET",
                data: {
                    role_id: role_id
                },
                success: function (data) {
                    console.log(data);
                    $('.permission_name').html(data);

                }
            });
        });
    })

</script>

@endsection
