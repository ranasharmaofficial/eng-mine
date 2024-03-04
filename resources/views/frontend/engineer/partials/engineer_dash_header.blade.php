<nav class="navbar navbar-expand-lg bg-body-tertiary logins bg-dark2 py-4" style="background: #0c112a !important;">
  <div class="container">	
    <a class="navbar-brand" href="{{ url('') }}">		<img src="{{ static_asset('assets/assets_web/img/header-logo.png')}}" class="" alt="" height="35px" width="100%">	</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">		<span class="navbar-toggler-icon"></span>	</button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="d-flex align-items-center">
              <span class="user-img position-realtive d-inline-block me-2">
                <img src="{{ static_asset('assets/assets_web/img/avatar-02.jpg')}}" alt="user-img" class="rounded-circle">
              </span>
              <div class="user-info">
                <h6 class="text-white">{{ Session('LoggedEngineer')->first_name.' '.Session('LoggedEngineer')->last_name }}</h6>
                <p class="text-white">Engineer</p>
              </div>
            </div>
            <i class="fa fa-angle-down ps-2 fs-4 text-white" aria-hidden="true"></i>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="{{ url('engineer/engineer-dashboard') }}">
                <i class="fa fa-home pe-2" aria-hidden="true"></i> My Dashboard
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ url('engineer/edit-profile') }}">
                <i class="fa fa-pencil-square-o pe-2" aria-hidden="true"></i> Edit Profile
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ url('engineer/change-password') }}">
                <i class="fa fa-key pe-2" aria-hidden="true"></i> Change Password
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="fa fa-power-off pe-2" aria-hidden="true"></i> Log Out
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>