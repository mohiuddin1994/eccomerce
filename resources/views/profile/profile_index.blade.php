
@extends('profile.profile_layouts')
@section('profile')
<style>
    #profile input,
    textarea {
        width: 50%;
        padding: 11px 0px 11px 15px;
        
        
    }

</style>
@endsection
@section('profile_content')

@include('frontend.website.header')

<!-- Header End====================================================================== -->


<div id="mainBody">
    <div class="container">

        <div class="row">
            <form action="{{ url('admin/user_update'.$admin->id)}} " method="post" id="profile"
                enctype="multipart/form-data">
                @csrf
                <!-- Sidebar ================================================== -->
                @include('profile.profile_sidbar')
                <!-- Sidebar end=============================================== -->
                <div class="span9">

                    <h4>Latest Products </h4>
                    <div class="col-lg-4">
                        @include('frontend.website.message')
                    </div>


                    <div class="form-group">
                        <label for="name">Name</label> <br>
                        <input id="name" class="form-control" type="text" name="name" value="{{$admin->name}} ">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label> <br>
                        <input id="email" class="form-control" type="email" name="email" value="{{$admin->email}} ">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label><br>
                        <input id="phone" class="form-control" type="text" name="phone" value="{{$admin->phone}} ">
                    </div>

                    <div class="form-group">
                        <label for="email">Address </label><br>
                        <textarea id=" " class="form-control" name="address">{{$admin->address}}  </textarea>
                    </div>

                    <div class="form-group">
                        <label for="old_password"> Old Password </label><br>
                        <input id="old_password" class="form-control" type="text" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password </label><br>
                        <input id="new_password" class="form-control" type="text " name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="con_password"> Confirm Password </label><br>
                        <input id="con_password" class="form-control" type="text" name="con_password">
                    </div>
                    {{--  <div class="form-group">
                        <label for="image"> Image </label><br>
                        <input id="image" class="form-control" type="file" name="image"><br>
                        <img src="{{asset($admin->image)}}" alt="" style="height: 200px">
                        <input id="old_image" class="form-control" type="hidden" value="{{$admin->image}} "
                            name="old_image">
                    </div>  --}}
                    <div class="form-group">
                        <label for="description">Description </label><br>
                        <textarea class="summernote" name="description"> {{$admin->description}}  </textarea>
                    </div>
                    <div class="form-group">

                        <input id="my-input" value="Update" class="btn btn-success" type="submit" name="" style="margin-bottom: 50px">
                    </div>


                </div>
            </form>

        </div>




    </div>
</div>

<!-- Footer ================================================================== -->

@endsection
