<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
      <a class="nav-link " href="/">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('category*') ? 'active' : '' }}">
      <a class="nav-link " href="/category">
        <i class="icon-grid menu-icon ti-book"></i>
        <span class="menu-title">Category</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('product*') ? 'active' : '' }}">
      <a class="nav-link " href="/product">
        <i class="icon-grid menu-icon ti-package"></i>
        <span class="menu-title">Product</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('stock*') ? 'active' : '' }}">
      <a class="nav-link " href="/stock">
        <i class="icon-grid menu-icon ti-clipboard"></i>
        <span class="menu-title">Monitoring Stock</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('purchase*') ? 'active' : '' }}">
      <a class="nav-link " href="/purchase">
        <i class="icon-grid menu-icon ti-money"></i>
        <span class="menu-title">Monitoring Purchase</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('shop*') ? 'active' : '' }}">
      <a class="nav-link " href="/shop">
        <i class="icon-grid menu-icon ti-shopping-cart"></i>
        <span class="menu-title">Shop</span>
      </a>
    </li>
    <li class="nav-item {{ Request::is('akun') ? 'active' : '' }}">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon ti-settings mb-1"></i>
        <span class="menu-title">Your Account</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> 
            <form action="/logout" method="POST" class="nav-link">
              @csrf
              <button type="submit" class="btn-link">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </li>
    
  </ul>
</nav>