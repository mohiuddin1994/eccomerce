


@php

$session_id = Session::get('session_id');
$categories = App\Models\Category::where('statu',1)->get();
$cart = App\Models\Cart::where('user_ip',request()->ip())->get();
$cartCount = $cart->count();

 $cartItem =  $cart->sum(function($quanty){
  return $quanty->quanty;
});

@endphp

<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="{{url('cart_summery')}} "><img src="{{asset('frontend/themes/images/ico-cart.png')}}" alt="cart"> {{$cartCount}} Items, Quanty {{$cartItem}} </a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        @foreach ($categories as $item)
            <li class=""><a href="{{url('categoryProduct'.$item->id)}}" >{{$item->cat_name}} </a>
            <ul>
                @foreach ($item->subcategory as $item)
                     <li><a href="{{url('subcategoryProduct'.$item->id)}} "><i class="icon-chevron-right"></i><strong>{{$item->sub_name}} </strong></a></li> 
                @endforeach
            </ul>
            
        </li>
           @endforeach
    </ul>
    <br/>

    @if (isset($page_name) && $page_name == "categoryProduct") 

    <div class="well well-small"> 
        <h5> Fabric </h5>
        @foreach ($fabric as $item)
             <div class=" ">
                <input class=" fabric" type="checkbox" name="fabric[]" value="{{ $item }} " id="{{ $item }} "> {{ $item }}  
            </div>
        @endforeach
    </div> 
     <div class="well well-small"> 
        <h5 class=""> Sleeve</h5>
        @foreach ($sleeve as $item)
             <div class="form-check">
                <input class="form-check-input sleeve" type="checkbox" name="sleeve[]" value="{{$item}} " id="{{$item}} "> {{$item}}  
            </div>
        @endforeach
    </div>
   
    <div class="well well-small"> 
        <h5> Occassion</h5>
        @foreach ($occassion as $item)
             <div class="form-check">
                <input class="form-check-input occassion " type="checkbox" name="occassion[]" value="{{$item}}" id="{{$item}} "> {{$item}}  
            </div>
        @endforeach
    </div>
    @endif
  



    @if (isset($page_name) && $page_name == "subcategoryProduct") 

    <div class="well well-small"> 
        <h5> Fabric </h5>
        @foreach ($fabric as $item)
             <div class=" ">
                <input class=" fabric" type="checkbox" name="fabric[]" value="{{ $item }} " id="{{ $item }} "> {{ $item }}  
            </div>
        @endforeach
    </div> 
     <div class="well well-small"> 
        <h5 class=""> Sleeve</h5>
        @foreach ($sleeve as $item)
             <div class="form-check">
                <input class="form-check-input sleeve" type="checkbox" name="sleeve[]" value="{{$item}} " id="{{$item}} "> {{$item}}  
            </div>
        @endforeach
    </div>
   
    <div class="well well-small"> 
        <h5> Occassion</h5>
        @foreach ($occassion as $item)
             <div class="form-check">
                <input class="form-check-input occassion " type="checkbox" name="occassion[]" value="{{$item}}" id="{{$item}} "> {{$item}}  
            </div>
        @endforeach
    </div>
    @endif
  



    <div class="thumbnail">
        <img src="{{asset('frontend/themes/images/payment_methods.png')}}" title="Payment Methods" alt="Payments Methods">
        <div class="caption">
            <h5>Payment Methods</h5>
        </div>
    </div>
</div>

