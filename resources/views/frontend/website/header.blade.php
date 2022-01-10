@php

$session_id = Session::get('session_id');
$categories = App\Models\Category::where('statu',1)->get();
$cart = App\Models\Cart::where('user_ip',request()->ip())->get();
$cartCount = $cart->count();

$cartItem = $cart->sum(function($quanty){
return $quanty->quanty;
});

@endphp

<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">Welcome!<strong> User</strong></div>
            <div class="span6">
                <div class="pull-right">
                    <a href="{{url('cart_summery')}}"><span class="btn btn-mini btn-primary"><i
                                class="icon-shopping-cart icon-white"></i> {{$cartCount}} Items, Quanty {{$cartItem}}
                        </span> </a>
                </div>
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <section id="navbar">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                        <a class="brand" href=" {{route('/')}} ">Stack Developers</a>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <li class="active"><a href="{{route('/')}} ">Home</a></li>

                                @foreach ($categories as $item)
                                <li class="dropdown">
                                    <a href="{{url('categoryProduct'.$item->id)}} " class="dropdown-toggle"
                                        data-toggle="dropdown"> {{$item->cat_name}} <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        @foreach ($item->subcategory as $item)
                                        <li class="divider"></li>
                                        <li class="nav-header"><a
                                                href=" {{url('subcategoryProduct'.$item->id)}} ">{{$item->sub_name}}</a>
                                        </li>
                                        @endforeach


                                    </ul>
                                </li>
                                @endforeach

                                <li><a href=" {{url('admin/about_pageIndex')}} " id="aboutePage">About</a></li>

                            </ul>
                            <form class="navbar-search pull-left" method="POST" action="{{url('searchProduct')}} ">
                                @csrf
                                <input type="text" class="search-query span2" name="name" id="ajaxProduct"
                                    placeholder="Search" />
                            </form>
                            <ul class="nav pull-right">

                                <li><a href="#">Contact</a></li>
                                <li class="divider-vertical"></li>

                                @if(Auth::check())
                                <li><a href=" {{route('profile')}} ">Account</a></li>
                                <li><a href=" {{url('loginOut')}} ">Logout</a></li>
                                @else
                                <li><a href=" {{route('loginPage')}} ">Login</a></li>
                                @endif


                            </ul>
                        </div><!-- /.nav-collapse -->
                    </div>
                </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
        </section>
    </div>
</div>

@section('headerPage')

 

@endsection
