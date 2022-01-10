@extends('frontend.website.website_layouts')
  @section('login')
      <style>
        form.cmxform label.error, label.error {
          /* remove the next line when you have trouble in IE6 with labels in list */
          color: red;
          font-style: italic
        }
      </style>
  @endsection

@section('frontend_content')

@include('frontend.website.header')

<!-- Header End====================================================================== --> 
<div id="mainBody">
	<div class="container">
		<div class="row">
			<!-- Sidebar ================================================== -->
			@include('frontend.website.sidebar')
			<!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Login</li>
                </ul>
                <h3> Login</h3>	
                <hr class="soft"/>
                
                {{--  new loging   --}}
                <div class="row">
                    <div class="span4">
                        <div class="well">
                          <div class="col-lg-4">
                            @include('frontend.website.message')
                          </div>
                        <h5>CREATE YOUR ACCOUNT</h5><br/>
                        Enter your e-mail address to create an account.<br/><br/><br/>
                        <form action="{{url('account_create')}} " method="POST" id=" " >
                          @csrf

                          <div class="control-group">
                            <label class="control-label" for="inputEmail0">Name</label>
                            <div class="controls">
                              <input class="span3"  type="text" name="name" id="name" placeholder="name" value="{{old('name')}} " >
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="inputEmail0">E-mail address</label>
                            <div class="controls">
                              <input class="span3"  type="email" name="email" id="email" placeholder="Email"value="{{old('email')}} ">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="inputEmail0">Phone</label>
                            <div class="controls">
                              <input class="span3"  type="text" name="phone" id="phone" placeholder="phone"value="{{old('phone')}} ">
                            </div>
                          </div>
 
                          <div class="control-group">
                            <label class="control-label" for="inputEmail0">password</label>
                            <div class="controls">
                              <input type="text" class="span3" name="password" id="password" placeholder="Password">
                            </div>
                          </div>

                          <div class="controls">
                          <button type="submit" class="btn block">Create Your Account</button>
                          </div>
                        </form>
                    </div>
                    </div>
                    <div class="span1"> &nbsp;</div>

                     
                      {{--  already login   --}}
                    <div class="span4">
                        <div class="well">
                        <h5>ALREADY REGISTERED ?</h5>
                        <form action="{{url('loginUser')}} " method="post" id="">
                          @csrf
                          <div class="control-group">
                            <label class="control-label" for="inputEmail1">Email</label>
                            <div class="controls">
                              <input class="span3" type="text"name="email" id="inputEmail1" placeholder="Email">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="inputPassword1">Password</label>
                            <div class="controls">
                              <input type="text" class="span3" name="password" id="inputPassword1" placeholder="Password">
                            </div>
                          </div>
                          <div class="control-group">
                            <div class="controls">
                              <button type="submit" class="btn">Sign in</button> <a href="forgetpass.html">Forget password?</a>
                            </div>
                          </div>
                        </form>
                    </div>
                    </div>
                </div>	
                
            </div>
		</div>
	</div>
</div>
<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@endsection
 
 
@section('userLoginRagister')

    <script>
      jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });
      $(document).ready(function(){   

       
      $("#signupForm").validate({
        rules: {
        
          name: {
            required: true,
            minlength: 2
          },
          password: {
            required: true,
            minlength: 4,
            maxlength: 4, 
            digits: true
          },
          phone: {
            required: true,
            minlength: 11, 
            maxlength: 11, 
            digits: true
          },
          email: {
            required: true,
            email: true
          },

          topic: {
            required: "#newsletter:checked",
            minlength: 2
          },
          agree: "required"
        }, 
       
      });
  
    })
    </script>
    <script>
      jQuery.validator.setDefaults({
        debug: true,
        success: "valid"
      });
      $(document).ready(function(){   

       
      $("#loginFrom").validate({
        rules: {
        
           
          password: {
            required: true,
            minlength: 4,
            maxlength: 4, 
            digits: true
          },
          
          email: {
            required: true,
            email: true
          },

          topic: {
            required: "#newsletter:checked",
            minlength: 2
          },
          agree: "required"
        }, 
       
      });
  
    })
    </script>
    
@endsection