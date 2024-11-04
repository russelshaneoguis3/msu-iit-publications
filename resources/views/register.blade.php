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

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/register.css" rel="stylesheet">

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

        <img src="assets/img/web-logo.png" alt="logo" class="logo"/></img>
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

        <div class="form-floating mb-3">
                      <select class="form-select form-select-sm" name="centerlab" id="centerlab" aria-label="Floating label select example" required> 
                        <option value="">- - Click here to select center/laboratory - -</option>
                        <option value="Marine Biodiversity Laboratory">Marine Biodiversity Laboratory</option>
                        <option value="Terrestrial and Freshwater Biodiversity Laboratory">Terrestrial and Freshwater Biodiversity Laboratory</option>
                        <option value="Center for Advanced Functional Materials and Nanotechnology">Center for Advanced Functional Materials and Nanotechnology</option>
                        <option value="Oceanography Laboratory">Oceanography Laboratory</option>
                        <option value="Flora Biodiversity Laboratory">Flora Biodiversity Laboratory</option>
                        <option value="Mindanao Center for High Performance Computing">Mindanao Center for High Performance Computing</option>
                        <option value="Climate Change Laboratory">Climate Change Laboratory</option>
                        <option value="Animal Ecology Laboratory">Animal Ecology Laboratory</option>
                        <option value="Microbial Culture Collection (Room 1)">Microbial Culture Collection (Room 1)</option>
                        <option value="Microbial Culture Collection (Room 2)">Microbial Culture Collection (Room 2)</option>
                        <option value="Decontamination Room">Decontamination Room</option>
                        <option value="Genomics and Proteomics Laboratory">Genomics and Proteomics Laboratory</option>
                        <option value="Molecular Ecology and Physiology Laboratory">Molecular Ecology and Physiology Laboratory</option>
                        <option value="Mindanao Radiation Physics Center">Mindanao Radiation Physics Center</option>
                        <option value="PV Cells Testing Laboratory">PV Cells Testing Laboratory</option>
                        <option value="Thermal Spray and Condensed Matter Laboratory">Thermal Spray and Condensed Matter Laboratory</option>
                        <option value="Materials Characterization Laboratory">Materials Characterization Laboratory</option>
                        <option value="Microscopy Biological Room">Microscopy Biological Room</option>
                        <option value="Soft Matter Synthesis and Testing Laboratory">Soft Matter Synthesis and Testing Laboratory</option>
                        <option value="Biological Physics Laboratory">Biological Physics Laboratory</option>
                        <option value="Product Testing and Instrumentation Laboratory">Product Testing and Instrumentation Laboratory</option>
                        <option value="Organic Nanomaterials Processing Laboratory">Organic Nanomaterials Processing Laboratory</option>
                        <option value="Inorganic Nanomaterials Processing Laboratory">Inorganic Nanomaterials Processing Laboratory</option>
                        <option value="Spectroscopy Laboratory 1">Spectroscopy Laboratory 1</option>
                        <option value="Spectroscopy Laboratory 2">Spectroscopy Laboratory 2</option>
                        <option value="Chromatography Laboratory">Chromatography Laboratory</option>
                        <option value="Cell Culture and Cell-Based Assay Laboratory">Cell Culture and Cell-Based Assay Laboratory</option>
                        <option value="Natural Products and Related Researches Laboratory">Natural Products and Related Researches Laboratory</option>
                        <option value="Drug Design and Development Related Researches Laboratory">Drug Design and Development Related Researches Laboratory</option>
                        <option value="Bio-inorganic and Related Researches Laboratory">Bio-inorganic and Related Researches Laboratory</option>
                        <option value="Electroanalytical and Thermal Researches Laboratory">Electroanalytical and Thermal Researches Laboratory</option>
                        <option value="Center for Computational Analytics and Modelling">Center for Computational Analytics and Modelling</option>
                        <option value="Center for Graph Theory, Algera and Analysis">Center for Graph Theory, Algera and Analysis</option>
                        <option value="Laboratory of Theoritical and Computational Chemistry">Laboratory of Theoritical and Computational Chemistry</option>
                        <option value="Others or Not in PRISM">Others or Not in PRISM</option>
                      </select>
                      <label for="floatingSelect">Center/Laboratory Assigned</label>
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

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>

