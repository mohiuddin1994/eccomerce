@extends('admin.admin_layouts')
@section('admin_content')


@include('admin.admin_header')

<div id="layoutSidenav" style="padding-right: 15px;">

    @include('admin.admin_sidebar')

    <div id="layoutSidenav_content">

        <main>
            <div class="container-fluid px-4">

                <h1 class="mt-4"> Compnay Setting </h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active"> </li>
                </ol>

                <form action="{{ url('admin/setting_update')}} " method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.admin_message')
                    <div class="row">
                        <div class="col-lg-5 m-auto ">
                            <div class="form-group">
                                <label for="image"> Image </label>
                                <input id="image" class="form-control" type="file" name="image"><br>
                                <img src="{{asset($setting->company_logo)}}" height="120px" alt="">
                                <input id="old_image" class="form-control" type="hidden" value="{{$setting->company_logo}} "
                                    name="old_image">
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="company_name"
                                    value=" {{$setting->company_name}} ">
                            </div>
                           
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="company_email"
                                    value="{{$setting->company_email}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input id="phone" class="form-control" type="text" name="company_phone"
                                    value="{{$setting->company_phone}} ">

                            </div>
                            <div class="form-group">
                                <label for="email">Address </label>
                                <textarea id=" " class="summernote"
                                    name="company_address">{{$setting->company_address}}  </textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Description </label>
                                <textarea class="summernote"
                                    name="company_description"> {{$setting->company_description}}  </textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Copy Text </label>
                                <textarea class="summernote"
                                    name="copy_text"> {{$setting->copy_text}}  </textarea>
                            </div>
                        </div>
                        <div class="col-lg-5 m-auto">

                            <div >
                                @if ($setting->facebook_link==null)
                                @else
                                <a href="{{$setting->facebook_link}} "target="_blank" class="mr-2" style="text-decoration: none;">  @php     echo $setting->facebook_icon @endphp  </a> 
                                @endif

                                @if ($setting->twiter_link==null)
                                @else
                                <a href="{{$setting->twiter_link}}"  class="mr-2" style="text-decoration: none;" target="_blank">  @php     echo $setting->twiter_icon @endphp  </a> 
                                @endif

                                @if ($setting->youtube_link==null)
                                @else
                                <a href="{{$setting->youtube_link}} " target="_blank" class="mr-2" style="text-decoration: none;">  @php     echo $setting->youtube_icon @endphp  </a> 
                                @endif

                                @if ($setting->linkdin_link==null)
                                @else
                                <a href="{{$setting->linkdin_link}} " target="_blank" class="mr-2" style="text-decoration: none;">  @php     echo $setting->linkdin_icon @endphp  </a> 
                                @endif

                                @if ($setting->instagram_link==null)
                                @else
                                <a href="{{$setting->instagram_link}}" target="_blank" class="mr-2" style="text-decoration: none;"> @php echo $setting->instagram_icon @endphp  </a> 
                                @endif
                                   
                                    
                            </div>

                            <div class="form-group">
                                <label for="name">Copmany link</label>
                                <input id="name" class="form-control" type="text" name="company_link"
                                    value=" {{$setting->company_link}} ">
                            </div>
                            <div class="form-group">
                                <label for="phone">Facebook Icon</label>
                                <input id="phone" class="form-control" type="text" name="facebook_icon"
                                    value="{{$setting->facebook_icon}} ">
                                   

                            </div>
                            <div class="form-group">
                                <label for="phone">Facebook link</label>
                                <input id="phone" class="form-control" type="text" name="facebook_link"
                                    value="{{$setting->facebook_link}} ">

                            </div><div class="form-group">
                                <label for="phone">Twite Icon</label>
                                <input id="phone" class="form-control" type="text" name="twiter_icon"
                                    value="{{$setting->twiter_icon}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Twite Link</label>
                                <input id="phone" class="form-control" type="text" name="twiter_link"
                                    value="{{$setting->twiter_link}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Youtube Icon</label>
                                <input id="phone" class="form-control" type="text" name="youtube_icon"
                                    value="{{$setting->youtube_icon}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Youtube Link</label>
                                <input id="phone" class="form-control" type="text" name="youtube_link"
                                    value="{{$setting->youtube_link}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone"> Linkdin Icon</label>
                                <input id="phone" class="form-control" type="text" name="linkdin_icon"
                                    value="{{$setting->linkdin_icon}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Linkdin Link </label>
                                <input id="phone" class="form-control" type="text" name="linkdin_link"
                                    value="{{$setting->linkdin_link}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Instagram Icon </label>
                                <input id="phone" class="form-control" type="text" name="instagram_icon"
                                    value="{{$setting->instagram_icon}} ">

                            </div>
                            <div class="form-group">
                                <label for="phone">Instagram Link </label>
                                <input id="phone" class="form-control" type="text" name="instagram_link"
                                    value="{{$setting->instagram_link}} ">

                            </div>
                           
                            

                            <div class="form-group">

                                <input id="my-input" value="Update" class="btn btn-success" type="submit" name="">
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </main>



        @include('admin.admin_footer')
    </div>


</div>

@endsection
