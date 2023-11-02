<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style type="text/css">
	*{
      font-family: 'Urbanist', sans-serif;
    }
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#">E-shop</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @foreach ($categories as $category)
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $category->category }}
                  </a>


                @foreach ($category->product as $product)
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('product.detail',$product->id) }}">{{ $product->name }}</a></li>
                </ul>
                @endforeach

                </li>
                @endforeach


            </ul>

                <li class="nav-item list-unstyled" >
                <a class="nav-link active" aria-current="page" href="cart.php">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span class="badge bg-danger">3</span>
                </a>
              </li>
                <li class="nav-item dropdown list-unstyled mx-3">
                <a class="nav-link" href="#" id="navbarDropdown"  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-gear"></i>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @guest
                        <li><a class="dropdown-item text-secondary" href="{{ route('register') }}">Register</a></li>
                        <li><a class="dropdown-item text-secondary" href="{{ route('login') }}">Login</a></li>
                    @endguest
                  @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item text-secondary">Logout</button>
                        </form>
                    </li>
                    <li><a class="dropdown-item text-secondary" href="history.php">User History</a></li>
                  @endauth

                </ul>
              </li>
              @auth
              <li class="nav-item list-unstyled" >
                <b>
                        {{ auth()->user()->name }}
                    </b>
                    <img src="{{ asset('images/'.auth()->user()->photo) }}" width="35px" class="rounded-circle">
                </li>
            @endauth
          </div>
        </div>
      </nav>

      <div class="p-5">
        @yield('content')
      </div>
</body>
</html>
