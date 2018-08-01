<nav class="navbar {{isset($transparent_nav)?'navbar-transparent navbar-color-on-scroll':''}} fixed-top navbar-expand-lg bg-dark" color-on-scroll="50" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="/">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('candid')}}">Candid charcha</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('jfk')}}">jfk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('aboutus')}}">About us</a>
        </li>
        <li class="nav-divider"></li>
        @if (Auth::check())
          <li class="dropdown nav-item">
            <a href="#" class="profile-photo dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
              <div class="profile-photo-small">
                <img src="http://via.placeholder.com/60x60&text=Avatar" alt="Circle Image" class="rounded-circle img-fluid">
              </div>
              <div class="ripple-container"></div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">{{Auth::user()->firstname." ".Auth::user()->lastname}}</h6>
                <a href="#" class="dropdown-item">My Courses</a>
                <a href="{{route('setting', 'personal-info')}}" class="dropdown-item">Settings</a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item">Sign out</a>
              </div>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
