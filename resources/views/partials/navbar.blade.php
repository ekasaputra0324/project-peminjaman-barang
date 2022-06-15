<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
      <div class="search-element">  
        <div class="search-backdrop"></div>
        <div class="search-result">
          <div class="search-item">
            <a href="#">
              <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
              Headphone Blitz
            </a>
          </div>
          <div class="search-header">
            Projects
          </div>
          <div class="search-item">
            <a href="#">
              <div class="search-icon bg-danger text-white mr-3">
                <i class="fas fa-code"></i>
              </div>
              Stisla Admin Template
            </a>
          </div>
          <div class="search-item">
            <a href="#">
              <div class="search-icon bg-primary text-white mr-3">
                <i class="fas fa-laptop"></i>
              </div>
              Create a new Homepage Design
            </a>
          </div>
        </div>
      </div>
    </form>
    <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user" >
        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right mt-3" >
         <button type="submit" style="background:none; border:none;" class="text-danger" onclick="validate()" ><i class="fas fa-sign-out-alt mt-2"></i> Logout</button>
          {{-- <a href="{{ route('logout') }}" > --}}
          </a>
        </div>
      </li>
    </ul>
  </nav>