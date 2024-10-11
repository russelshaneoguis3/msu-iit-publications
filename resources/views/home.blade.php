<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MSU-IIT - Researchers' Repo</title>
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

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">

          <img src="assets/img/web-logo.png" alt=""> 
          <h1 class="sitename">MSU-IIT Researchers' Repo</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ url('/') }}" class="active">Home</a></li>
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

    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">

      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-8 text-center">
              <h3>MSU-IIT <span>Research, Publications, Presentations, and documentations</span> Repository</h3>
              <p>The MSU-IIT Research, Publications, Presentations, and Documentations Repository is a centralized digital platform that archives and provides access to academic research, scholarly publications, conference presentations, and institutional documentations produced by the MSU-IIT community.</p>
              <a href="{{ url('/register') }}" class="btn-get-started">Get Started / Register</a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-2.jpeg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.png" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-4.jpg" alt="">
        </div>

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 2">
            <img src="assets/img/about-iit.png" class="img-fluid" alt="iit">
          </div>
          <div class="col-lg-6 content">
            <h3>What is MSU-IIT Researchers' Repo?</h3>
            <br>
            <p class="fst-italic">
              The repository is designed for contributions from the MSU-IIT community, including faculty and researchers.
            </p>
            <ul>
              <li><i class="bi bi-check2-all"></i> <span>The MSU-IIT Research, Publications, Presentations, and Documentations Repository is a centralized digital platform.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>It archives and provides access to Academic research, Scholarly publications, Conference presentations & Institutional documentations.</span></li>
              <li><i class="bi bi-check2-all"></i> <span>It serves as a valuable resource for facilitating knowledge sharing & promoting academic collaboration within and beyond the university.</span></li>
            </ul>
            <br>
            <p>
              Administrators will oversee and manage the uploads to ensure content quality and compliance.
            </p>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Research Clusters</h2>
        <p>Currently, for the advancement of the university, the researchers provide vast knowledge, insights and solutions in the 9 research clusters.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-people icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Culture, Technology, and Society</a></h4>
                <p class="description">This involves the integration of multiple disciplinary perspectives and methods to examine the complex interactions between culture, technology, and society. Such as Understanding the impacts of digital technologies on culture and society, Examining the social and cultural dimensions of artificial intelligence (AI), Analyzing the role of social media in shaping cultural identities and practices, Exploring the intersections of technology, culture, and environment, and Investigating the cultural and social dimensions of emerging technologies</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-peace icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Peace and Governance</a></h4>
                <p class="description">Studies in this cluster promote cross-disciplinary and collaborative research that can generate new knowledge, insights, and solutions to complex societal problems. Such as Conflict resolution and Peacebuilding, Human rights and social justice, Governance and public policy, Peace Education and conflict transformation, Gender, peace, and security, Youth, peace, and security, and Transitional Justice</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-recycle icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Integrative Resiliency and Sustainable Solutions</a></h4>
                <p class="description">Research studies under this cluster develop a holistic and multidisciplinary approach to enhancing the resilience and sustainability of social, economic, and environmental systems. Such as Biodiversity and Conservation Management, Sustainable development and management, Climate change adaptation and mitigation, Food Security, Disaster risk reduction and management, Urban and rural sustainability, and Sustainable business and industry</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-lightbulb icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Disruptive Innovation and Smart Nation</a></h4>
                <p class="description">Research here requires integrative efforts to support the development of smart, sustainable, and resilient communities. Such as Disruptive Technologies include artificial intelligence, blockchain, the Internet of Things (IoT), and robotics, Digital Governance, Smart Urbanization, Disruptive Business Models, and Digital Transformation.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-bar-chart-line icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a  class="stretched-link">Applied and Theoretical Science</a></h4>
                <p class="description">This involves understanding natural phenomena and improving the ability to solve practical problems using science and mathematics. Such as Computational science, Environmental science and sustainability, Biomedical science and engineering, and Mathematical modeling and analysis.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-pen icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a  class="stretched-link">Teaching and Learning</a></h4>
                <p class="description">Research studies under this cluster aim to explore the complex interplay between the human brain and learning processes. Such as Learning Theories and Cognitive Processes, Instructional Design and Technology, Cognitive Psychology and Emotion in Education, Special Education and Rehabilitation, and Pedagogical innovations</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-suit-club icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Natural Products and Biotechnology</a></h4>
                <p class="description">Research studies under this cluster explore the potential of natural products for developing new biotechnological products and processes. Such as Ethnobotany and integrative health, Discovery and identification of new natural products, Biosynthesis of natural products, Bioprocessing of natural products, Biomedical applications of natural products, and Environmental applications of natural products</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-cash-coin icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Financial and Risk Management</a></h4>
                <p class="description">Research studies that fall under this category develop more effective strategies for managing and generating new insights and strategies for managing financial risks in a rapidly changing global landscape. Such as Quantitative risk modeling, Behavioral finance, Cybersecurity and financial crime, Environmental and social risk management, and Strategic risk management</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex position-relative h-100">
              <i class="bi bi-calendar4-week icon flex-shrink-0"></i>
              <div>
                <h4 class="title"><a class="stretched-link">Materials Science</a></h4>
                <p class="description">Studies here develop and generate new materials with improved properties and functionalities for various applications. Such as, Nanomaterials, Biomaterials, Smart materials, Energy materials, Functional materials, and Computational materials science. Such as Nanomaterials, Biomaterials, Smart materials, Energy materials, Functional materials, and Computational materials science
                </p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    <p class="container">
      <h3 class="sitename">MSU-IIT Researchers' Repo</h3>

      <p>Mindanao State University
      Iligan Institute of Technology
      <br>
      Andres Bonifacio Avenue, Tibanga,
      9200 Iligan City, Philippines
      <br>
      Telephone: +63 (063) 221-4056</p>
      
      
      <div class="container">
        <div class="copyright">
          <span style="color:#fff">&copy;</span> <strong style="color:#fff" class="px-1 sitename">CCAM, PRISM, MSU-IIT</strong> <span style="color:#fff">All Rights Reserved</span>
        </div>
        <div class="credits" style="color:#fff">

          Designed by BootstrapMade, customized by CCAM
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>