<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('home') }}">
      <span class="fe fe-home"></span> Dashboard
    </a>
  </li>

  @if (auth()->user()->is_admin)
    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.users') }}">
        <span class="fe fe-users"></span> Users
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('admin.properties') }}">
        <span class="fe fe-tag"></span> Properties
      </a>
    </li>
  @else
    <li class="nav-item">
      <a href="{{ route('user.properties') }}" class="nav-link">
        <span class="fe fe-tag"></span> Properties
      </a>
    </li>
  @endif

  <li class="nav-item">
    <a class="nav-link" href="{{ url('/logout') }}">
      <span class="fe fe-log-out"></span> Sign out
    </a>
  </li>
</ul>
