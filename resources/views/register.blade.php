<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register | Researchers' Repo</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/web-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/web-logo.png') }}" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/register.css') }}" rel="stylesheet">

</head>

<body>

<header id="header" class="header sticky-top">

<div class="branding d-flex align-items-cente">

  <div class="container position-relative d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">

      <img src="{{ asset('assets/img/web-logo.png') }}" alt=""> 
      <h1 class="sitename">MSU-IIT Researchers' Repo</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="https://myiit.msuiit.edu.ph/accounts/getmyiit.php" target="_blank">My.IIT</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
            </li>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

  </div>

</div>

</header>


  <main class="main">

  <div class="card-register mt-5 col-lg-6">
       <div class="main-login main-center">

      <br>

        <img src="{{ asset('assets/img/web-logo.png') }}" alt="logo" class="logo"/></img>
        <h5>Activate MSU-IIT Researchers' Repo account</h5>
        <p class="registration-description">This registration feature is exclusively available to MSU-IIT researchers. Please use your My.IIT Gmail account to register.</p>

        <div class="form-group ">

          <!-- Display Validation Errors -->
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
        <form action="{{ route('register') }}" method="POST" autocomplete="on">
        @csrf 
   
        <label class="col-form-label">Center/Laboratory/Office/Department Assigned <br> <span style="color:#a41d21; font-size: 11px">(If your center is not in the list, leave it blank you can edit it later after the admin update the centers list)</span></label>
            <div class="col-sm">
                <select class="form-select" aria-label="Default select example" id="centerlab" name="centerlab">
                <option value="">- - No Center/Lab/Office/Department yet - -</option>
                @foreach($centers as $center)
                <option value="{{ $center->cid }}">{{ $center->c_name }}</option>
                @endforeach
                </select>
        </div> 

            <div class="txt_field">
            <input type="text" name="first_name" id="first_name" required >
            <label for="f_name"> <i class="fa fa-user fa"></i> Input First Name</label>
           </div>
   
            <div class="txt_field">
             <input type="text" name="last_name" id="last_name" required >
             <label><i class="fa fa-user fa"></i> Input Last Name</label>
            </div>

          <div class="txt_field">
            <input type="text" name="email" id="email" required >
            <label><i class="fa fa-envelope fa"></i> My.IIT Email</label>
           </div>
     
          <div class="txt_field">
            <input type="password" name="password" id="password" required >
            <label><i class="fa fa-lock fa-lg"></i> Password</label>
          </div>

        <!-- Password confirmation field -->
        <div class="txt_field">
                  <input type="password" name="password_confirmation" id="password_confirmation" required>
                  <label><i class="fa fa-lock fa-lg"></i> Confirm Password</label>
        </div>

        <!-- Password mismatch message -->
        <p id="password-error">Passwords do not match.</p>

           

          <input type="submit" value="Register" class="form-control btn btn-primary">
 

           
        </form>

        <p>Already have an account? <a class="login" href="{{ url('/login') }}">Login</a></p>

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
<script src="{{ asset('assets/vendor/popperjs/popperjs.js') }}"></script>
<script src="{{ asset('assets/vendor/popperjs/popperjsbootstrap.js') }}"></script>


</body>

</html>

