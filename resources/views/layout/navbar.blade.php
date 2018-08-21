<nav class="navbar is-transparent">
  <div class="navbar-brand">
    <a class="navbar-item logo" href="{{ url('/') }}">
      Gallery.io
    </a>
    <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navbarExampleTransparentExample" class="navbar-menu">
    <div class="navbar-start">
      <div class="navbar-item has-dropdown is-hoverable">
        <div class="navbar-link">
          Categories
        </div>
        <div class="navbar-dropdown is-boxed">
          @foreach($categories as $category)
            <a class="navbar-item" href="{{ url('/images/category/' . $category['id']) }}">
              {{ $category['name'] }}
            </a>
          @endforeach
        </div>
      </div>
    </div>

    <div class="navbar-end">
      @guest
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a href="{{ route('login') }}" class="button">Login</a>
              <a href="{{ route('register') }}" class="button is-primary">Register</a>
            </p>
          </div>
        </div>
      @else
        <div class="navbar-item">
          <div class="field is-grouped">
            <p class="control">
              <a href="{{ url('/image/upload') }}" class="button is-primary">Upload image</a>
            </p>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <div class="navbar-link">
            Howdy, {{ Auth::user()->name }}
          </div>
          <div class="navbar-dropdown is-boxed">
            <a class="navbar-item" href="{{ route('my-images') }}">
              My images
            </a>
            <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
      @endguest
    </div>

  </div>
</nav>