<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team | Researchers' Repo</title>
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
    @csrf <!-- CSRF token -->

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="{{ route('users.dashboard') }}" class="brand">
            <img src="../assets/img/web-logo.png" alt="logo" class="nav-logo">
            <span class="text">MSU-IIT Researchers' Repo</span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('users.dashboard') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('users.research') }}"><i class='bx bx-file-find'></i><span class="text">Research</span></a></li>
            <li><a href="{{ route('users.publication') }}"><i class='bx bx-globe'></i><span class="text">Publication</span></a></li>
            <li><a href="{{ route('users.presentation') }}"><i class='bx bx-spreadsheet'></i><span class="text">Presentation</span></a></li>
            <li><a href="{{ route('users.documentation') }}"><i class='bx bx-library'></i><span class="text">Documentation</span></a></li>
            <li class="active"><a href="{{ route('users.team') }}"><i class='bx bxs-group'></i><span class="text">Team</span></a></li>
        </ul>
        <ul class="side-menu">
            <li><a href="{{ route('logout') }}" class="logout"><i class='bx bxs-log-out-circle'></i><span class="text">Logout</span></a></li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    @if(isset($user))

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
        </nav>
        <!-- NAVBAR -->

        <main id="main">

            <!-- DataTable -->
			<div class="card">
            <div class="card-body">
            <h4 class="card-title">The Researchers </h4> <br>
			<div class="table-responsive-md">
            <table class="table table-team">
                <thead>
                  <tr>

                    <th> Name </th>
					<th>Publications </th>
					<th>Researches </th>
					<th>Presentation </th>
					<th>Documents </th>
                  </tr>
                </thead>
                <tbody>
				@foreach($users_data as $user)
                <tr>
                <td>{{ $user->last_name . ', ' . $user->first_name }}</td>
				<td>{{ $user->publication_count }}</td>
				<td>{{ $user->research_count}}</td>
				<td>{{ $user->presentation_count }}</td>
				<td>{{ $user->documentation_count }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
		</div>
		</div>
	</div>


</main>
</section>
@else
<p>No user is logged in.</p>
@endif

<!-- side-nav JS -->
 <script src="../side-nav/script.js"></script>

<!-- Include jQuery -->
<script src="../assets/vendor/jquery/jquery.js"></script>

<!-- data tables js -->
<script src="../assets/vendor/datatables/jquery.datatables.js"></script>
<script src="../assets/vendor/datatables/datatables.bootstrap4.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>

<!-- DataTable Initialization -->
    <script>
        $(document).ready(function() {
            $('.table-team').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
				"order": [[0, 'desc']]
            });
        });
    </script>

</body>
</html>
