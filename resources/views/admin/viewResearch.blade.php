<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research | Researchers' Repo</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	 <!-- Favicons -->
	 <link href="{{ asset('../../assets/img/web-logo.png') }}" rel="icon">
  	<link href="{{ asset('../../assets/img/web-logo.png') }}" rel="apple-touch-icon">

	<!-- bootstrap css -->
	<link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Boxicons -->
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

    <!-- Include the DataTables library -->
    <link rel="stylesheet" href="../../assets/vendor/datatables/datatables.bootstrap4.css">

	<!-- Include SweetAlert -->
	<link href="../../assets/vendor/sweetalert/sweetalert.css" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="../../side-nav/side-nav.css">
	<link rel="stylesheet" href="../../general/style.css">

</head>
<body>
@csrf  <!-- CSRF token -->

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('admin.dashboard') }}" class="brand">
		<img src="../../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
			<span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('admin.research') }}">
					<i class='bx bx-file-find' ></i>
					<span class="text">Research</span>
				</a>
			</li>
			<li>
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
            <li><a href="{{ route('admin.center') }}">
                <i class='bx bx-home'></i>
                <span class="text">Center</span>
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

<!-- DataTable for users -->
<div class="card">
<div class="card-body">

        <a id="view-btn" class="btn btn-outline-secondary" href="{{ route('admin.research') }}">
                        Back
        </a>
        <br><br>

        <h4 class="card-title">Research of <span style="color: #a41d21"><i> {{ $userinfo->first_name }} {{ $userinfo->last_name }}</i> </span></h4>

	<br>

		<div class="table-responsive-md">
            <table class="table table-research">
                <thead>
                  <tr>
				  	<th>ID</th>
					<th>Title</th>
                    <th>File Path</th>
                    <th>Link Path</th>
                    <th>Date Upload</th>
                    <th>Last Update</th>  
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($researches as $userres)
                <tr>
				<td>{{ $userres->r_id }}</td>
                <td>{{ $userres->research_title }}</td>
                <td>
                    @if ($userres->r_file_path)
					<a id="file-table" href="{{ asset($userres->r_file_path) }}" target="_blank">{{ basename($userres->r_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($userres->r_link)
                        <a id="link-table" href="{{ $userres->r_link }}" target="_blank">{{ Str::limit($userres->r_link, 20) }}{{ strlen($userres->r_link) > 20 ? : '' }}</a>
                    @else
                        No link available
                    @endif
                </td>

                <td>{{ date('Y-m-d', strtotime($userres->created_at)) }} <br>
                {{ date('h:i A', strtotime($userres->created_at)) }}
               </td>

                <td>{{ date('Y-m-d', strtotime($userres->updated_at)) }} <br>
                {{ date('h:i A', strtotime($userres->updated_at)) }}
               </td>

				<td>
                <!-- View Button -->
				<button id="view-btn"class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#viewResearchModal{{ $userres->r_id }}">
						View
				</button>
				</td>
                </tr>
            

<!-- View Research Modal -->
<div class="modal fade" id="viewResearchModal{{ $userres->r_id }}" tabindex="-1" aria-labelledby="viewResearchModalLabel{{ $userres->r_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background-color: #fffbee; max-height: 1000px; overflow-y: auto;">
            <h4>Research Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Publication Details -->
                <div class="container">

                    <div class="row" style="border-bottom: 2px solid #fff;"></div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->research_title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Description</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->description }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Project Leaders</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->leaders }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" >Research Project Members</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->members }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Project Type </div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->research_type  }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Special Order No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->so_no }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Special Order Link from IIT Docs</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                        @if ($userres->r_link)
                                <a href="{{ asset($userres->r_link) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ Str::limit($userres->r_link, 20) }}{{ strlen($userres->r_link) > 20 ? : '' }}</a>
                            @else
                                No link available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Duration</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->date_duration }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Started</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->date_started }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Completed</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->date_completed }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Approved Cost-Direct Cost</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->cost }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Funding Source</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->funding_source }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Project Proposal File</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                            @if ($userres->r_file_path)
                                <a href="{{ asset($userres->r_file_path) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($userres->r_file_path) }}</a>
                            @else
                                No file available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Upload</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->created_at }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Last Update</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userres->updated_at }}</div>
                    </div>
                </div>
                <br>
                <!-- End of Publication Details -->
                <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" style="float:right">Close</button>
                <br><br>
            </div>
        </div>
    </div>
</div>

@endforeach


                </tbody>
            </table>
		</div>
		</div>
	</div>


</div>
</div>


@else
<p>No user is logged in.</p>
@endif

	</main>
</section>

<!-- side-nav JS -->
<script src="../../side-nav/script.js"></script>

<!-- Include jQuery -->
<script src="../../assets/vendor/jquery/jquery.js"></script>

<!-- Bootstrap JS and Popper.js -->
<script src="../../assets/vendor/popperjs/popperjs.js"></script>
<script src="../../assets/vendor/popperjs/popperjsbootstrap.js"></script>

<!-- data tables js -->
<script src="../../assets/vendor/datatables/jquery.datatables.js"></script>
<script src="../../assets/vendor/datatables/datatables.bootstrap4.js"></script>

<!-- sweet alert JS -->
<script src="../../assets/vendor/sweetalert/sweetalert.js"></script>

<script>
        $(document).ready(function() {
            $('.table-research').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
			"order": [[0, 'desc']]
            });
        });
</script>


</body>

</html>