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
        <a href="{{ route('users.dashboard') }}" class="brand">
            <img src="{{ asset('assets/img/msuiit-logo.png') }}" alt="logo" class="nav-logo">
            <span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('users.dashboard') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('users.research') }}"><i class='bx bx-file-find'></i><span class="text">Research</span></a></li>
            <li><a href="{{ route('users.publication') }}"><i class='bx bx-globe'></i><span class="text">Publication</span></a></li>
            <li><a href="{{ route('users.presentation') }}"><i class='bx bx-spreadsheet'></i><span class="text">Presentation</span></a></li>
            <li><a href="{{ route('users.documentation') }}"><i class='bx bx-library'></i><span class="text">Documentation</span></a></li>
            <li class="active"><a href="{{ route('users.team') }}"><i class='bx bxs-group'></i><span class="text">Team</span></a></li>
        </ul>

    </section>
    <!-- SIDEBAR -->

 @if(isset($user))

    <!-- CONTENT -->
    <section id="content" style="overflow: hidden;">
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

<h4>The Researchers </h4>
<br>

<div class="container-fluid">
<div class="col-lg-7">
  <div class="card" id="personal-info-team">
    <div class="card-body">
      <h5 class="card-title">Personal Information</h5>
    <hr>
    <!-- Edit Button -->
    <button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPersonalModal{{ $user->uid }}">
		Edit Information
    </button>
    <br><br>

      <div class="row mb-2">
        <label class="col-sm-2 col-form-label"><b>Email:</b></label>
        <div class="col-sm-10">
          <p class="form-control-plaintext">{{ $user->email }}</p>
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-sm-2 col-form-label"><b>First Name:</b></label>
        <div class="col-sm-10">
          <p class="form-control-plaintext">{{ $user->first_name }}</p>
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-sm-2 col-form-label"><b>Last Name:</b></label>
        <div class="col-sm-10">
          <p class="form-control-plaintext">{{ $user->last_name }}</p>
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-sm-2 col-form-label"><b>Center:</b></label>
        <div class="col-sm-10">
          <p class="form-control-plaintext">{{ $user->center_name }}</p>
        </div>
      </div>

      <div class="row mb-2">
        <label class="col-sm-2 col-form-label"><b>Created:</b></label>
        <div class="col-sm-10">
          <p class="form-control-plaintext">{{ $user->created_at }}</p>
        </div>
      </div>
    </div>
  </div>
</div>


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
</div>

<br>
<hr>
<br>

<div class="container-fluid">
    <!-- DataTable -->
	<div class="card">
        <div class="card-body">
         <h4 class="card-title">Researchers List & Uploads</h4><br>
			<div class="table-responsive">
            <table class="table table-team" id="user-team-table">
                <thead>
                <tr>
                <th>Name</th>
                <th>Center</th>
                <th>Research</th>
                <th>Publication</th>
                <th>Presentation</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($users_data as $user)
                <tr>

                    <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                    <td>{{ $user->center_name ?? 'Not yet Assigned' }}</td>
                    <td style="color: #a41d21; font-weight:500">
                        
                        {{ $user->research_count }} <i> uploads</i>

                    </td>
                    <td style="color: #a41d21; font-weight:500">
                        
                        {{ $user->publication_count }} <i> uploads</i>

                    </td>
                    <td style="color: #a41d21; font-weight:500">

                       {{ $user->presentation_count }} <i> uploads</i>

                    </td>

                </tr>
            @endforeach

                </tbody>
            </table>
		    </div>
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
