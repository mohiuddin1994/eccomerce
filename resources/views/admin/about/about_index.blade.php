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
                    <li class="breadcrumb-item active">About</li>
                </ol>

                <div class="row">

                    <div class="col-lg-7">

                        <form action="{{url('admin/update_about')}} " method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="my-input">Header Title</label>
                                @if ($about->headerTitle != null)
                                <input type="text" name="headerTitle" id="" class="form-control" value="{{$about->headerTitle}} ">
                                @else
                                <input type="text" name="headerTitle" id="" class="form-control" value=" ">
                                @endif
                              
                            </div><br> 

                            <div class="form-group">
                                <label for="my-input">Header Image </label>
                                 <input type="file" name="image" id="image" class="form-control" value=""> 
                                 <img src="{{asset($about->image)}} " alt="">
                                 <input type="hidden" value="{{$about->image}} " name="old_image" id="">
                            </div>
                            <div class="form-group">
                                <label for="my-input">Description</label>
                                @if ($about->description != null)
                                <textarea name="description" id="" class="form-control"> {{substr($about->description, 0 , 10)}};   </textarea>
                                @else
                                <textarea name="description" id="" class="form-control">  </textarea>
                                @endif
                            </div><br>  
                            
                            <div class="form-group">
                                <label for="my-input">Header Image </label>
                                 <input type="file" name="imageOne" id="image" class="form-control" value=""> 
                                 <img src="{{asset($about->imageOne)}} " alt="">
                                 <input type="hidden" value="{{$about->imageOne}} " name="old_imageOne" id="">
                            </div>

                            <div class="form-group">
                                <label for="my-input">Header Image </label>
                                 <input type="file" name="imageTwo" id="image" class="form-control" value=""> 
                                 <img src="{{asset($about->imageTwo)}} " alt="">
                                 <input type="hidden" value="{{$about->imageTwo}} " name="old_imageTwo" id="">
                            </div>

                            <input type="submit" value="update" class="btn btn-success" name="" id="">
                        </form>

                        <h1> Serve </h1>
                        <form action=" {{url('admin/store_serve')}} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="header">Text</label>
                                <input id="header" class="form-control" type="text" name="header">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" class="form-control" type="text" name="price">
                            </div>
                            <div class="form-group">
                                <label for="header">Description</label>
                                <textarea name="description" id="" class="form-control">  </textarea>
                            </div>
                            <div class="form-group">
                                <label for="header">Line One</label>
                                <input id="header" class="form-control" type="text" name="lineOne">
                            </div>
                            <div class="form-group">
                                <label for="header">Line Two</label>
                                <input id="header" class="form-control" type="text" name="lineTwo">
                            </div>
                            <div class="form-group">
                                <label for="header">Line Three</label>
                                <input id="header" class="form-control" type="text" name="lineThree">
                            </div>
                            <div class="form-group">
                                <label for="header">Line Four</label>
                                <input id="header" class="form-control" type="text" name="lineFour">
                            </div>
                            <div class="form-group">
                                <label for="header">Line Five</label>
                                <input id="header" class="form-control" type="text" name="lineFive">
                            </div>
                            <div class="form-group">
                                <label for="header">Line Six</label>
                                <input id="header" class="form-control" type="text" name="lineSix">
                            </div> 
                            <input type="submit" value="save"  name="" id="">
                        </form>

                        <table class=" table ">
                        <tr>
                                <th> Header </th>
                            <th> Price </th>
                            <th> Description </th>
                               
                        </tr>
                        @if(count($serve)>0)
                            @foreach ($serve as $item)
                               <tr>   
                                   <td> {{$item->header }} </td>
                                   <td> {{$item->price}}  </td>
                                   <td> {{$item->description }} </td>
                                </tr> 

                            @endforeach
                        </table>
                        @endif
                         
                    </div> 
                    
                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
