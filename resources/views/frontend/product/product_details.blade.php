@extends('frontend.website.website_layouts')
<!-- @section('style')

<style>
    .width {
        width: 100%;
    }

</style>
@endsection -->

@section('frontend_content')

@include('frontend.website.header')


<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== -->
            @include('frontend.website.sidebar')
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}} ">Home</a> <span class="divider">/</span></li>
                    <li><a href="{{url('/')}} ">Products</a> <span class="divider">/</span></li>
                    <li class="active">product Details</li>
                </ul>
                <div class="row">
                    @include('frontend.website.message')

                    <div id="gallery" id="" class="span3">
                        <a id="image" href="{{asset($product->image)}}" title="Blue Casual T-Shirt">
                            <img src="{{asset($product->image)}}" style="width:100%" alt="Blue Casual T-Shirt" />
                        </a>
                        <div id="differentview" class="moreOptopm carousel slide">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($product->multiImage as $item)
                                    <a href="{{asset($item->image)}}"> <img style="width:29%"
                                            src="{{asset($item->image)}}" alt="" /></a>
                                    @endforeach

                                </div>
                                <div class="item">
                                    @foreach ($product->multiImage as $item)
                                    <a href="{{asset($item->image)}}"> <img style="width:29%"
                                            src="{{asset($item->image)}}" alt="" /></a>
                                    @endforeach
                                </div>
                            </div>

                            <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                             -->
                        </div>

                        <div class="btn-toolbar">
                            <div class="btn-group">
                                <span class="btn"><i class="icon-envelope"></i></span>
                                <span class="btn"><i class="icon-print"></i></span>
                                <span class="btn"><i class="icon-zoom-in"></i></span>
                                <span class="btn"><i class="icon-star"></i></span>
                                <span class="btn"><i class=" icon-thumbs-up"></i></span>
                                <span class="btn"><i class="icon-thumbs-down"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <input type="hidden" value="{{$product->id}} " name="product_id" id="product_id">
                        <h3>{{$product->name}} </h3>

                        <small>- Brand Name</small>
                        <hr class="soft" />
                        <small id="stock">{{$product->stock}} items in stock</small>
                        @if ($product->discount>0)
                        <h4 id="price">Rs. <del> {{$product->price}} </del> >
                            {{$product->price - $product->price*$product->discount/100 }} </h4>
                        @else
                        <h4 id="price">Rs.{{$product->price}}</h4>
                        @endif



                        @if(count($attribute)>0)
                        <form class="form-horizontal qtyFrm" method="post" action="{{url('product_addCart')}}">
                            @csrf
                            <input type="hidden" value="{{$product->id}} " name="product_id" id="product_id">
                            <input type="hidden" value=" " name="cart_price" id="cart_price">
                            <div class="control-group">
                                <select class="span2 pull-left" id="colorId">
                                    <option> color select </option>
                                    @foreach ($attribute as $item)
                                    <option value=" {{$item->color_id}} "> {{$item->color_name}} </option>
                                    @endforeach
                                </select>
                                <select class="span2 pull-left" id="sizeId" name="attribute_id">
                                    <option value=""> size select </option>
                                    @foreach ($product->productAttribute as $item)
                                    <option value="{{$item->size_id}} "> {{$item->size->size_name}} </option>
                                    @endforeach
                                </select>


                                <input type="number" name="quanty" class="span1" placeholder="Qty." />
                                <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i
                                        class=" icon-shopping-cart"></i></button>
                            </div>
                        </form>
                    </div>


                    @else


                    <form class="form-horizontal qtyFrm" method="post" action="{{url('product_addCart')}}">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}" id="product_id">
                        @if ($product->discount>0)
                        <input type="hidden" name="cart_price"
                            value=" {{$product->price - $product->price*$product->discount/100 }}" id="product_id">
                        @else
                        <input type="hidden" name="cart_price" value="{{$product->price}}" id="product_id">
                        @endif

                        <div class="control-group">
                            <input type="number" name="quanty" class="span1" placeholder="Qty." />
                            <button type="submit" class="btn btn-large btn-primary"> Add to cart <i
                                    class=" icon-shopping-cart"></i></button>
                        </div>
                </div>
                </form>
                @endif


                <hr class="soft clr" />
                <p class="span6">
                    {!! $product->description !!}
                </p>
                <a class="btn btn-small pull-right" href="#detail">More Details</a>
                <br class="clr" />
                <a href="#" name="detail"></a>
                <hr class="soft" />
            </div>
        </div>





        <div class="" style="margin-bottom:20px">

            <div>
                <a class="btn btn-success productDetails active "> Product details </a>
                <a class="btn btn-success relatedProduct "> Related Product </a>
            </div>

            <div class="Product_details">
                <table class="table table-bordered">
                    <tbody>
                        <tr class="techSpecRow">
                            <th colspan="2">Product Details</th>
                        </tr>

                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Code:</td>
                            <td class="techSpecTD2">{{$product->pro_code}} </td>
                        </tr>
                        @if($product->discount>0)
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Discount:</td>
                            <td class="techSpecTD2"> {{$product->discount}} %</td>
                        </tr>
                        @else

                        @endif
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">Fabric:</td>
                            <td class="techSpecTD2"> {{$product->fabric}}</td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">sleeve:</td>
                            <td class="techSpecTD2"> {{$product->sleeve}}</td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">occassion:</td>
                            <td class="techSpecTD2"> {{$product->occassion}}</td>
                        </tr>
                        <tr class="techSpecRow">
                            <td class="techSpecTD1">weight:</td>
                            <td class="techSpecTD2"> {{$product->weight}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="related_product">

                <ul class="thumbnails">
                    @foreach ($relatedProduct as $item)
                    <li class="span3">
                        <div class="thumbnail">
                            <a href="product_details.html"><img src="{{$item->image}}" alt="" /></a>
                            <div class="caption">
                                <h5> {{$item->title}} </h5>
                                <p>
                                    {{ substr($item->description,0,30 )}}
                                </p>
                                <form action="{{url('single_productAddCart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{$item->id}} " name="product_id" id="">

                                    <h4 style="text-align:center"><a class="btn"
                                            href=" {{url('product_details'.$item->id)}} "> <i
                                                class="icon-zoom-in"></i></a>
                                        @if(count($item->productAttribute)>0)
                                        <a class="btn" href=" {{url('product_details'.$item->id)}} ">view </a> <br>
                                        @else
                                        <button class="btn" type="submit"> Add to <i class="icon-shopping-cart">
                                            </i></button> <br>
                                        @endif




                                        @if ($item->discount>0)
                                        <a class="btn btn-primary" href="#">Rs. <del> {{$item->price}} </del>
                                            {{$item->price - $item->price*$item->discount/100 }} </a>
                                    </h4>
                                    <input type="hidden"
                                        value="{{$item->price - $item->price*$item->discount/100 }} "
                                        name="cart_price" id="">
                                    @else
                                    <h4> <a class="btn btn-primary" href="#">Rs.{{$item->price}}</a></h4>
                                    <input type="hidden" value="{{$item->price}} " name="cart_price" id="">
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

@section('productDetailsPage')
<script>
    $(document).ready(function () {
        $("#colorId").on('change', function () {
            var colorId = $(this).val();
            var product_id = $("#product_id").val();

            $.ajax({
                url: "get_size",
                type: "GET",
                dataType: "json",
                data: {
                    colorId: colorId,
                    product_id: product_id
                },
                success: function (response) {
                    console.log(response);
                    $data = " ";
                    $data = $data + "<option disable> select size  </option>";
                    $.each(response, function (key, value) {
                        $data = $data + "<option value='" + value.id + "'> " + value
                            .size_name + " </option>";
                    })
                    $("#sizeId").html($data);
                }
            })

        });


    })

</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#sizeId").on('change', function () {
        var id = $(this).val();
        var product_id = $("#product_id").val();
        $.ajax({
            url: "sizeWise",
            method: "GET",
            data: {
                id: id,
                product_id: product_id,
            },
            success: function (response) {
                console.log(response);

                $("#stock").html(" stock " + response.attribute['stock']);
                if (response.discount > 0) {
                    $("#price").html("RS." + "<del>" + response.attribute['actual_price'] +
                        "</del>" + " > " + response.discount_price);
                    $("#cart_price").val(response.discount_price);
                } else {
                    $("#price").html(response.attribute['actual_price']);
                    $("#cart_price").val(response.attribute['actual_price']);
                }
                if (response.attribute['attri_image'] == null) {

                } else {
                    $("#image").html("<img class='width' src=" + response.attribute['attri_image'] +
                        ">");
                }





            }
        })

    });

</script>

<script>
    const Product_details = document.querySelector('.Product_details');
    const productDetailsBtn = document.querySelector('.productDetails');

    const relatedProductBtn = document.querySelector('.relatedProduct');
    const related_product = document.querySelector('.related_product');

    related_product.style.display = "none"

    productDetailsBtn.addEventListener('click', function () {
        Product_details.style.display = "block";
        related_product.style.display = "none";
        productDetailsBtn.classList.add('active');
        relatedProductBtn.classList.remove('active');

    })
    relatedProductBtn.addEventListener('click', function () {
        Product_details.style.display = "none";
        related_product.style.display = "block";
        relatedProductBtn.classList.add('active');
        productDetailsBtn.classList.remove('active');

    })

</script>



@endsection
