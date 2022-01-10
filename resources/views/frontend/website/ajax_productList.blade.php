 
@extends('frontend.website.website_layouts')
@section('frontend_content')

@include('frontend.website.header')

<!-- Header End====================================================================== -->
 
    
    <div id="mainBody">
        <div class="container">
            <div class="row">
                <!-- Sidebar ================================================== -->
                @include('frontend.website.sidebar')
                <!-- Sidebar end=============================================== -->
                <div class="span9">
                    <div class="col-lg-4">
                        @include('frontend.website.message')
                    </div>
                    <ul class="thumbnails ajaxSearchProduct " id="">
                        @if(count($product_latast)>0)
                        @foreach ($product_latast as $product)
                        <li class="span3">
                            <div class="thumbnail">
                                <a href="{{url('product_details'.$product->id)}} "><img src="{{$product->image}} "
                                        alt="" /></a>
                                <div class="caption">
                                    <h5> {{$product->name}} </h5>
                                    <p>
                                        {!! $product->description !!}
                                    </p>

                                    <h4 style="text-align:center"><a class="btn"
                                            href=" {{url('product_details'.$product->id)}} "> <i
                                                class="icon-zoom-in"></i></a> <a class="btn"
                                            href="{{url('single_productAddCart'.$product->id)}} ">Add to <i
                                                class="icon-shopping-cart"></i></a> <a class="btn btn-primary"
                                            href="#">Rs.{{$product->price}}</a></h4>
                                </div>
                            </div>
                        </li>
                        @endforeach 

                        @else
                            <h1> NO product  </h1>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
 
<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@endsection

