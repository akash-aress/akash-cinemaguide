
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="{{ route('cinema') }}" class="nav-link">
        <i class="nav-icon fas fa-film"></i>
        <p>
          {{ __('Cinema') }}
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('movies.index') }}" class="nav-link">
        <i class="nav-icon fas fa-video"></i>
        <p>
          {{ __('Movies') }}
        </p>
      </a>
    </li>
  </ul>
</nav>
