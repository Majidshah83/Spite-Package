<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>


    .navbar-expand-md .navbar-collapse {
    display: flex!important;
    flex-basis: auto;
    justify-content: flex-end !important;
    }
    .badge {
    display: inline-block;
    padding: 0.35em 0.65em;
    font-size: .75em;
    font-weight: 700;
    line-height: 1;
    color: black;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0.25rem;
}
.btn-secondary:hover {
    color: black !important;
    background-color: transparent !important;
    border-color: transparent !important;
    outline: none !important;
}
    .btn-check:focus+.btn-secondary, .btn-secondary:focus {
    outline: none !important;
    color: black;
    background-color: transparent;
    border-color: transparent;
    box-shadow: none;
}

.main-box{
    margin-top: 15%;
    margin-left: 10%;
}


    </style>
</head>
<body>
    <div id="app">

        <main class="d-flex">
            <div>
               @guest

                        @else
                <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; min-height:100vh;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Spite Package</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="{{route('home')}}" class="nav-link text-white" aria-current="page">
          <svg class="bi me-2" width="16" height="16"></svg>
          <i class="fa-solid fa-house"></i> Home
        </a>
      </li>
      <li>
        <a href="{{ route('users.index') }}" class="nav-link text-white">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
         <i class="fa-solid fa-user"></i> Manage Users
        </a>
      </li>
      <li>
        <a href="{{ route('roles.index') }}" class="nav-link text-white">

          <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
         <i class="fa-brands fa-critical-role"></i> Manage Role
        </a>
      </li>
      <li>
        <a href="{{ route('products.index') }}" class="nav-link text-white">

          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
         <i class="fa-brands fa-product-hunt"></i> Manage Product
        </a>
      </li>

    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">

        <strong>{{ Auth::user()->name }}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">

        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
      </ul>
    </div>
  </div>
  @endguest
     </div>

           <div class="container mx-2">
            @yield('content')
            </div>
        </main>
    </div>

    <script src="https://kit.fontawesome.com/df6a46c35c.js" crossorigin="anonymous"></script>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
