
 
@php
    $user = Auth::user();
@endphp
  
<div id="sidebar" class="span3 mr-4">
  
  
    <img src="{{asset($user->image)}}" style="width: 100px;height:100px;border-radius:50%" alt="">
    <input id="old_image" class="form-control" type="hidden" value="{{$user->image}}"name="old_image">
    @if(isset($page_name) && $page_name == "profile_index")
    <input id="" class="" type="file" name="image" style="width:94px"> <br>
 
   @endif

    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li> <a href="{{route('profile')}}"> Home </a></li>
        <li> <a href="{{route('user_order')}}"> Order </a></li>
        
    </ul>
    <br/> 
</div>
