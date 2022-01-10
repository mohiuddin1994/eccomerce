


<tbody>
    @foreach ($cart as $item)
       <tr>
            <td> 
            @if ($item->attribute)
                @if($item->attribute->image !=null)
                    <img width="60" src="{{$item->attribute->image}} " alt="" />
                @else 
                    <img width="60" src="{{$item->product->image}} " alt="" />
                @endif
            @else
            <img width="60" src="{{$item->product->image}} " alt="" />
            @endif
            
                
            </td>
        <td> {{$item->product->occassion}} {{$item->product->name}} <br />
                @if ($item->attribute_id)
                    {{$item->attribute->color->color_name}}
                @endif

                @if ($item->attribute_id)
                         {{$item->attribute->size->size_name}}
                 @endif
        
        </td>
        <td>
            <div class="input-append">
                <input class="span1" style="max-width:34px" placeholder="" value="{{$item->quanty}} " id="appendedInputButtons" size="16" type="text">
                    <button class="btn"  type="submit" id=" " ><i class="icon-minus minus buttonClick"></i></button>
                    <button class="btn" id="" type="submit"><i class="icon-plus plus buttonClick "></i></button>
                    <button class="btn btn-danger"type="button"><i class="icon-remove icon-white"></i></button> 
                </div>
        </td>
        <td>
            @if ($item->attribute)
                {{$item->attribute->actual_price}}
            @else
                Rs.{{ $item->product->price }}
            @endif
            
        </td>

        <td>
             @if ($item->attribute)
             Rs.{{ $productPrice = $item->attribute->actual_price * $item->quanty }}
             @else
            Rs.{{ $productPrice = $item->product->price * $item->quanty }}
            @endif
            
        </td>
        <td>{{ $discount = $item->product->discount}} % <br> Rs.{{$productPrice * $discount /100}} </td>
        <td>Rs.{{$tax =$productPrice * 10/100 }} </td>
        <td>Rs.{{$productPrice - ($productPrice * $discount /100) + $tax }} </td>
    </tr>  
    @endforeach

</tbody>