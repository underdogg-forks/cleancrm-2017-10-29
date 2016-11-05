<nav class="nav">
  <div class="nav-left">
    <a class="nav-item is-brand" href="{{ url('/') }}">
      {{ config('app.name', 'Laravel') }}
    </a>
  </div>

  <div class="nav-center">
    <a class="nav-item" href="http://github.com/cleaniquecoders/web-app-boilerplate">
      <span class="icon">
        <i class="fa fa-github"></i>
      </span>
    </a>
  </div>

  <span class="nav-toggle">
    <span></span>
    <span></span>
    <span></span>
  </span>

  <div class="nav-right nav-menu">
    @if (Auth::guest())
        <a class="nav-item" href="{{ url('/login') }}">Login</a>
        <a class="nav-item" href="{{ url('/register') }}">Register</a>
    @else
        <a class="nav-item">
        @if(!empty(Auth::user()->profile->avatar))
            <img src={{ Auth::user()->profile->avatar }} class="image is-24x24">
        @endif
        {{ Auth::user()->name }}
        </a>
        <a class="nav-item" href="{{ url('/dashboard') }}">Dashboard</a>
        @ability('administrator,trainer,facilitator','users-index')
            <a class="nav-item" href="{{ route('users.index') }}">User Manager</a>
        @endability
        <div>
        <a class="nav-item" href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div>
    @endif

  </div>
</nav>
