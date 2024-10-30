<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Researchers' Repo</title>
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
		<img src="../assets/img/web-logo.png" alt="logo" class="nav-logo">
			<span class="text">MSU-IIT Researchers' Repo</span>
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
		<ul class="side-menu">
			<li>
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
		</nav>
		<!-- NAVBAR -->

@if(session()->has('user_id'))


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
// Object to hold time ranges and their corresponding background images
const backgrounds = {
    morning: 'url(../assets/img/userdashboard/dashboard1.jpg)',   // 6:01 AM - 12:00 PM
    afternoon: 'url(../assets/img/userdashboard/dashboard2.jpg)', // 12:01 PM - 6:00 PM
    evening: 'url(../assets/img/userdashboard/dashboard3.jpg)',     // 6:01 PM - 12:00 AM
    night: 'url(../assets/img/userdashboard/dashboard4.jpg)'          // 12:01 AM - 6:00 AM
};

// Function to change the background based on the current time
function changeBackground() {
    const currentHour = new Date().getHours();

    let backgroundImage;

    // Determine which background image to use based on the current hour
    if (currentHour >= 6 && currentHour < 12) { // Morning: 6:01 AM - 12:00 PM
        backgroundImage = backgrounds.morning;
    } else if (currentHour >= 12 && currentHour < 18) { // Afternoon: 12:01 PM - 6:00 PM
        backgroundImage = backgrounds.afternoon;
    } else if (currentHour >= 18 && currentHour < 24) { // Evening: 6:01 PM - 12:00 AM
        backgroundImage = backgrounds.evening;
    } else { // Night: 12:01 AM - 6:00 AM
        backgroundImage = backgrounds.night;
    }

    document.getElementById('dashboard-user').style.backgroundImage = backgroundImage;
}

// Change background on page load
changeBackground();

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