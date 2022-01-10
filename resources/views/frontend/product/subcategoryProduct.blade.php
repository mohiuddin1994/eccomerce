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
                    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
                    <li class="active">Products Name</li>
                </ul>
                
                <h3>  {{$subcategory->category->cat_name}} -> {{$subcategory->sub_name}} <small class="pull-right"> {{count($products)}} products are available </small></h3>
                <hr class="soft" />
                <p>
                    Nowadays the lingerie industry is one of the most successful business spheres.We always stay in
                    touch with the latest fashion tendencies - that is why our goods are so popular and we have a great
                    number of faithful customers all over the country.
                </p>
                <hr class="soft" />
                <form class="form-horizontal span6">
                    <input type="hidden" value="{{$id}} " name="subcategory_id" id="subcategory_id">
                    <div class="control-group">
                        <label class="control-label alignL">Sort By </label>
                        <select id="sort" name="sort" >
                            <option value="" >Select Sort </option>
                            <option value="name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="name_a_z") selected =" " @endif > Priduct name A - Z</option>
                            <option value="name_z_a"  @if(isset($_GET['sort']) && $_GET['sort']=="name_z_a") selected =" " @endif >Priduct name Z - A</option>
                            <option value="priceHigh" @if(isset($_GET['sort']) && $_GET['sort']=="priceHigh") selected =" " @endif > Price Hight first  </option>
                            <option value="priceLow" @if(isset($_GET['sort']) && $_GET['sort']=="priceLow") selected =" " @endif >Price Lowest first</option>
                        </select>
                    </div>
                </form>

                 
                <br class="clr" />
                <div class="tab-content subproduct_filter">
                    <div>
                        @include('frontend.website.message')
                    </div>
                    
                    @include('frontend.product.ajaxSubcategoryProduct')
                </div>
               
                <div class="pagination">
                    <ul>
                        <li><a href="#">&lsaquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">&rsaquo;</a></li>
                    </ul>
                </div>
                <br class="clr" />
            </div>
        </div>
    </div>
</div>
@endsection

@section('subcategoryProduct')
    <script>
        $(document).ready(function(){
            $("#sort").on('change',function(){
                var  sort = $(this).val();
                var id = $("#subcategory_id").val();
                var fabric = get_filterName('fabric');
                var sleeve = get_filterName('sleeve');
                var occassion = get_filterName('occassion');
                 
                $.ajax({
                    url:"subcategoryProduct"+id,
                    method:"get",
                    data:{sleeve:sleeve,fabric:fabric,id:id,sort:sort,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".subproduct_filter").html(data);
                    }
                });
            });

            $(".fabric").on('click',function(){
                var sort = $("#sort option:selected").text(); 
                var fabric = get_filterName('fabric');
                var sleeve = get_filterName('sleeve');
                var occassion = get_filterName('occassion');
                var id = $("#subcategory_id").val();
                $.ajax({
                    url:"subcategoryProduct"+id,
                    method:"get",
                    data:{sleeve:sleeve,fabric:fabric,id:id,sort:sort,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".subproduct_filter").html(data);
                    }
                })
            })
            $(".sleeve").on('click',function(){
                var sort = $("#sort option:selected").text(); 
                var fabric = get_filterName('fabric');
                var sleeve = get_filterName('sleeve');
                var occassion = get_filterName('occassion');
                var id = $("#subcategory_id").val();
                $.ajax({
                    url:"subcategoryProduct"+id,
                    method:"get",
                    data:{sleeve:sleeve,fabric:fabric,id:id,sort:sort,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".subproduct_filter").html(data);
                    }
                })
            })
            $(".occassion").on('click',function(){
                var sort = $("#sort option:selected").text(); 
                var fabric = get_filterName('fabric');
                var occassion = get_filterName('occassion');
                var sleeve = get_filterName('sleeve');
                var id = $("#subcategory_id").val();
                $.ajax({
                    url:"subcategoryProduct"+id,
                    method:"get",
                    data:{sleeve:sleeve,fabric:fabric,id:id,sort:sort,occassion:occassion},
                    success:function(data){
                        console.log(data);
                        $(".subproduct_filter").html(data);
                    }
                })
            })

            function get_filterName(class_name){
                filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            };
 

        });
    </script>
    
@endsection