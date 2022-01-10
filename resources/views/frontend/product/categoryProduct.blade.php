@extends('frontend.website.website_layouts')

@section('frontend_content')

@include('frontend.website.header')

<div id="mainBody">
    <div class="container">
        <div class="row">
            <!-- Sidebar ================================================== --> 
               @include('frontend.website.sidebar') 
            <!-- Sidebar end=============================================== -->
            <div class="span9">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}} ">Home</a> <span class="divider">/</span></li>
                    <li class="active">{{$category->cat_name}} </li>
                </ul>
                <h3> {{$category->cat_name}} <small class="pull-right"> {{count($products)}}  products are available </small></h3>
                <hr class="soft" />
                <p>
                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in
                    touch with the latest fashion tendencies - that is why our goods are so popular and we have a great
                    number of faithful customers all over the country.
                </p>
                <hr class="soft" />
                <form class="form-horizontal span6">
                    <input type="hidden" value="{{$id}} " name="category_id" id="category_id">
                    <div class="control-group" >
                        <label class="control-label alignL">Sort By </label>
                        <select id='sort' name='sort' >
                            <option value=" " > select sort </option>
                            <option value="name_A_Z" @if (isset($_GET['sort']) && $_GET['sort'] == "name_A_Z") selected="" @endif >Priduct name A - Z</option>
                            <option value="name_Z_A" @if (isset($_GET['sort']) && $_GET['sort'] == "name_Z_A") selected="" @endif   >Priduct name Z - A</option>
                            <option value="prichHigh"@if (isset($_GET['sort']) && $_GET['sort'] == "prichHigh") selected="" @endif  >Priduct Price Height</option>
                            <option value="priceLow" @if (isset($_GET['sort']) && $_GET['sort'] == "priceLow") selected="" @endif  >product price Lowest </option>
                        </select>
                    </div>
                </form>

                
                <br class="clr" />
                <div class="tab-content product_filter "> 
                    <div>
                        @include('frontend.website.message')
                    </div>
                  @include('frontend.product.ajaxcategoryProduct')
                </div> 
                <div class="pagination">
                    <ul>
                     {{ $products->links() }} 
                        {{--  <li><a href="#">&lsaquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">&rsaquo;</a></li>  --}}
                    </ul>
                </div>
                <br class="clr" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('categoryProduct')
    <script>
        $(document).ready(function(){
            $("#sort").on('change',function(){
                var sort = $(this).val();
                var id = $("#category_id").val();
                var fabric = get_filter('fabric');
                var sleeve = get_filter('sleeve');
                var occassion = get_filter('occassion');
               
                $.ajax({
                    url:"categoryProduct"+id,
                    method:"get",
                    data:{sort:sort,id:id,fabric:fabric,sleeve:sleeve,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".product_filter").html(data);
                    }
                });
            });


{{--  fabric   --}}

            $(".fabric").on('click',function(){ 
                var id = $("#category_id").val();
                var fabric = get_filter('fabric');
                var sleeve = get_filter('sleeve');
                var occassion = get_filter('occassion');
                var sort = $("#sort option:selected").text(); 
                $.ajax({
                    url:"categoryProduct"+id,
                    method:"get",
                    data:{sort:sort,id:id,fabric:fabric,sleeve:sleeve,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".product_filter").html(data);
                    }
                })
            });

            {{--  sleeve   --}}

            $(".sleeve").on('click',function(){ 
                var id = $("#category_id").val();
                var fabric = get_filter('fabric');
                var sleeve = get_filter('sleeve');
                var occassion = get_filter('occassion');
                var sort = $("#sort option:selected").text(); 
                $.ajax({
                    url:"categoryProduct"+id,
                    method:"get",
                    data:{sort:sort,id:id,fabric:fabric,sleeve:sleeve,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".product_filter").html(data);
                    }
                })
            });

            $(".occassion").on('click',function(){ 
                var id = $("#category_id").val();
                var fabric = get_filter('fabric');
                var sleeve = get_filter('sleeve');
                var occassion = get_filter('occassion');
                var sort = $("#sort option:selected").text(); 
                $.ajax({
                    url:"categoryProduct"+id,
                    method:"get",
                    data:{sort:sort,id:id,fabric:fabric,sleeve:sleeve,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".product_filter").html(data);
                    }
                })
            });

            function get_filter(class_name){
                var filter =[];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                    
                });
                return filter;
            };
        });
    </script>

@endsection