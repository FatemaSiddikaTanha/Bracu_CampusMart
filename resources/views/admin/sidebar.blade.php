<div class="d-flex align-items-stretch">
  <!-- Sidebar Navigation-->
  <nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="title">
        <h4 class="mb-0">Tanha Oboni</h4>
        <small class="text-muted">Admin</small>
        
      </div>
    </div>

    <!-- Sidebar Navigation Menus -->
    <span class="heading">Admin Dashboard</span>
    <ul class="list-unstyled">

      <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a href="{{ url('admin/dashboard') }}">
          <i class="icon-grid"></i> Home
        </a>
      </li>

      <li class="{{ Request::is('view_category') ? 'active' : '' }}">
        <a href="{{ url('view_category') }}">
          <i class="icon-grid"></i> Category
        </a>
      </li>

      <li>
        <a href="#exampledropdownDropdown" data-toggle="collapse" aria-expanded="false"
           class="dropdown-toggle {{ Request::is('add_product') || Request::is('view_product') ? 'active' : '' }}">
          <i class="icon-windows"></i> Products
        </a>
        <ul class="collapse list-unstyled" id="exampledropdownDropdown">
          <li><a href="{{ url('add_product') }}">Add Product</a></li>
          <li><a href="{{ url('view_product') }}">View Product</a></li>
        </ul>
      </li>

      <li class="{{ Request::is('view_orders') ? 'active' : '' }}">
        <a href="{{ url('view_orders') }}">
          <i class="icon-grid"></i> Orders
        </a>
      </li>

      <li class="{{ Request::is('admin/messages') ? 'active' : '' }}">
        <a href="{{ url('admin/messages') }}">
          <i class="fa fa-envelope"></i> Messages
        </a>
      </li>

    </ul>
  </nav>

