<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href=" {{route('admin')}} ">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{route('banner.index')}} ">
                    <i class="fas fa-image"></i>
                    <span>Banner</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href=" {{route('banner.create')}} ">
                    <i class="fas fa-image"></i>
                    <span>Add Banner</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('category.index')}} " >
                    <i class="fas fa-layer-group"></i>
                    <span>Category</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('category.create')}} " >
                    <i class="fas fa-layer-group"></i>
                    <span>Add Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('brand.index')}} " >
                    <i class="fas fa-layer-group"></i>
                    <span>Brand</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('brand.create')}} " >
                    <i class="fas fa-layer-group"></i>
                    <span>Add Brand</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('product.index')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Products</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('product.create')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Add Products</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('user.index')}}" >
                    <i class="fas fa-user"></i>
                    <span>User</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('user.create')}}" >
                    <i class="fas fa-user"></i>
                    <span>Add User</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="" >
                    <i class="fas fa-shopping-cart"></i>
                    <span>Cart</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('coupon.index')}}">
                    <i class="fa fa-list" aria-hidden="true"></i> 
                    <span>Counpon</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('coupon.create')}}">
                    <i class="fa fa-list" aria-hidden="true"></i> 
                    <span>Add Counpon</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('shipping.index')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Shippings</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('shipping.create')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Add Shippings</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('order.index')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Order Manager</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="{{route('settings')}}" >
                    <i class="fas fa-shopping-bag"></i>
                    <span>Settings</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" >
                    <i class="fas fa-layer-group"></i>
                    <span>Post Category</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" >
                    <i class="fas fa-tags"></i>
                    <span>Post Tag</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Post</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{asset('backend/img/undraw_rocket.svg')}}" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>

        </ul>