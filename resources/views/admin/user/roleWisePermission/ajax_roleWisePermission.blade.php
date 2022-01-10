 
@if (count($permission)>0)

    <div class="form-group">
        <label for="permission_id"> Rermission Name </label>  <br>
        @foreach ($permission as $item)
        <input type="checkbox" name="permission_id[]" id="permission"  
            @if(isset($_GET['role_id']) ) checked="" @endif
        
        value="{{$item->id}} "  
            class="mr-2"> {{$item->permission_name}} <br>
        @endforeach
    </div>
         
@else
   <h3>
       No Permission
    </h3> 
@endif