@extends('frontend.website.website_layouts')
@section('frontend_content')

@include('frontend.website.header')

<!-- Header End====================================================================== -->

<div id="carouselBlk">
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <a href="#"><img style="width:100%" src="{{asset('frontend/themes/images/carousel/1.png')}}"
                            alt="special offers" /></a>
                    <div class="carousel-caption">
                        <h4>First Thumbnail label</h4>
                        <p>Banner text</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="register.html"><img style="width:100%"
                            src="{{asset('frontend/themes/images/carousel/2.png')}}" alt="" /></a>
                    <div class="carousel-caption">
                        <h4>Second Thumbnail label</h4>
                        <p>Banner text</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="register.html"><img src="{{asset('frontend/themes/images/carousel/3.png')}}" alt="" /></a>
                    <div class="carousel-caption">
                        <h4>Third Thumbnail label</h4>
                        <p>Banner text</p>
                    </div>

                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>
<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            @include('frontend.website.sidebar')
            <!-- Sidebar end=============================================== -->
            <div class="span9">

                <h4>Latest Products </h4>
                <div class="col-lg-4">
                    @include('frontend.website.message')
                </div>
                <ul class="thumbnails ajaxSearchProduct " id="">

                    @foreach ($product_latast as $product)

                    <li class="span3">
                        <div class="thumbnail">
                            <a href="{{url('product_details'.$product->id)}} ">

                                <img src="{{$product->image}} " height="180px" alt="" />

                            </a>
                            <div class="caption">


                                <h5> {{$product->name}} </h5>
                                <p>
                                    {{ substr($product->description,0,30 )}}
                                </p>

                                <form action="{{url('single_productAddCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$product->id}} " name="product_id" id="">

                                <h4 style="text-align:center"><a class="btn"
                                        href=" {{url('product_details'.$product->id)}} "> <i
                                            class="icon-zoom-in"></i></a>

                                        <button class="btn" type="submit"> Add to <i class="icon-shopping-cart">
                                                </i></button> <br>

                                    @if ($product->discount>0)
                                    <a class="btn btn-primary" href="#">Rs. <del> {{$product->price}} </del>
                                        {{$product->price - $product->price*$product->discount/100 }} </a>
                                </h4>
                                <input type="hidden"
                                    value="{{$product->price - $product->price*$product->discount/100 }} "
                                    name="cart_price" id="">
                                @else
                                <h4> <a class="btn btn-primary" href="#">Rs.{{$product->price}}</a></h4>
                                <input type="hidden" value="{{$product->price}} " name="cart_price" id="">
                                @endif
                        </form>


                            </div>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@endsection
