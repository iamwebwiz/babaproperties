<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <span class="fe fe-home"></span> Dashboard
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#">
      <span class="fe fe-users"></span> Users
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.properties') }}">
      <span class="fe fe-tag"></span> Properties
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/logout') }}">
      <span class="fe fe-log-out"></span> Sign out
    </a>
  </li>
</ul>
