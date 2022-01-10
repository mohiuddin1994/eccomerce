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
                    <li class="breadcrumb-item active">Color Edit</li>
                </ol>
                <div class=" text-end ">
                    <a class="btn btn-success" href="{{route('coupon')}} "> All Coupon  </a>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        @include('admin.admin_message')
                        <form action=" {{url('admin/coupon_update'.$coupon->id)}} " method="post">
                            @csrf
                            <div class="form-group">
                                <label for="color_name">Color Name </label>
                                <input id="color_name" class="form-control" type="text" value=" {{$coupon->name}} " name="name">
                            </div> 
                            <div class="form-group">
                                <label for="discount">Discount </label>
                                <input id="color_name" class="form-control" type="text" value=" {{$coupon->discount}} " name="discount">
                            </div> 
                            <input type="submit" class="btn btn-success" value="Update" name="" id="">
                        </form>
                    </div>

                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
