<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link {{(request()->is('admin/admin')? 'active':' ') }} " href="{{route('admin')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link {{(request()->is('admin/setting*'))? 'active':' ' }}"  href="{{route('setting')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Setting
                </a>
                <a class="nav-link {{(request()->is('admin/user*'))? 'active':' ' }}"  href="{{route('user')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   User
                </a>
                <a class="nav-link {{(request()->is('admin/userRole*'))? 'active':' ' }}"  href="{{url('admin/userRole')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                UserRole
                </a>
                <a class="nav-link {{(request()->is('admin/role_wise_user*'))? 'active':' ' }}"  href="{{route('role_wise_user')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                   Role Wise User
                </a>
                <a class="nav-link {{(request()->is('admin/permission*'))? 'active':' ' }}"  href="{{route('permission')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                  Permission
                </a>
                <a class="nav-link {{(request()->is('admin/role_wise_permission*'))? 'active':' ' }}"  href="{{route('role_wise_permission')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                 Role Wise Permission
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
                <a class="nav-link {{(request()->is('admin/coupon*'))? 'active':' ' }}"  href="{{route('coupon')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                 Coupon
                </a>
                <a class="nav-link {{(request()->is('admin/order*'))? 'active':' ' }}"  href="{{route('order')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                 Order
                </a>
                <a class="nav-link {{(request()->is('admin/shippingCharge*'))? 'active':' ' }}"  href="{{route('shippingCharge')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Shipping Charge
                </a>
                <a class="nav-link {{(request()->is('admin/about*'))? 'active':' ' }}"  href="{{route('about')}} ">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    About
                </a>


            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
