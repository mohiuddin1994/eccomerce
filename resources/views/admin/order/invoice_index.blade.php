
 
 @extends('admin.admin_layouts')
 @section('admin_content')
 
 
 @include('admin.admin_header')
 
 <div id="layoutSidenav" style="padding-right: 15px;">
 
     @include('admin.admin_sidebar')
 
     <div id="layoutSidenav_content">
         <main>
             <div class="container-fluid px-4">
 
                 <h1 class="mt-4">Order invoice <?php echo DNS1D::getBarcodeHTML( $order->id.time(), 'PHARMA2T'); ?> </h1>
                  
 
                 <div class="row">
 
 
                     <div class="card col-lg-6">
                         <strong> order date </strong> <span> {{$order->created_at->format("F-M-Y / h:i:A")}} </span>
                         <div class=" card-header">
                             <h3> Billing address </h3>
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
                         <h3> Order Items  And Price </h3>
                     </div>
                     <div class="card-body">
                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>Product Name</th>
                                     <th>Price</th>
                                     <th>quanty </th>
                                     <th>  Total  </th>
 
                                 </tr>
                             </thead>
                             <div id="cartFilter">
 
                                 <tbody>
                                 <tr>   
                                     @foreach ($order_items as $item)
 
 
                                    
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
                                             $ = {{ $item->price}}
                                             @else
                                             DB = {{ $item->price}}
                                             @endif
 
                                         </td>
                                         <td> {{ $item->quanty}} </td>
                                         <td>
 
                                            @if($order->currency =='usa')
                                            $ = {{ $item->price * $item->quanty }}
                                            @else
                                            DB =  {{ $item->price *$item->quanty}}
                                            @endif

                                        </td> 
                                     </tr>
                                     @endforeach
                                     <tr> 
                                         <th colspan="3" style="text-align: right"> Sub Total </th>
                                         <th colspan="3" style="text-align: ">
                                            @if($order->currency =='usa')
                                            $ =  {{$order->total_price}}
                                            @else
                                            DB =  {{$order->total_price}}
                                            @endif
                                           
                                        
                                         </th>
                                     </tr>
                                     <tr> 
                                        <th colspan="3" style="text-align: right"> total tax </th>
                                        <th colspan="3" style="text-align: ">
                                           @if($order->currency =='usa')
                                           $ =  {{$order->total_tax}}
                                           @else
                                           DB =  {{$order->total_tax}}
                                           @endif
                                          
                                       
                                       </th>
                                    </tr>
                                    @if ($order->discount != null)
                                        <tr> 
                                        <th colspan="3" style="text-align: right"> total discount </th>
                                        <th colspan="3" style="text-align: ">
                                           @if($order->currency =='usa')
                                           $ =  {{$order->discount}}
                                           @else
                                           DB =  {{$order->discount}}
                                           @endif
                                          
                                       
                                       </th>
                                    </tr>   
                                    @else
                                      
                                    @endif
                                   
                                    <tr> 
                                        <th colspan="3" style="text-align: right"> Total Pay  </th>
                                        <th colspan="3" style="text-align: ">
                                           @if($order->currency =='usa')
                                           $ =  {{$order->total}}
                                           @else
                                           DB =  {{$order->total}}
                                           @endif
                                          
                                       
                                       </th>
                                    </tr>

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
 