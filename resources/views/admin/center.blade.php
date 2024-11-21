<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center | Researchers' Repo</title>
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
    @csrf <!-- CSRF token -->

    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="brand">
            <img src="../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
            <span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
        </a>
        <ul class="side-menu top">
            <li><a href="{{ route('admin.dashboard') }}"><i class='bx bxs-dashboard'></i><span class="text">Dashboard</span></a></li>
            <li><a href="{{ route('admin.research') }}"><i class='bx bx-file-find'></i><span class="text">Research</span></a></li>
            <li><a href="{{ route('admin.publication') }}"><i class='bx bx-globe'></i><span class="text">Publication</span></a></li>
            <li><a href="{{ route('admin.presentation') }}"><i class='bx bx-spreadsheet'></i><span class="text">Presentation</span></a></li>
            <li><a href="{{ route('admin.documentation') }}"><i class='bx bx-library'></i><span class="text">Documentation</span></a></li>
            <li><a href="{{ route('admin.team') }}"><i class='bx bxs-group'></i><span class="text">Team</span></a></li>
            <li class="active"><a href="{{ route('admin.center') }}"><i class='bx bx-home'></i><span class="text">Center</span></a></li>
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

<div class="card" id="centers-card">
    <div class="card-body" >
        <h5 class="card-title">Research Centers/Laboratories/Offices</h5>
        <br>

        <!-- Add Documentation Button -->
     <button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addCenterModal">
        Add Center
     </button>
     <br><br>
     
<div class="accordion accordion-flush" id="accordionFlushExample">
    @foreach($centers as $cid => $centerGroup)
        <div class="accordion-item">
            <h2 class="accordion-header" id="flush-heading-{{ $cid }}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $cid }}" aria-expanded="false" aria-controls="flush-collapse-{{ $cid }}" style="background: #f8f0e8">
                    <p>
                        <b style="font-size: 18px">{{ substr($centerGroup->first()->c_name, 0, 1) }}</b>{{ substr($centerGroup->first()->c_name, 1) }} 
                        <span style="font-size: 12px; color: #a41d21; font-family: 'Times New Roman', Times, serif;">
                            @if($latestUploads[$cid]->latest_upload) 
                                (Last Upload {{ \Carbon\Carbon::parse($latestUploads[$cid]->latest_upload)->diffForHumans() }})
                            @else 
                                (No uploads)
                            @endif
                        </span>
                    </p>
                </button>
            </h2>
            <div id="flush-collapse-{{ $cid }}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{ $cid }}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <h6 style="color: #a41d21">Researchers Assigned</h6>
                    @if($centerGroup->count() > 0)
                        <div class="table-responsive-md">
                            <table class="table centers-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Publications → Last Upload</th>
                                        <th>Publication's Action</th>
                                        <th>Research → Last Upload</th>
                                        <th>Research's Action</th>
                                        <th>Presentation → Last Upload</th>
                                        <th>Presentation's Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($centerGroup as $user)
                                        @if($user->email_status == 'yes') <!-- Only show users with email_status 'yes' -->
                                            @php
                                                $stats = $userStats[$user->uid] ?? null;
                                            @endphp
                                            <tr>
                                                <td>{{ $user->uid }}</td>
                                                <td>{{ $user->first_name }}</td>
                                                <td>{{ $user->last_name }}</td>
                                                <td>
                                                    <span style="color: #006BFF"><b>{{ $stats->publications_count ?? 0 }}</b></span>  &nbsp → &nbsp
                                                    <span style="color: #a41d21">{{ $stats->last_publication_upload ? \Carbon\Carbon::parse($stats->last_publication_upload)->diffForHumans() : 'N/A' }}</span>
                                                </td>
                                                <td>
                                                    <span><a id="view-btn" class="btn btn-outline-dark btn-sm" href="{{ route('admin.viewCenterPublication', ['id' => $user->uid]) }}">View</a></span>
                                                </td>
                                                <td>
                                                    <span style="color: #006BFF"><b>{{ $stats->research_count ?? 0 }}</b></span>  &nbsp → &nbsp
                                                    <span style="color: #a41d21">{{ $stats->last_research_upload ? \Carbon\Carbon::parse($stats->last_research_upload)->diffForHumans() : 'N/A' }} </span>
                                                </td>
                                                <td>
                                                    <span><a id="view-btn" class="btn btn-outline-dark btn-sm" href="{{ route('admin.viewCenterResearch', ['id' => $user->uid]) }}">View</a></span>
                                                </td>
                                                <td>
                                                    <span style="color: #006BFF"><b>{{ $stats->presentation_count ?? 0 }}</b></span>  &nbsp → &nbsp
                                                    <span style="color: #a41d21">{{ $stats->last_presentation_upload ? \Carbon\Carbon::parse($stats->last_presentation_upload)->diffForHumans() : 'N/A' }}</span>
                                                </td>
                                                <td>
                                                    <span><a id="view-btn" class="btn btn-outline-dark btn-sm" href="{{ route('admin.viewCenterPresentation', ['id' => $user->uid]) }}">View</a></span>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No users assigned</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>


    </div>
</div>

<!-- Modal for Adding Center -->
<div class="modal fade" id="addCenterModal" tabindex="-1" aria-labelledby="addCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCenterModalLabel" style="color: #ffffff">Add New Center</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.addCenter') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Center/Laboratory/Office Name</label>
                        <input type="text" class="form-control" id="c_name" name="c_name" required>
                    </div><br>

                </div>
                <div class="modal-footer" style="background: #f8f0e8">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save</button>
                </div>
            </form>
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

<!-- Bootstrap JS and Popper.js -->
<script src="../assets/vendor/popperjs/popperjs.js"></script>
<script src="../assets/vendor/popperjs/popperjsbootstrap.js"></script>

<!-- data tables js -->
<script src="../assets/vendor/datatables/jquery.datatables.js"></script>
<script src="../assets/vendor/datatables/datatables.bootstrap4.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>


</body>

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


</html>
