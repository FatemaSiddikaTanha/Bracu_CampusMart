<header class="header">   
  <nav class="navbar navbar-expand-lg">
    

    <!-- 🔹 Navbar Container -->
    <div class="container-fluid d-flex align-items-center justify-content-between">
      
      <!-- Logo / Brand -->
      <div class="navbar-header">
        <a href="index.html" class="navbar-brand">
          <div class="brand-text brand-sm">
            <strong class="text-primary">B</strong><strong>M</strong>
          </div>
        </a>
      </div>

      <!-- Logout -->
      <div class="list-inline-item logout">       
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa fa-sign-out"></i> Logout
          </button>
        </form>            
      </div>

    </div><!-- /.container-fluid -->

  </nav>
</header>
