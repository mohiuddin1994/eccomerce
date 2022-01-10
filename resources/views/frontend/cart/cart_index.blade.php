        @php

        $session_id = Session::get('session_id');

        $cart_menu = App\Models\Cart::where('user_ip',request()->ip())
        ->join('products','products.id','=','carts.product_id') 
        ->get();
              // echo "<pre>"; print_r($cart_menu); die;
        $cartItem = $cart_menu->sum(function($quanty){
        return $quanty->quanty;
        });

        $total_Price = $cart_menu->sum(function($carts){
        return $carts->cart_price *$carts->quanty ;
        });

        $total_tex = $cart_menu->sum(function($carts){
            return $carts->cart_price  * 10/100  ;
            });
        

             
        @endphp

@extends('frontend.website.website_layouts')
@section('style')
{{-- ajax image width  --}}
<style>
    .width {
        width: 100%;
    }

</style>
@endsection
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
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active"> SHOPPING CART</li>
                </ul>
                <h3> SHOPPING CART [ <small> {{count($cart)}} Items, Quanty( {{$cartItem}} ) </small>]<a
                        href="{{url('/')}}" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue
                        Shopping </a></h3>
                <hr class="soft" />
                <table class="table table-bordered">
                    <tr>
                        <th> I AM ALREADY REGISTERED </th>
                    </tr>
                    <tr>
                        <td>
                            <form class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label" for="inputUsername">Username</label>
                                    <div class="controls">
                                        <input type="text" id="inputUsername" placeholder="Username">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword1">Password</label>
                                    <div class="controls">
                                        <input type="password" id="inputPassword1" placeholder="Password">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Sign in</button> OR <a href="register.html"
                                            class="btn">Register Now!</a>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <a href="forgetpass.html" style="text-decoration:underline">Forgot password
                                            ?</a>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
                <div class="col-lg-4">
                    @include('frontend.website.message')
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Quantity/Update</th>
                            <th>Price</th>
                            <th>Quanty Price</th>
                            <th>Tax</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <div id="cartFilter">

                        <tbody>
                            @foreach ($cart as $item)

                           
                            <tr>
                                <td>
                                    @if ($item->attri_image)
                                        @if($item->attri_image !=null)
                                            <img width="60" src="{{$item->attri_image}} " alt="" />
                                        @else
                                            <img width="60" src="{{$item->image}} " alt="" />
                                        @endif
                                    @else
                                        <img width="60" src="{{$item->image}} " alt="" />
                                    @endif


                                </td>
                                <td> {{$item->occassion}} {{$item->name}} <br />
                                    @if ($item->color_name)
                                    {{$item->color_name}}
                                    @endif

                                    @if ($item->size_name)
                                    {{$item->size_name}}
                                    @endif

                                </td>
                                <td>
                                    <div class="input-append">
                                        <input class="span1" style="max-width:34px;height:25px" placeholder=""
                                            value="{{$item->quanty}} " id="appendedInputButtons" size="16" type="text">

                                        <a class="btn " id="cart_minus" onclick="myFunction()"
                                            href="{{url('decrement_qunaty'.$item->id)}}"><i class="icon-minus"></i></a>
                                        <a class="btn" id="cart_pluse" href="{{url('increment_qunaty'.$item->id)}}"><i
                                                class="icon-plus"></i></a>
                                        <a class="btn btn-danger" href="{{url('delete_cartitem'.$item->id)}}"><i
                                                class="icon-remove icon-white"></i></a>
                                    </div>
                                </td>
                                <td> {{$item->cart_price}} </td>

                                <td> Rs.{{ $productPrice = $item->cart_price * $item->quanty }} </td>

                                <td>Rs.{{$tax =$productPrice * 10/100 }} </td>
                                <td>Rs.{{$productPrice }} </td>
                            </tr>
                            @endforeach

                           

                              @if(Session()->has('coupon'))
                                
                              <tr>
                                <td colspan="6" style="text-align:right">Coupon Name	</td>
                                <td> Rs. {{ Session()->get('coupon')['coupon_name']}} <a href="{{url('admin/coupon_remove')}} "> <i class="far fa-times-circle"></i> </a> </td>
                                
                            </tr>
                                <tr>
                                    <td colspan="6" style="text-align:right">Sub Total:	</td>
                                    <td> Rs. {{$total_Price}} </td>
                                  
                                </tr>
                                
                                <tr>
                                    <td colspan="6" style="text-align:right">Total Tax:	</td>
                                    <td> Rs.{{ $total_tax = $total_Price * 10/100}}</td>
                                </tr>

                                <tr>
                                    <td colspan="6" style="text-align:right">Discount :	</td>
                                    <td> Rs.{{ $discount = $total_Price * Session()->get('coupon')['coupon_discount'] /100}}</td>
                                </tr>

                                <tr>
                                    <td colspan="6" style="text-align:right"><strong>TOTAL = </strong></td>
                                    <td class="label label-important" style="display:block"> <strong> RS. {{$total_Price +$total_tax - $discount }} </strong></td>
                                </tr>
                             @else
                                 <tr>
                                    <td colspan="6" style="text-align:right">Total Price:	</td>
                                    <td> Rs. {{$total_Price}} </td>
                                  </tr> 
                                   <tr>
                                    <td colspan="6" style="text-align:right">Total Tax:	</td>
                                    <td> Rs.{{ $total_tax = $total_Price * 10/100}}</td>
                                  </tr>
    
                                   <tr>
                                    <td colspan="6" style="text-align:right"><strong>TOTAL = </strong></td>
                                    <td class="label label-important" style="display:block"> <strong> RS. {{$total_Price +$total_tax }} </strong></td>
                                  </tr>

                             @endif 
                               
                        </tbody>
                    </div>
                </table>


          @if(Session()->has('coupon')) 
              
          @else 
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                <form class="form-horizontal" action="{{url('admin/coupon_aplied')}} " method="post">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label"><strong> VOUCHERS CODE: </strong> </label>
                                        <div class="controls">
                                            <input type="text" style="height:30px " name="name" class="input-medium "
                                                placeholder="CODE">
                                            <button type="submit" class="btn"> ADD </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>

                    </tbody>
                </table>
                @endif
                {{--  <table class="table table-bordered">
                         <tr><th>ESTIMATE YOUR SHIPPING </th></tr>
                         <tr> 
                         <td>
                            <form class="form-horizontal">
                              <div class="control-group">
                                <label class="control-label" for="inputCountry">Country </label>
                                <div class="controls">
                                  <input type="text" id="inputCountry" placeholder="Country">
                                </div>
                              </div>
                              <div class="control-group">
                                <label class="control-label" for="inputPost">Post Code/ Zipcode </label>
                                <div class="controls">
                                  <input type="text" id="inputPost" placeholder="Postcode">
                                </div>
                              </div>
                              <div class="control-group">
                                <div class="controls">
                                  <button type="submit" class="btn">ESTIMATE </button>
                                </div>
                              </div>
                            </form>				  
                          </td>
                          </tr>
                        </table>   --}}

                <a href="{{url('/')}} " class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
                <a href="{{url('order_place')}} " class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>

            </div>
        </div>
    </div>
</div>
<!-- MainBody End ============================= -->
</div>
</div>
</div>

<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@section('cartPage')
<script>

</script>
@endsection
