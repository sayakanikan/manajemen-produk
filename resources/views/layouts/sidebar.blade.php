<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
      <a class="nav-link " href="/dashboard">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}">
      <a class="nav-link " href="/category">
        <i class="icon-grid menu-icon ti-menu"></i>
        <span class="menu-title">Category</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('product*') ? 'active' : '' }}">
      <a class="nav-link " href="/product">
        <i class="icon-grid menu-icon ti-package"></i>
        <span class="menu-title">Product</span>
      </a>
    </li>
    {{-- <li class="nav-item {{ Request::is('akun') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon ti-settings mb-1"></i>
        <span class="menu-title">Your Account</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="/akun">Profile</a></li>
          <li class="nav-item"> 
            <form action="/logout" method="POST" class="nav-link">
              @csrf
              <button type="submit" class="btn-link">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </li> --}}
    
  </ul>
</nav>