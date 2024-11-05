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

	<!-- bootstrap css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
		<a href="{{ route('admin.dashboard') }}" class="brand">
		<img src="../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
			<span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.research') }}">
					<i class='bx bx-file-find' ></i>
					<span class="text">Research</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('admin.publication') }}">
					<i class='bx bx-globe' ></i>
					<span class="text">Publication</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.presentation') }}">
					<i class='bx bx-spreadsheet' ></i>
					<span class="text">Presentation</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.documentation') }}">
					<i class='bx bx-library' ></i>
					<span class="text">Documentation</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.team') }}">
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


		<main id="main">

	<!-- Datatable for admin -->
		<div class="card">
            <div class="card-body">
            <h4 class="card-title">Admin's Publications </h4> <br>
			<div class="table-responsive-md">
            <table class="table table-admin-publications">
                <thead>
                  <tr>
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th> 
					<th>Publications</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($adminPublications as $adminpub)
                <tr>

                <td>{{ $adminpub->uid }}</td>
                <td>{{ $adminpub->first_name }}</td>
                <td>{{ $adminpub->last_name }}</td>
                <td>{{ $adminpub->email }}</td>
                <td>{{ $adminpub->publication_count }}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
		</div>
		</div>
	</div>

	<br>

    <!-- DataTable for users -->
	<div class="card">
    <div class="card-body">
        <h4 class="card-title">Users' Publications </h4> <br>
		<div class="table-responsive-md">
            <table class="table table-users-publications">
                <thead>
                  <tr>
					
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th> 
					<th>Publications</th>

                  </tr>
                </thead>
                <tbody>
				@foreach($usersPublications as $userpub)
                <tr>

                <td>{{ $userpub->uid }}</td>
                <td>{{ $userpub->first_name }}</td>
                <td>{{ $userpub->last_name }}</td>
                <td>{{ $userpub->email }}</td>
                <td>{{ $userpub->publication_count }}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
		</div>
		</div>
	</div>

@else
<p>No user is logged in.</p>
@endif

	</main>
</section>

<!-- side-nav JS -->
<script src="../side-nav/script.js"></script>

<!-- Include jQuery -->
<script src="../assets/vendor/jquery/jquery.js"></script>

<!-- data tables js -->
<script src="../assets/vendor/datatables/jquery.datatables.js"></script>
<script src="../assets/vendor/datatables/datatables.bootstrap4.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>

<script>
        $(document).ready(function() {
            $('.table-admin-publications').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
				"columnDefs": [
				{ "width": "10%", "targets": 0 }, // User ID
				{ "width": "15%", "targets": 1 }, // First Name
				{ "width": "15%", "targets": 2 }, // Last Name
				{ "width": "40%", "targets": 3 }, // Email
				{ "width": "20%", "targets": 4 }, // count
			],
			"order": [[0, 'desc']]
            });
        });
    </script>

<script>
        $(document).ready(function() {
            $('.table-users-publications').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
				"columnDefs": [
				{ "width": "10%", "targets": 0 }, // User ID
				{ "width": "15%", "targets": 1 }, // First Name
				{ "width": "15%", "targets": 2 }, // Last Name
				{ "width": "40%", "targets": 3 }, // Email
				{ "width": "20%", "targets": 4 }, // count
			],
			"order": [[0, 'desc']]
            });
        });
    </script>

</body>

</html>