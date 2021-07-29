<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
               
                <a class="nav-link {{(request()->is('admin/dashboard')? 'active':' ') }} " href="{{route('dashboard')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{(request()->is('admin/setting*'))? 'active':' ' }}"  href="{{route('setting')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Setting
                </a>

                <a class="nav-link {{(request()->is('admin/category*'))? 'active':' ' }}"  href="{{route('category')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Category
                </a>
                  <a class="nav-link {{(request()->is('admin/subcategory*'))? 'active':' ' }}"  href="{{route('subcategory')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Sub category
                </a>
                <a class="nav-link {{(request()->is('admin/color*'))? 'active':' ' }}"  href="{{route('color')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Color
                </a>
                <a class="nav-link {{(request()->is('admin/size*'))? 'active':' ' }}"  href="{{route('size')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Size
                </a>
                <a class="nav-link {{(request()->is('admin/product*'))? 'active':' ' }}"  href="{{route('product')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Product
                </a>
                
                
               
                
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
