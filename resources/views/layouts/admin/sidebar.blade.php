<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('images/sidebar.jpg')}}">
  <div class="logo">
    <a href="{{route('home')}}" class="simple-text logo-normal">
      Anti Ratta
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin_dashboard')}}">
          <i class="fa fa-tachometer" aria-hidden="true"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin_dashboard')}}">
          <i class="fa fa-university" aria-hidden="true"></i>
          <p>Universities</p>
        </a>
      </li>
    </ul>
  </div>
</div>
