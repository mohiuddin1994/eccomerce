@extends('frontend.website.website_layouts')
  
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
                <h1> About page </h1>
                
            </div>
        </div>
    </div>
</div>

<!-- Footer ================================================================== -->
@include('frontend.website.footer')
@endsection
