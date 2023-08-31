<nav class="navbar bg-body-tertiary" aria-label="Light offcanvas navbar">
    <div class="container-fluid">
      <a class="navbar-brand p-3" href="{{ route('showSite') }}" style="color: springgreen">{{ $appSetting->website_name ?? 'project' }}</a>
    <!-- Authentication Links -->
    <ul class="navbar-nav ms-auto p-3">
        @guest
            @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" style="color:blue" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" style="color:blueviolet" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif

            @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <h6 style="color:rgb(34, 63, 191)">welcome</h6> {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" style="color:red" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLightLabel">HELLO PEOPLE</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('showSite') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('wishlist.index') }}">WISHLIST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('CART') }}">BASKET (<livewire:frontend.cart.cart-count />)</a>
                <a class="nav-link" href="{{ route('Order') }}">my order</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                details
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('categories') }}">categories</a></li>
                <li><a class="dropdown-item" href="{{ route('Order') }}">my orders</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
</nav>
