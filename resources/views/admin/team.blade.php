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
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <img src="../assets/img/web-logo.png" alt="logo" class="nav-logo">
            <span class="text">MSU-IIT Researchers' Repo</span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin.dashboard') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('admin.research') }}"><i class='bx bx-file-find'></i><span class="text">Research</span></a></li>
            <li><a href="{{ route('admin.publication') }}"><i class='bx bx-globe'></i><span class="text">Publication</span></a></li>
            <li><a href="{{ route('admin.presentation') }}"><i class='bx bx-spreadsheet'></i><span class="text">Presentation</span></a></li>
            <li><a href="{{ route('admin.documentation') }}"><i class='bx bx-library'></i><span class="text">Documentation</span></a></li>
            <li class="active"><a href="{{ route('admin.team') }}"><i class='bx bxs-group'></i><span class="text">Team</span></a></li>
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
            <h4 class="card-title">Research Team  (Verified) </h4><br>
			<div class="table-responsive-md">
            <table class="table table-team">
                <thead>
                  <tr>
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th>Email Status</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($users_data_yes as $user_y)
                <tr>

                <td>{{ $user_y->uid }}</td>
                <td>{{ $user_y->first_name }}</td>
                <td>{{ $user_y->last_name }}</td>
                <td>{{ $user_y->email }}</td>
                <td>{{ $user_y->created_at }}</td>
                <td>{{ $user_y->email_status }}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
		</div>
		</div>
	</div>

    <br>

    <!-- DataTable -->
	<div class="card">
        <div class="card-body">
         <h4 class="card-title">Research Team Applicants (Email not verified) </h4><br>
			<div class="table-responsive-md">
            <table class="table table-team">
                <thead>
                  <tr>
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                    <th>Email Status</th>
					<th>Action</th> 
                  </tr>
                </thead>
                <tbody>
				@foreach($users_data_no as $user)
                <tr>
                <td>{{ $user->uid }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->email_status }}</td>
				<td>
                <!-- Edit Button to trigger SweetAlert -->
                <a id="verify-btn" href="javascript:void(0);" class="btn btn-outline btn-sm"
                   onclick="verifyUser({{ $user->uid }})">Verify</a>
           		 </td>
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
				"columnDefs": [
				{ "width": "5%", "targets": 0 }, // User ID
				{ "width": "15%", "targets": 1 }, // First Name
				{ "width": "15%", "targets": 2 }, // Last Name
				{ "width": "30%", "targets": 3 }, // Email
				{ "width": "25%", "targets": 4 }, // Reg Date
				{ "width": "10%", "targets": 5 }  // Email Status
			],
			"order": [[0, 'desc']]
            });
        });
    </script>

<script>
    function verifyUser(uid) {
        // SweetAlert confirmation before verifying user
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to verify this user Email Address!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, verify it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: '#ffc107', 
            cancelButtonColor: '#a41d21', 
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with the action if the user clicks "Yes, verify it!"
                $.ajax({
                    url: "{{ url('admin/team/edit') }}/" + uid,
                    method: "GET",
                    success: function(response) {
                        // Show success alert with SweetAlert
                        Swal.fire({
                            title: 'Verified!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#ffc107', 
                        }).then(() => {
                            // Reload the page after successful verification
                            window.location.href = "{{ route('admin.team') }}"; // Reload the current page
                        });
                    },
                    error: function() {
                        // In case of error, show an error alert
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#a41d21', 
                        });
                    }
                });
            } else {
                // If canceled, show a cancellation alert
                Swal.fire({
                    title: 'Cancelled',
                    text: 'The user Email Address was not verified.',
                    icon: 'info',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#ffc107',
                });
            }
        });
    }
</script>


</body>
</html>
