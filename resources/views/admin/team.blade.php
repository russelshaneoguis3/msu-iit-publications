<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team | Researchers' Repo</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

	 <!-- Favicons -->
	 <link href="{{ asset('assets/img/web-logo.png') }}" rel="icon">
  	<link href="{{ asset('assets/img/web-logo.png') }}" rel="apple-touch-icon">

	<!-- bootstrap css -->
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Boxicons -->
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <!-- Include the DataTables library -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/datatables.bootstrap4.css') }}">

	<!-- Include SweetAlert -->
	<link href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('side-nav/side-nav.css') }}">
	<link rel="stylesheet" href="{{ asset('general/style.css') }}">


</head>
<body>
    @csrf <!-- CSRF token -->

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <img src="{{ asset('assets/img/msuiit-logo.png') }}" alt="logo" class="nav-logo">
            <span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin.dashboard') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('admin.research') }}"><i class='bx bx-file-find'></i><span class="text">Research</span></a></li>
            <li><a href="{{ route('admin.publication') }}"><i class='bx bx-globe'></i><span class="text">Publication</span></a></li>
            <li><a href="{{ route('admin.presentation') }}"><i class='bx bx-spreadsheet'></i><span class="text">Presentation</span></a></li>
            <li><a href="{{ route('admin.documentation') }}"><i class='bx bx-library'></i><span class="text">Documentation</span></a></li>
            <li class="active"><a href="{{ route('admin.team') }}"><i class='bx bxs-group'></i><span class="text">Team</span></a></li>
            <li><a href="{{ route('admin.center') }}"><i class='bx bx-home'></i><span class="text">Center</span></a></li>
        </ul>

    </section>
    <!-- SIDEBAR -->

@if(isset($user))

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>

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

<!-- Edit Personal Details Modal -->
<div class="modal fade edit-modal" id="editPersonalModal{{ $user->uid }}" tabindex="-1" aria-labelledby="editPersonalModalLabel{{ $user->uid }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPersonalModalLabel{{ $user->uid }}" style="color: #ffffff">Edit Personal Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.updatePersonal', $user->uid) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="first_name">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                    </div><br>

                    <!-- First Name Input -->
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $user->first_name }}" required>
                    </div><br>

                    <!-- Last Name Input -->
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $user->last_name }}" required>
                    </div><br>

                    <!-- Center Assigned Dropdown -->
                    <div class="form-group">
                        <label for="centerlab">Center Assigned</label>
                        <select class="form-select" id="centerlab" name="centerlab" required>
                        <option value="">- - No Center/Lab/Office/Department yet - -</option>
                            @foreach($centers as $center)
                                <option value="{{ $center->cid }}" 
                                    @if($center->cid == $user->centerlab) selected @endif>
                                    {{ $center->c_name }}
                                </option>
                            @endforeach
                        </select>
                    </div><br>
                </div>
                <div class="modal-footer" style="background-color: #f9f5fc">
                    <button type="button" id="updatebtn-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- DataTable -->
	<div class="card">
        <div class="card-body">
            <h4 class="card-title">Research Team  (Verified) </h4><br>

            <!-- Edit Button -->
            <button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPersonalModal{{ $user->uid }}">
                Edit Admin Info
            </button>
            <br><br>

			<div class="table-responsive">
            <table class="table table-team">
                <thead>
                  <tr>
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Center Assigned</th>
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
                <td>{{ $user_y->center_name ?? 'Not Assigned' }}</td>
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
			<div class="table-responsive">
            <table class="table table-team">
                <thead>
                  <tr>
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Center Assigned</th>
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
                <td>{{ $user->center_name ?? 'Not Assigned' }}</td>

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
<script src="{{ asset('side-nav/script.js') }}"></script>

<!-- Include jQuery -->
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>

<!-- Bootstrap JS and Popper.js -->
<script src="{{ asset('assets/vendor/popperjs/popperjs.js') }}"></script>
<script src="{{ asset('assets/vendor/popperjs/popperjsbootstrap.js') }}"></script>

<!-- data tables js -->
<script src="{{ asset('assets/vendor/datatables/jquery.datatables.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/datatables.bootstrap4.js') }}"></script>

<!-- sweet alert JS -->
<script src="{{ asset('assets/vendor/sweetalert/sweetalert.js') }}"></script>


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
                        method: "PUT",
                        data: {
                            _token: "{{ csrf_token() }}",  // Add the CSRF token
                        },
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
                        error: function(xhr, status, error) {
                            // In case of error, show an error alert
                            console.log(xhr.responseText); // Check the response text in the console
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

<!-- SweetAlert for success messages -->
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        confirmButtonText: 'Okay',
        customClass: {
            confirmButton: 'btn-outline-custom' 
        },
        buttonsStyling: false // Disable default button styling
    });
</script>
@endif

</body>
</html>
