<div class="navbar-container d-flex content">
  <div class="bookmark-wrapper d-flex align-items-center">
    <ul class="nav navbar-nav d-xl-none">
      <li class="nav-item">
        <a class="nav-link menu-toggle" href="javascript:void(0);">
          <i class="las la-bars" data-feather="menu"></i>
        </a>
      </li>
    </ul>
    <ul class="nav navbar-nav bookmark-icons">
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="{{url('/')}}/admin/player/all" data-toggle="tooltip" data-placement="top" title="All Players">
          <i class="las la-users ficon"></i>
        </a>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="{{url('/')}}/admin/new/withdraw/request" data-toggle="tooltip" data-placement="top" title="New Withdraw Request">
          <i class="las la-hand-holding-usd ficon"></i>
        </a>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="{{url('/')}}/admin/transction/all" data-toggle="tooltip" data-placement="top" title="All Transaction History">
          <i class="las la-file-invoice-dollar ficon"></i>
        </a>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link"href="{{url('/')}}/admin/websettings" data-toggle="tooltip" data-placement="top" title="Game Settings">
          <i class="las la-tools ficon"></i>
        </a>
      </li>
      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" target="_blank" href="{{url('/')}}" data-toggle="tooltip" data-placement="top" title="Visit Front Website">
          <i class="las la-desktop ficon"></i>
        </a>
      </li>
      </ul>
    </div>
    <ul class="nav navbar-nav align-items-center ml-auto">
      <li class="nav-item dropdown dropdown-language">
        <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="flag-icon flag-icon-us"></i>
          <span class="selected-language">English</span>
        </a>
      </li>
      <li class="nav-item dropdown dropdown-user">
        <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="user-nav d-sm-flex d-none">
            <span class="user-name font-weight-bolder">{{$admin->name}}</span>
            <span class="user-status">Admin</span>
          </div>
          <span class="avatar">
            <img class="round" src="{{url('/')}}/storage/Profile/{{$admin->profile_img}}" alt="avatar" height="40" width="40">
              <span class="avatar-status-online"></span>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
            <a class="dropdown-item" href="{{url('/')}}/admin/account">
              <i class="las la-user-circle mr-50"></i> Profile
            </a>
            <a class="dropdown-item" href="{{url('/')}}/admin/account">
              <i class="las la-key mr-50"></i> Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{url('/')}}/admin/logout">
              <i class="las la-sign-in-alt mr-50"></i> Logout
            </a>
          </div>
        </li>
      </ul>
    </div>
