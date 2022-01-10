@php
$admin = Auth::user();
$sl = 1;
@endphp
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
            <!-- Sidebar ================================================== -->
            @include('profile.profile_sidbar')
            <!-- Sidebar end=============================================== -->
            <main class="span9"> 
    
                <div class="row d-flex" style="display: flex;">
                         
                  
                    <div class="card col-lg-6" style="width: 48%;margin-right: 20px">
                        <div class=" card-header">
                            <h3> Order </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
    
                                <tbody>
                                    <tr>
                                        <th scope="col">Invoice No</th>  <td> {{$order->invoice_no}} </td>
                                       
    
                                    </tr>
    
                                    <tr>
                                         <th scope="col"> Total Price </th> 
                                        <td>
                                           {{$order->total_price}}
                                          
                                        </td>
                                    </tr>
    
                                     <tr>  
                                         <th scope="col"> Total Tax </th>
                                        <td>
                                            {{$order->total_tax}}
                                          
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> Shipping Charge </th>
                                            <td>
                                               {{$order->shippingCharge}}
                                            </td> 
                                    </tr>
    
                                    <tr>
                                        <th scope="col"> Discount </th>
                                            <td>
                                                @if ($order->discount !=null)
                                                     {{$order->discount}}
                                                @else
                                                    00
                                                @endif
                                              
                                            </td> 
                                    </tr> 
                                   
                                    <tr> 
                                        <th scope="col"> Total </th>
                                        
                                           <td> {{$order->total}}   </td>
                                           
                                    </tr>
                                    
                                       <tr> <th scope="col"> Currency </th> <td> {{$order->currency}} </td> </tr>
                                     <tr>  <th scope="col"> Payment Type </th>   <td> {{$order->payment_type}} </td>     </tr>
    
                               
    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card col-lg-6 " style="width: 48% ;margin-left: 20px">
                        <div class=" card-header">
                            <h3>Shipping Address </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                               
                                <tbody>
    
                                    <tr> <th scope="col">Name </th>   <td> {{$shipping->name}} </td>  </tr>
                                       
                                       
                                    <tr> <th scope="col"> Email </th>    <td> {{$shipping->email}} </td >    </tr>
                                        
                                    <tr><th scope="col"> Phone </th>  <td> {{$shipping->phone}} </td>  </tr>
                                    <tr>  <th scope="col">Address</th> <td> {{$shipping->address}} </td>    </tr>
                                    <tr>  <th scope="col"> Country </th>   <td> {{$shipping->country}} </td>  </tr>
                                     <tr> <th scope="col"> Division </th>  <td> {{$shipping->division}}  </td>  </tr>
                                     <tr> <th scope="col"> city  </th>  <td> {{$shipping->city}} </td>   </tr>
                                    <tr> <th scope="col"> Zip Code  </th>   <td>   {{$shipping->zep_code}} </td>   </tr>
    
    
                                    
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>


                <div class="card col mt-4">
                    <div class="card-header">
                        <h3> Order Items</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>quanty </th>
    
                                </tr>
                            </thead>
                            <div id="cartFilter">
    
                                <tbody>
                                    @foreach ($order_items as $item)
    
    
                                    <tr>
                                        <td>
                                            @if ($item->attri_image)
                                                @if($item->attri_image !=null)
                                                <img width="60" src="{{asset($item->attri_image)}} " alt="" />
                                                @else
                                                <img width="60" src="{{asset($item->image)}}" alt="" />
                                                @endif
                                            @else
                                            <img width="60" src="{{asset($item->image)}} " alt="" />
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
    
                                            @if($order->currency =='usa')
                                            $ {{ $item->price}}
                                            @else
                                            DB {{ $item->price}}
                                            @endif
    
                                        </td>
                                        <td> {{ $item->quanty}} </td>
    
    
                                    </tr>
                                    @endforeach
                                </tbody>
                            </div>
                        </table>
    
                    </div>
                </div> 
            </main>
        </div>
    </div>
</div>

<!-- Footer ================================================================== -->

@endsection
