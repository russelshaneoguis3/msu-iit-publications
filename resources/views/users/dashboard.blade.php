<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSU-IIT Researchers' Repo</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	 <!-- Favicons -->
	 <link href="{{ asset('../assets/img/web-logo.png') }}" rel="icon">
  	<link href="{{ asset('../assets/img/web-logo.png') }}" rel="apple-touch-icon">

	<!-- bootstrap css -->
	<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons -->
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Include the DataTables library -->
    <link rel="stylesheet" href="../assets/vendor/datatables/datatables.bootstrap4.css">

	<!-- Include SweetAlert -->
	<link href="../assets/vendor/sweetalert/sweetalert.css" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="../side-nav/side-nav.css">
	<link rel="stylesheet" href="../general/style.css">

</head>
<body>
@csrf  <!-- CSRF token -->

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('users.dashboard') }}" class="brand">
		<img src="../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
			<span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('users.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('users.research') }}">
					<i class='bx bx-file-find' ></i>
					<span class="text">Research</span>
				</a>
			</li>
			<li>
				<a href="{{ route('users.publication') }}">
					<i class='bx bx-globe' ></i>
					<span class="text">Publication</span>
				</a>
			</li>
			<li>
				<a href="{{ route('users.presentation') }}">
					<i class='bx bx-spreadsheet' ></i>
					<span class="text">Presentation</span>
				</a>
			</li>
			<li>
				<a href="{{ route('users.documentation') }}">
					<i class='bx bx-library' ></i>
					<span class="text">Documentation</span>
				</a>
			</li>
			<li>
				<a href="{{ route('users.team') }}">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>

	</section>
	<!-- SIDEBAR -->


@if(isset($user))

	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>

		 <!-- Clickable object -->
		<div class="profile-dropdown" onclick="toggleDropdown()">
        {{ $user->first_name }} <i class='bx bxs-chevron-down' ></i>
        <!-- Dropdown options -->
        <div class="profile-dropdown-content">
			<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
			</a>
        </div>
    </div>
		</nav>
		<!-- NAVBAR -->



		<main id ="main">

		<div id="dashboard-user" class="dashboard-user">
		<h1>Welcome to the Dashboard</h1>
		<p>Your content goes here.</p>
		<p><strong>Logged in User ID:</strong> {{ session('user_id') }}</p>


		</div>


@else
<p>No user is logged in.</p>
@endif

</main>

<script>

// Array of background images (you should update the image paths to match your actual image filenames)
const backgrounds = [
    'url(../assets/img/userdashboard/dashboard1.jpg)',
    'url(../assets/img/userdashboard/dashboard2.jpg)',
    'url(../assets/img/userdashboard/dashboard3.jpg)',
    'url(../assets/img/userdashboard/dashboard4.jpg)',
    'url(../assets/img/userdashboard/dashboard5.jpg)',
    'url(../assets/img/userdashboard/dashboard6.jpg)',
    'url(../assets/img/userdashboard/dashboard7.jpg)',
    'url(../assets/img/userdashboard/dashboard8.jpg)',
    'url(../assets/img/userdashboard/dashboard9.jpg)',
    'url(../assets/img/userdashboard/dashboard10.jpg)',
    'url(../assets/img/userdashboard/dashboard11.jpg)',
    'url(../assets/img/userdashboard/dashboard12.jpg)',
    'url(../assets/img/userdashboard/dashboard13.jpg)',
    'url(../assets/img/userdashboard/dashboard14.jpg)',
    'url(../assets/img/userdashboard/dashboard15.jpg)',
    'url(../assets/img/userdashboard/dashboard16.jpg)',
    'url(../assets/img/userdashboard/dashboard17.jpg)',
    'url(../assets/img/userdashboard/dashboard18.jpg)',
    'url(../assets/img/userdashboard/dashboard19.jpg)',
    'url(../assets/img/userdashboard/dashboard20.jpg)',
    'url(../assets/img/userdashboard/dashboard21.jpg)',
    'url(../assets/img/userdashboard/dashboard22.jpg)',
    'url(../assets/img/userdashboard/dashboard23.jpg)',
    'url(../assets/img/userdashboard/dashboard24.jpg)',
    'url(../assets/img/userdashboard/dashboard25.jpg)',
	'url(../assets/img/userdashboard/dashboard26.jpg)',
	'url(../assets/img/userdashboard/dashboard27.jpg)',
	'url(../assets/img/userdashboard/dashboard28.jpg)',
	'url(../assets/img/userdashboard/dashboard29.jpg)',
	'url(../assets/img/userdashboard/dashboard30.jpg)'
];

// Function to pick a random background image
function getRandomBackground() {
    const randomIndex = Math.floor(Math.random() * backgrounds.length);
    return backgrounds[randomIndex];
}

// Function to change the background
function changeBackground() {
    const newBackgroundImage = getRandomBackground();
    document.getElementById('dashboard-user').style.backgroundImage = newBackgroundImage;
}

// Change background on page load
changeBackground();

// Set an interval to change the background every 5 minutes (300,000 ms)
setInterval(changeBackground, 300000);

</script>

</body>

</section>

<!-- side-nav JS -->
<script src="../side-nav/script.js"></script>

<!-- Include jQuery -->
<script src="../assets/vendor/jquery/jquery.js"></script>

<!-- Bootstrap JS and Popper.js -->
<script src="../assets/vendor/popperjs/popperjs.js"></script>
<script src="../assets/vendor/popperjs/popperjsbootstrap.js"></script>

<!-- data tables js -->
<script src="../assets/vendor/datatables/jquery.datatables.js"></script>
<script src="../assets/vendor/datatables/datatables.bootstrap4.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>

</html>