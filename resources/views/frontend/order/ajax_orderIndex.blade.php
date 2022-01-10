


@if(Session()->has('coupon'))

<tr>
    <td colspan="6" style="text-align:right">Sub Total:</td>
    <td id="total_price"> Rs. {{$total_Price}} </td>
    <input type="hidden" name="total_price" id="total_price_val" value="{{$total_Price}}">
</tr>

<tr>
    <td colspan="6" style="text-align:right">Total Tax:	</td>
    <td id="total_tax"> Rs.{{ $total_tax }}</td>
    <input type="hidden" name="total_tax" id="total_tax_val" value="{{$total_tax}}">
</tr>

<tr>
    <td colspan="6" style="text-align:right">Discount :	</td>
    <td id="discount"> Rs.{{ $discount}}</td>
    <input type="hidden" name="discount" id="discount_val" value="{{$discount}}">
  </tr>

  <tr id="shippingCost">
      <td colspan="6" style="text-align:right">Shipping charge :	</td>
      <td id="shippingCharge" class="shippingCharge"> Rs .{{$charge}} </td>
      <input type="hidden" name="shippingCharge" id="shippingCharge_val" value="{{$charge}} ">


    </tr>
<tr>
    <td colspan="6" style="text-align:right"><strong>TOTAL = </strong></td>
    <td class="label label-important" style="display:block" id="total"> <strong> RS. {{ $total  }} </strong></td>
    <input type="hidden" name="total" id="total_val" value="{{$total}}">
  </tr>
@else
<tr>
    <td colspan="6" style="text-align:right">Total Price:	</td>
    <td id="total_price"> Rs. {{$total_Price}} </td>
    <input type="hidden" name="total_price" id="total_price_val" value="{{$total_Price}}">
  </tr>
  <tr>
    <td colspan="6" style="text-align:right">Total Tax:	</td>
    <td id="total_tax"> Rs.{{ $total_tax}}</td>
    <input type="hidden" name="total_tax" id="total_tax_val" value="{{$total_tax}}">
  </tr>



  <tr id="shippingCost">
      <td colspan="6" style="text-align:right">Shipping charge :	</td>
      <td id="shippingCharge" class="shippingCharge"> Rs .{{$charge}} </td>
      <input type="hidden" name="shippingCharge" id="shippingCharge_val" value="{{$charge}} ">

    </tr>



  <tr>
    <td colspan="6" style="text-align:right"><strong>TOTAL = </strong></td>
    <td class="label label-important" style="display:block" id="total"> <strong> RS. {{$total}} </strong></td>
    <input type="hidden" name="total" id="total_val" value="{{$total}}">
  </tr>

@endif
