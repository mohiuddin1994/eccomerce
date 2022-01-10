<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Stack Developers online Shopping cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="author" content="">
	
	<!-- Front style -->
	<link id="callCss" rel="stylesheet" href="{{asset('frontend/themes/css/front.min.css')}}" media="screen"/>
	<link href="{{asset('frontend/themes/css/base.css')}}" rel="stylesheet" media="screen"/>
	<!-- Front style responsive -->
	<link href="{{asset('frontend/themes/css/front-responsive.min.css')}}" rel="stylesheet"/>
	<link href="{{asset('frontend/themes/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->
	<link href="{{asset('frontend/themes/js/google-code-prettify/prettify.css')}}" rel="stylesheet"/>
	<!-- fav and touch icons -->
	<link rel="shortcut icon" href="{{asset('frontend/themes/images/ico/favicon.ico')}}">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/themes/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/themes/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/themes/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('frontend/themes/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<style type="text/css" id="enject"></style>
	@yield('profile')

</head>
<body>

@yield('profile_content')
    
	<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
     
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    




	<script src="{{asset('frontend/themes/js/google-code-prettify/prettify.js')}}"></script>
	<script src="{{asset('frontend/themes/js/front.js')}}"></script>
	<script src="{{asset('frontend/themes/js/jquery.lightbox-0.5.js')}}"></script>
	<script src="{{asset('frontend/themes/js/jquery.lightbox-0.5.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.validate.min.js')}}"></script>

	
	
</body>
</html>


