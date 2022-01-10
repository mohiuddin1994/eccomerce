@extends('admin.admin_layouts')
@section('admin_content')


@include('admin.admin_header')

<div id="layoutSidenav" style="padding-right: 15px;">

    @include('admin.admin_sidebar')

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <h1 class="mt-4">Orders</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Orders</li>
                </ol>




                <div class="row">


                    <div class="card col-lg-6">
                        <strong> order date </strong> <span> {{$order->created_at->format("F-M-Y / h:i:A")}} </span>
                        <div class=" card-header">
                            <h3> Order </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">

                                <tbody>
                                    <tr>
                                        <th scope="col">Invoice No</th>
                                        <td> {{$order->invoice_no}} </td>


                                    </tr>

                                    <tr>
                                        <th scope="col"> Total Price </th>
                                        <td>
                                            @if($order->currency =='usa')
                                            $ {{$order->total_price}}
                                            @else
                                            DB {{$order->total_price}}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="col"> Total Tax </th>
                                        <td>
                                            @if($order->currency =='usa')
                                            $ {{$order->total_tax}}
                                            @else
                                            DB {{$order->total_tax}}
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="col"> Total </th>
                                        <td>
                                            @if($order->currency =='usa')
                                            $ {{$order->shippingCharge}}
                                            @else
                                            DB {{$order->shippingCharge}}
                                            @endif

                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="col"> Discount </th>
                                        <td>
                                            @if($order->discount != null)
                                                @if($order->currency =='usa')
                                                $ {{$order->discount}}
                                                @else
                                                DB {{$order->discount}}
                                                @endif
                                            @else

                                            @endif
                                        <td>
                                    </tr>

                                    <tr>
                                        <th scope="col"> Total </th>
                                        <td>
                                            @if($order->currency =='usa')
                                            $ {{$order->total}}
                                            @else
                                            DB {{$order->total}}
                                            @endif

                                        </td>

                                    </tr>

                                    <tr>
                                        <th scope="col"> Currency </th>
                                        <td> {{$order->currency}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> Payment Type </th>
                                        <td> {{$order->payment_type}} </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card col-lg-6 ">
                        @if($order_log !=null)
                        <strong> {{$order->statu}} </strong> <span>
                            {{date("F-M-Y / h:i:A",strtotime($order_log->date))}} </span>
                        @endif

                        <div class=" card-header">
                            <h3>Shipping Address </h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">

                                <tbody>

                                    <tr>
                                        <th scope="col">Name </th>
                                        <td> {{$shipping->name}} </td>
                                    </tr>


                                    <tr>
                                        <th scope="col"> Email </th>
                                        <td> {{$shipping->email}} </td>
                                    </tr>

                                    <tr>
                                        <th scope="col"> Phone </th>
                                        <td> {{$shipping->phone}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col">Address</th>
                                        <td> {{$shipping->address}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> Country </th>
                                        <td> {{$shipping->country}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> Division </th>
                                        <td> {{$shipping->division}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> city </th>
                                        <td> {{$shipping->city}} </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"> Zip Code </th>
                                        <td> {{$shipping->zep_code}} </td>
                                    </tr>




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




            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection
