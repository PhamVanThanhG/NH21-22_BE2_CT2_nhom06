<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Minics</title>


  <!-- bootstrap core css -->
  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <!-- <link href="css/font-awesome.min.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

  <!-- Custom styles for this template -->
  <!-- <link href="css/style.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <!-- responsive style -->
  <!-- <link href="css/responsive.css" rel="stylesheet" /> -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  

  <!-- detail css -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

<!-- Bootstrap -->
  <!-- <link type="text/css" rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" /> -->
  {{-- <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet"> --}}

<!-- Slick -->
<link type="text/css" rel="stylesheet" href="{{ asset('css/css/slick.css') }}"/>
<link type="text/css" rel="stylesheet" href="{{ asset('css/css/slick-theme.css') }}"/>

<!-- nouislider -->
<link type="text/css" rel="stylesheet" href="{{ asset('css/css/nouislider.min.css') }}"/>

<!-- Font Awesome Icon -->
<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

<!-- Custom stlylesheet -->
<link type="text/css" rel="stylesheet" href="{{ asset('css/css/style.css') }}"/>
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : +01 123455678990
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : demo@gmail.com
                </span>
              </a>
            </div>
            <form class="search_form">
              <input type="text" class="form-control" placeholder="Search here...">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </form>
            <div class="user_option_box">
              {{-- <a href="{{ url('/login') }}" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
            My Account
                </span>
              </a> --}}
              @guest
                            @if (Route::has('login'))
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            @endif

                            @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            @endif
                        @else
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li>
                                  <a class="dropdown-item" href="#">
                                      My Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">>
                                        {{ __('Logout') }}
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                  </li>
                             
                            </ul>
                        </div>
                            
                        @endguest
              <a href="{{ url('/cart')}}" class="cart-link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>
                  Cart
                </span>
              </a>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/index')}}">
              <span>
                Minics
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/index')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/about')}}"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/product')}}">Products</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/why')}}">Why Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/testimonial')}}">Testimonial</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>

  @yield('content')

  <!-- info section -->
  <section class="info_section">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Minics
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              Address
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
              +01 1234567890
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              demo@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Eligendi sunt, provident, debitis nemo, facilis cupiditate velit libero dolorum aperiam enim nulla iste maxime corrupti ad illo libero minus.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="index">
                  Home
                </a>
              </li>
              <li>
                <a href="about">
                  About
                </a>
              </li>
              <li>
                <a href="product">
                  Products
                </a>
              </li>
              <li>
                <a href="why">
                  Why Us
                </a>
              </li>
              <li>
                <a href="testimonial">
                  Testimonial
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayYear"></span> All Rights Reserved By
        <a href="https://html.design/">Free Html Templates</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <!-- custom js -->
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('js/script.js') }}"></script>
  <!-- detail script -->
  <script src="{{ asset('js/js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/js/slick.min.js') }}"></script>
	<script src="{{ asset('js/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('js/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('js/js/main.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>


</body>

</html>