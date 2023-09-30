<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{route('admin.dashboard')}}"> <img alt="my-image" src="{{asset('/')}}backend/assets/img/logo.png" class="header-logo" /> <span
            class="logo-name">pulock</span>
        </a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown">
          <a href="{{route('admin.dashboard')}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-cog"></i><span>Roles</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('role.create')}}">Add Role</a></li>
            <li><a class="nav-link" href="{{route('role.index')}}">Manage Role</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="menu-toggle nav-link has-dropdown"><i class="fas fa-user-alt"></i><span>Admin</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('admin.create')}}">Add Admin</a></li>
            <li><a class="nav-link" href="{{route('admin.index')}}">Manage Admin</a></li>
          </ul>
        </li>
      </ul>
    </aside>
  </div>