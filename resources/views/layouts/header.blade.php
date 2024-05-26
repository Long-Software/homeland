<div class="site-mobile-menu">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar mt-4">
  <div class="container py-1">
    <div class="row align-items-center">
      <div class="col-8 col-md-8 col-lg-4">
        <h1 class="mb-0"><a href="{{ url('/') }}" class="text-white h2 mb-0"><strong>Homeland<span
                class="text-danger">.</span></strong></a></h1>
      </div>
      <div class="col-4 col-md-4 col-lg-8">
        <nav class="site-navigation text-right text-md-right" role="navigation">

          <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#"
              class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <li class="active">
              <a href="index.html">Home</a>
            </li>
            <li><a href="{{ route('properties.type', 'Buy') }}">Buy</a></li>
            <li><a href="{{ route('properties.type', 'Rent') }}">Rent</a></li>
            <li class="has-children">
              <a href="properties.html">Properties</a>
              <ul class="dropdown arrow-top">
                <li><a href="{{ route('properties.type', 'Condo') }}">Condo</a></li>
                <li><a href="{{ route('properties.type', 'Property Land') }}">Property Land</a></li>
                <li><a href="{{ route('properties.type', 'Commercial Building') }}">Commercial Building</a></li>

              </ul>
            </li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                  Logout
                </a>
 
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                <a href="{{ route('properties.save.index') }}" class="dropdown-item">Saved Property</a>
                <a href="{{ route('properties.request.index') }}" class="dropdown-item">Request Property</a>
              </div>
            </li>
            @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
            @endauth
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>