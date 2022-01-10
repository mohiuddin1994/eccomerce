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
            <div class="span9">
                @if (count($orders)>0)


                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> SL </th>
                                    <th scope="col">Order date No</th>
                                    <th scope="col">Invoice No</th>
                                    <th scope="col"> Total Price </th>
                                    <th scope="col"> Total Tax </th>
                                    <th scope="col"> Discount </th>
                                    <th scope="col"> Shipping Chage </th>
                                    <th scope="col"> Total </th>
                                    <th scope="col"> currency </th>
                                    <th scope="col"> Payment Type </th>
                                    <th scope="col"> Order Statu </th>
                                    <th scope="col"> order Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td> {{$sl++}} </td>
                                    <td> {{$order->created_at->format('F-M-Y')}} </td>
                                    <td> {{$order->invoice_no}} </td>

                                    <td>
                                        @if($order->currency =='usa')
                                        $ {{$order->total_price}}
                                        @else
                                        DB {{$order->total_price}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($order->currency =='usa')
                                        $ {{$order->total_tax}}
                                        @else
                                        DB {{$order->total_tax}}
                                        @endif
                                    </td>

                                    <td>
                                        @if($order->discount != null)
                                                @if($order->currency =='usa')
                                                $ {{$order->discount}}
                                                @else
                                                DB {{$order->discount}}
                                                @endif
                                        @else

                                        @endif
                                    </td>
                                    <td>
                                        @if($order->shippingCharge != null)
                                                @if($order->currency =='usa')
                                                $ {{$order->shippingCharge}}
                                                @else
                                                DB {{$order->shippingCharge}}
                                                @endif
                                        @else

                                        @endif
                                    </td>

                                    <td>
                                        @if($order->currency =='usa')
                                        $ {{$order->total}}
                                        @else
                                        DB {{$order->total}}
                                        @endif

                                    </td>
                                    <td> {{$order->currency}} </td>
                                    <td> {{$order->payment_type}} </td>
                                    <td> {{$order->statu}} <br> {{date('D-F-Y ( g:i A ) ',strtotime($order->date))}} </td>
                                    <td>  <a href=" {{url('order_details'.$order->id)}} " class="btn btn-danger"> <i class='fas fa-copy'></i> </a> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


                @else
                <h1> no orders </h1>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Footer ================================================================== -->

@endsection
