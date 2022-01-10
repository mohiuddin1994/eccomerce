<div class="tab-pane  active" id="blockView">
    <input type="hidden" value="{{$id}} " name="" id="category_id ">
    <ul class="thumbnails ">
        @foreach ($products as $product)
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

                        <h4 style="text-align:center"><a class="btn" href=" {{url('product_details'.$product->id)}} ">
                                <i class="icon-zoom-in"></i></a>

                            <button class="btn" type="submit">Add to <iclass="icon-shopping-cart">
                                    </i></button> <br>

                            @if ($product->discount>0)
                            <a class="btn btn-primary" href="#">Rs. <del> {{$product->price}} </del>
                                {{$product->price - $product->price*$product->discount/100 }} </a>
                        </h4>
                        <input type="hidden" value="{{$product->price - $product->price*$product->discount/100 }} "
                            name="cart_price" id="">
                        @else
                        <h4> <a class="btn btn-primary" href="#">Rs.{{$product->price}}</a></h4>
                        <input type="hidden" value="{{$product->price}} " name="cart_price" id="">
                        @endif
                    </form>
                    {{$product->fabric}},
                    {{$product->sleeve}},
                    {{$product->occassion}}


                </div>
            </div>
        </li>

        @endforeach


    </ul>
    <hr class="soft" />
</div>
