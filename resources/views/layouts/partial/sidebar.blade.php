<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #A6774E;">
  <!-- Brand Logo -->


  <div>
    <a href="index3.html" class="brand-link">
      <img src="{{asset('backend/dist/img/logo.png')}}" alt="logo ocañerita " class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">La Ocañerita</span>
    </a>
  </div>

  <!-- Sidebar -->
  <div class="sidebar" style="background-color: #A6774E;">
    <!-- Sidebar user panel (optional) -->

    <!-- SidebarSearch Form -->
    <div class="form-inline" style="margin-top: 10px;">
      <div class="input-group" data-widget="sidebar-search" >
        <input style="background-color: #FBF9F1;" class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append" >
          <button class="btn btn-sidebar" style="background-color: #D96941;">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="home" class="nav-link active" style="background-color: #D96941;">
            <i class="nav-icon fas fa-home nav-icon"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-item" style="color: #FBF9F1">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-shopping-bag"></i>
            <p>
              Menu
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('customers.index')}}" class="nav-link">
                <i class="far fa-user-circle nav-icon"></i>
                <p>Customer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('products.index')}}" class="nav-link">
              <i class="fa-regular fa-utensils fa nav-icon"></i>
                <p>Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('orders.index')}}" class="nav-link">
                <i class="fa fa-cart-plus nav-icon"></i>
                <p>Order</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>