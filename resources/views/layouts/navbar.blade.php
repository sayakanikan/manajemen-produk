<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo mr-5" href="/dashboard">System</a>
    <a class="navbar-brand brand-logo-mini" href="/dashboard">PMS</a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          {{-- @if (asset('storage/' . $foto == null)) --}}
            <img src="../../template/images/profile.png" alt="profile" width="100px" class="rounded">  
          {{-- @else --}}
            {{-- <img src="{{ asset('storage/' . $foto) }}" alt="profile" width="100px" class="rounded"/> --}}
          {{-- @endif --}}
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a href="/akun" class="dropdown-item">
            <i class="ti-settings text-primary"></i>
            Profile
          </a>
          <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="dropdown-item">
              <i class="ti-power-off text-primary"></i>
              Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>