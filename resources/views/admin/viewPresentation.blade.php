<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication | Researchers' Repo</title>
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
			<li>
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
			<li class="active">
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

<!-- DataTable for users Presentation -->
<div class="card">
<div class="card-body">

    <a id="view-btn" class="btn btn-outline-secondary" href="{{ route('admin.presentation') }}">
				Back
	</a>
    <br><br>


        <h4 class="card-title">Presentations of <span style="color: #a41d21"><i> {{ $userinfo->first_name }} {{ $userinfo->last_name }}</i> </span></h4>

    <br>

		<div class="table-responsive-md">
            <table class="table table-presentation">
                <thead>
                  <tr>
				  	<th>ID</th>
					<th>Title</th>
                    <th>File Path</th>
                    <th>Link Path</th>
                    <th>Upload Date</th>  
                    <th>Last Update</th>  
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($presentations as $userpresent)
                <tr>
				<td>{{ $userpresent->pr_id }}</td>
                <td>{{ $userpresent->research_title }}</td>
                <td>
                    @if ($userpresent->pr_file_path)
					<a id="file-table" href="{{ asset($userpresent->pr_file_path) }}" target="_blank">{{ basename($userpresent->pr_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($userpresent->pr_link)
                        <a id="link-table" href="{{ $userpresent->pr_link }}" target="_blank">{{ Str::limit($userpresent->pr_link, 20) }}{{ strlen($userpresent->pr_link) > 20 ? : '' }}</a>
                    @else
                        No link available
                    @endif
                </td>
                <td>{{ date('Y-m-d', strtotime($userpresent->created_at)) }}<br>
                {{ date('h:i A', strtotime($userpresent->created_at)) }}
                </td>
                <td>{{ date('Y-m-d', strtotime($userpresent->updated_at)) }}<br>
                {{ date('h:i A', strtotime($userpresent->updated_at)) }}
                </td>
                
				<td>

                <!-- View Button -->
					<button id="view-btn"class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#viewPresentationModal{{ $userpresent->pr_id }}">
						View
					</button>
				</td>
                </tr>
                

<!-- View Presentation Modal -->
<div class="modal fade" id="viewPresentationModal{{ $userpresent->pr_id }}" tabindex="-1" aria-labelledby="viewPresentationModalLabel{{ $userpresent->pr_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background: #ebf4ff;">
            <h4>Presentation Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Presentation Details -->
                <div class="container container-publication">
                    <div class="row" style="border-bottom: 2px solid #fff;"></div>

                    <div class="row" style="border-bottom: 2px solid #fff;"><br><br>
                        <div class="col-3" style="font-size: 20px">Research Title</div>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;"><br><br>
                        <div class="col-3" style="font-size: 20px">Research Project Title</div>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_project_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Fund</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->fund }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">SO Number</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->so_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Researcher Name</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->researcher_name }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Presenter Name</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->presenter_name }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Duration</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_duration }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Started</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_started }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Completed</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_completed }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Approved Cost</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->cost }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Funding Source</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->funding_source }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Presentation Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->presentation_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Conference Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Conference Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Venue</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->venue }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Conference Date</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_date }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Organizer</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->organizer }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Article Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->article_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Date</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publication_date }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Journal Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->journal_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Editor</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->editor }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publisher</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publisher }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Volume/Issue No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->vol_issue_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Page No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->page_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publication_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Indexing</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->indexing }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Presentation File</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                            @if ($userpresent->pr_file_path)
                                <a href="{{ asset($userpresent->pr_file_path) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($userpresent->pr_file_path) }}</a>
                            @else
                                No file available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">DOI link/Website Link</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                        @if ($userpresent->pr_link)
                                <a href="{{ asset($userpresent->pr_link) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ Str::limit($userpresent->pr_link, 20) }}{{ strlen($userpresent->pr_link) > 20 ? : '' }}</a>
                            @else
                                No link available
                            @endif
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Upload</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->created_at }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Last Update</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->updated_at }}</div>
                    </div>

                </div>

                <br>
                <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal" style="float:right">Close</button>
                <br><br>

            </div>
            <!-- End of Presentation Details -->
            
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
            $('.table-presentation').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
			"order": [[0, 'desc']]
            });
        });
</script>


</body>

</html>