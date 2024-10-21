<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication | Researchers' Repo</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	 <!-- Favicons -->
	<link href="{{ asset('../assets/img/web-logo.png') }}" rel="icon">
  	<link href="{{ asset('../assets/img/web-logo.png') }}" rel="apple-touch-icon">

    <!-- Boxicons -->
	<link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

		 <!-- bootstrap css -->
		 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<!-- Include jQuery -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

		<!-- Include the DataTables library -->
		<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

		<!-- Include the DataTables Bootstrap 4 integration library -->
		<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

		<!-- Include the DataTables Bootstrap 4 stylesheet -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

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
			<li>
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
			<li class="active">
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


		<main id ="main">

		<h1>users Publication</h1>

		@if(session()->has('user_id'))
			<p><strong>Logged in User ID:</strong> {{ session('user_id') }}</p>
		@else
			<p>No user is logged in.</p>
		@endif

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		br>
		<br>
		<br>
		<br>
		br>
		<br>
		<br>
		<br>

		<br>
		<br>
		<br>
		<br><br>
		<br>
		<br>
		<br>
		<br>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>






		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>




		<br>
		<br>




		<br>
		<br>



		ad
		</main>
 
</body>

<script src="../side-nav/script.js"></script>

</html>