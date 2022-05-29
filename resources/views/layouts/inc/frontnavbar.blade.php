<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}"><i class="fa-solid fa-draw-polygon"></i> Minics</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}"><i class="fa-solid fa-house"></i> Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('product')}}"><i class="fa-solid fa-desktop"></i> Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('cart')}}"><i class="fa-solid fa-cart-arrow-down"></i> Cart
            <span class="badge badge-pill bg-primary cart-count">0</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('wishlist')}}"><i class="fa-solid fa-list-check"></i> Wishlist
                <span class="badge badge-pill bg-success wishlist-count">0</span>
            </a>
          </li>
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-door-open"></i> {{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> {{ __('Register') }}</a>
                    </li>
                @endif
            @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user"></i> {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                      <a class="dropdown-item" href="{{url('cart')}}">
                        <i class="fa-solid fa-cart-arrow-down"></i> My Cart
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{url('my-order')}}">
                            <i class="fa-solid fa-book-skull"></i> My Order
                          </a>
                      </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Logout') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                      </li>

                </ul>
              </li>

            @endguest
        </ul>
        </ul>
      </div>
    </div>
  </nav>
