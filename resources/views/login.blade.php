<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login | Researchers' Repo</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">


  <!-- Favicons -->
  <link href="{{ asset('assets/img/web-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/web-logo.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">

</head>

<body>

<header id="header" class="header sticky-top">

<div class="branding d-flex align-items-cente">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">

      <img src="assets/img/web-logo.png" alt=""> 
      <h1 class="sitename">MSU-IIT Researchers' Repo</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://myiit.msuiit.edu.ph/accounts/getmyiit.php" target="_blank">My.IIT</a></li>
        <li><a href="{{ url('/login') }}" class="active">Login</a></li>
            </li>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>

<main class="main">

  <div class="card-login mt-5 col-lg-6">
       <div class="main-login main-center">

        <br>

        <img src="assets/img/web-logo.png" alt="logo" class="logo"/></img>
        <h5>Login Here</h5>

        <div class="form-group ">
          
    <!-- Alerts for success messages (e.g., registration success or email verified) -->
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- Alerts for login errors or other general errors -->
    @if(session('error'))
        <div class="alert alert-danger">
            <li> {{ session('error') }} </li>
        </div>
    @endif

    <!-- Alerts for validation errors (e.g., email, password, etc.) -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <form action="{{ route('login') }}" method="POST" autocomplete="on">
        @csrf  <!-- Add this line to include CSRF token -->
        
        <div class="txt_field">
            <input type="text" name="email" id="email" required >
            <label><i class="fa fa-envelope fa"></i> My.IIT Email</label>
           </div>
     
          <div class="txt_field">
            <input type="password" name="password" id="password" required >
            <label><i class="fa fa-lock fa-lg"></i> Password</label>
          </div>

          <input type="submit" value="Login" class="form-control btn btn-primary">
 
        </form>

        <p>Didn't have an account? <a class="register" href="{{ url('/register') }}">Register</a></p>

      <br>

      </div>
    </div>

  </main>
              


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <!-- email validator function -->
  <script src="{{ asset('assets/js/authentication.js') }}"></script>

<!-- Bootstrap JS and Popper.js -->
<script src="assets/vendor/popperjs/popperjs.js"></script>
<script src="assets/vendor/popperjs/popperjsbootstrap.js"></script>
</body>

</html>