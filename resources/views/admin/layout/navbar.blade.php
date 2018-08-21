<nav class="navbar is-dark">
  <div class="navbar-brand">
    <a class="navbar-item logo" href="{{ url('/admin') }}">
      Gallery/Admin
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">

    <div class="navbar-start">
      @foreach($pages as $page)
        <a href="{{ url($page['uri']) }}" class="navbar-item">
          {{ $page['name'] }}
        </a>
      @endforeach
    </div>

    <div class="navbar-end">
      <div class="navbar-item has-dropdown is-hoverable">
        <div class="navbar-link">
          Howdy, {{ Auth::user()->name }}
        </div>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>

  </div>
</nav>