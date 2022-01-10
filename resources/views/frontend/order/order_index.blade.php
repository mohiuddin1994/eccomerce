@php

$session_id = Session::get('session_id');

$cart_menu = App\Models\Cart::where('user_ip',request()->ip())
->join('products','products.id','=','carts.product_id')
->get();
// echo "<pre>"; print_r($cart_menu); die;

    $cartItem = $cart_menu->sum(function($quanty){
        return $quanty->quanty;
        });


@endphp

@extends('frontend.website.website_layouts')
@section('login')
<style>
    form.cmxform label.error,
    label.error {
        /* remove the next line when you have trouble in IE6 with labels in list */
        color: red;
        font-style: italic
    }

</style>
@endsection

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

                <hr class="soft" />

                {{--  new loging   --}}
                <form action="{{url('order_store')}} " method="POST" id=" ">
                    @csrf
                    <div class="row">
                        <div class="span4">
                            <h4 class="mb-3">Billing address</h4>
                            <div class="well">
                                <div class="col-lg-4">
                                    @include('frontend.website.message')
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">Name</label>
                                    <div class="controls">
                                        <input class="span3" type="text" name="name" id="name" placeholder="name"
                                            value=" {{Auth::user()->name}} ">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">E-mail address</label>
                                    <div class="controls">
                                        <input class="span3" type="email" name="email" id="email" placeholder="Email"
                                            value="{{Auth::user()->email}} ">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">Phone</label>
                                    <div class="controls">
                                        <input class="span3" type="text" name="phone" id="phone" placeholder="phone"
                                            value="{{Auth::user()->phone}} ">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">Address</label>
                                    <div class="controls">
                                       <textarea name="address" id="" cols="" rows="2">{{Auth::user()->address}} </textarea>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">Country</label>
                                    <div class="controls">
                                        <select name="country_name" class="form-control" id="country_name">
                                            <option value="" disabled selected >select Country </option>
                                            @foreach($shippingCountry as $country)
                                                <option value="{{$country->country_name}}"> {{$country->country_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">Division</label>
                                    <div class="controls">
                                        <select name="division" class="form-control" id="">
                                            <option value="" disabled selected >select Division </option>
                                            <option value="dakha ">Dakha </option>
                                            <option value="mymensing ">Mymensing </option>
                                            <option value="zosur ">Zosur </option>
                                            <option value="ragshahi ">Ragshahi </option>
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <label class="control-label" for="inputEmail0">City</label>
                                    <div class="controls">
                                        <select name="city" class="form-control" id="">
                                            <option value="" disabled selected >select City </option>
                                            <option value="sherpur ">Sherpur </option>
                                            <option value="jamalpur ">Jamalpur </option>
                                            <option value="nalitabari ">Nalitabari </option>

                                        </select>
                                    </div>
                                </div>
                                <label class="control-label" for="inputEmail0">Zep code</label>
                                <div class="controls">
                                    <input class="span3" type="text" name="zep_code" id="zep_code" placeholder="Zep Code"
                                    value=" ">
                                </div>
                            </div>


                        </div>
                        <br> <br>

                        <div class="span1"> &nbsp;</div>
                        <div class="span4">
                            <div class="well">


                                    <div class="form-check">
                                        <label class="control-label" for="inputEmail0">  Payment Type </label> <br><br>

                                        <input class="form-check-input" type="radio" name="payment_type" id=" " style="margin-top: 0;" value="cash on delivery" checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Cash On Delivery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_type" id=" "  style="margin-top: 0;" value="payple"  >
                                        <label class="form-check-label" for="flexRadioDefault2" >
                                        payple
                                        </label>
                                    </div>

                                     <br> <br>
                                     <div class="form-check">
                                        <label class="control-label" for="inputEmail0">  Currency</label> <br><br>

                                        <input class="form-check-input" type="radio" name="currency" id="bd" style="margin-top: 0;" value="bd"  >
                                        <label class="form-check-label" for="flexRadioDefault1">
                                             BD
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="currency" id="usa"  style="margin-top: 0;" value="usa"  >
                                        <label class="form-check-label" for="flexRadioDefault2" >
                                       USA
                                        </label>
                                    </div>

                                    <br> <br>
                            <table class="table table-bordered order_place">
                                @include('frontend.order.ajax_orderIndex')

                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-block btn-success"> Check Out  </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@endsection


@section('order_index')




<script>

    $(document).ready(function(){
        $('#bd').on('click',function(){
            var currency = $(this).val();
            var charge = $('#shippingCharge_val').val();
            var country = $('#country_name').val(); 
            $.ajax({
                url:"{{url('order_place')}}",
                method:"GET",
                data:{currency:currency,country:country},
                success:function(res){
                    console.log(res);
                    $('.order_place').html(res);


                }
            })



        });

        $('#usa').on('click',function(){
            var currency = $(this).val();
            var charge = $('#shippingCharge_val').val();

            $.ajax({
                url:"{{url('order_place')}}",
                method:"GET",
                data:{currency:currency,charge:charge},
                success:function(res){
                    console.log(res);
                    $('.order_place').html(res);


                }
            })
        });


        $('#shippingCost').hide();

        $('#country_name').on('change',function(){
            var country = $(this).val();

            $.ajax({
                url:"{{url('admin/charge')}}",
                method:"GET",
                data:{country:country},
                success:function(res){
                    console.log(res);
                    $('#shippingCost').show();
                    $('#shippingCharge').html("Rs. " + res.charge);
                    $('#shippingCharge_val').val(res.charge);
                    $('#country').val(res.country_name);


                }
            })
        });

    });




</script>










{{--  <script>

    $(document).ready(function () {
        $('#bd').on('click',function(){
            var currency = $(this).val();
            var charge = $('#shippingCharge_val').val();
            alert(charge);
            $.ajax({
                url:"currency",
                method:"GET",
                data:{currency:currency,charge:charge},
                success:function(res){
                    console.log(res);
                    $('#total_price').html( "RS."+ res.total_price);
                    $('#total_price_val').val(  res.total_price);
                    $('#total_tax').html( "RS."+ res.tax);
                    $('#total_tax_val').val( res.tax);
                    $('#shippingCharge').html("Rs. " + res.charge);

                    if(res.discount){
                        $('#discount').html( "RS."+ res.discount);
                        $('#discount_val').val(  res.discount);
                    }
                    $('#total').html( "RS."+ res.total);
                    $('#total_val').val( res.total);
                }
            })
        })
        $('#usa').on('click',function(){
            var currency = $(this).val();
            var charge = $('#shippingCharge_val').val();
            alert(charge);
            $.ajax({
                url:"usa_currency",
                method:"GET",
                data:{currency:currency,charge:charge},
                success:function(res){
                    console.log(res);

                   $('#total_price').html( "$"+ res.total_price);
                    $('#total_price_val').val( res.total_price);
                    $('#total_tax').html( "$"+ res.tax);
                    $('#total_tax_val').val(  res.tax);
                    $('#shippingCharge').html("$." + res.charge);

                    if(res.discount){
                        $('#discount').html( "$"+ res.discount);
                        $('#discount_val').val(res.discount);
                    }
                    $('#total').html( "$"+ res.total);
                    $('#total_val').val(  res.total);
                }
            })
        })


    $('#shippingCost').hide();

   $('#country').on('change',function(){
            var country = $(this).val();
            var currency = $("#usa").val();
            var currency = $("#bd").val();
            $.ajax({
                url:"admin/get_shippingChearge",
                method:"GET",
                data:{country:country},
                success:function(res){
                    console.log(res);
                    $('#shippingCost').show();
                    $('#shippingCharge').html("Rs. " + res.charge);
                    $('#shippingCharge_val').val(res.charge);


                }
            })
        })


    })

</script>  --}}



@endsection
