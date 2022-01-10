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

                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>

                                    <th scope="col">order data </th>
                                    <th scope="col">Invoice No</th>
                                    <th scope="col"> Total Price </th>
                                    <th scope="col"> Total Tax </th>
                                    <th scope="col"> Discount </th>
                                    <th scope="col"> Shipping Charge </th>
                                    <th scope="col"> Total </th>
                                    <th scope="col"> currency </th>
                                    <th scope="col"> Payment Type </th>
                                    <th scope="col"> Order Statu </th>
                                    <th scope="col"> order Details</th>
                                    <th scope="col"> Updata order Statu</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td> {{$order->created_at->format('d-m-Y')}} </td>
                                    <td> {{$order->invoice_no}} </td>

                                    <td>
                                       {{$order->total_price}}

                                    </td>

                                    <td>
                                        {{$order->total_tax}}

                                    </td>

                                    <td>

                                        {{$order->discount}}
                                    </td>

                                    <td>

                                        {{$order->shippingCharge}}
                                    </td>

                                    <td>
                                        {{$order->total}}

                                    </td>
                                    <td> {{$order->currency}} </td>
                                    <td> {{$order->payment_type}} </td>
                                    <td> {{$order->statu}} <br> {{date('D-F-Y / g:i A ',strtotime($order->date))}}  </td>

                                    <td class=" ">
                                         <a href=" {{url('admin/order_details'.$order->id)}} " class="btn btn-danger"> <i class='fas fa-copy'></i> </a>  &nbsp;
                                         @if ($order->statu == "shipped")
                                             <a href=" {{url('admin/create_invoice'.$order->id)}} " class="btn btn-danger"> <i class='fas fa-print'></i> </a>
                                             <a href=" {{url('admin/invoice_download'.$order->id)}} " class="btn btn-danger"> <i class='fas fa-pdf'></i> </a>
                                            @endif

                                    </td>
                                    <td>
                                        <form action="{{url('admin/order_statu_update')}} " method="POST">
                                            @csrf
                                        <select name="updata_statu" id="" class="form-control updata_statu">
                                                <option value="" > select statu </option>
                                                     <option value="accept"
                                                     > Accept </option>

                                                <option value="processing"> Processing </option>
                                                <option value="delivered"> delerived </option>
                                                <option value="shipped"> Shipped </option>
                                            </select>
                                            <input type="hidden" class="order_id" name="order_id" value="{{$order->id}} " id="">
                                            <input type="hidden" class="invoice_no" name="invoice_no" value="{{$order->invoice_no}} " id="">
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </main>
        @include('admin.admin_footer')
    </div>


</div>

@endsection

 @section('order_statu')
     <script>
         $(document).ready(function(){
             $('.updata_statu').on('change',function(){
                 this.form.submit();
             })
         })
     </script>
 @endsection
