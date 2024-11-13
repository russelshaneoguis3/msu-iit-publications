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

<!-- Modal for Adding Publication -->
<div class="modal fade" id="addPublicationModal" tabindex="-1" aria-labelledby="addPublicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPublicationModalLabel" style="color: #ffffff">Add New Publication</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.addPublication') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Research Title</label>
                        <input type="text" class="form-control" id="research_title" name="research_title" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Publication Description <span>(Optional. You can include Keywords, Beneficiaries, Objectives, and Press Release) </span></label>
                        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                    </div><br>

                    <!-- Research Type Input -->
                    <div class="form-group">
                        <label for="research_type">Research Type <span>(Study/Project/Article)</span></label>
                        <select class="form-control" id="research_type" name="research_type">
                            <option value="">-- Select Here --</option>
                            <option value="study">Study</option>
                            <option value="project">Project</option>
                            <option value="article">Article</option>
                        </select>
                    </div><br>

                    <p><span style="color: #a41d21">Include your name if you are one of the Author or Co-author</span></p>

                    <!-- Authors Input -->
                    <div class="form-group">
                        <label for="authors">Author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="authors" name="authors">
                    </div><br>

                    <!-- Coauthors Input -->
                    <div class="form-group">
                        <label for="coauthors">Co-author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="coauthors" name="coauthors">
                    </div><br>

                    <!-- Time Duration Input -->
                    <div class="form-group">
                        <label for="time_duration">Date Duration  <span>(in terms of months, e.g. 10 months)</span></label>
                        <input type="text" class="form-control" id="date_duration" name="date_duration">
                    </div><br>

                    <!-- Date Started Input -->
                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started">
                    </div><br>

                    <!-- Date Completed Input -->
                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed">
                    </div><br>

                    <!-- Cost Input -->
                    <div class="form-group">
                        <label for="cost">Approved Cost <span>(in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div><br>

                    <!-- Funding Source Input -->
                    <div class="form-group">
                        <label for="funding_source">Funding Source <span>(e.g. DOST-ASTHRDP)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source">
                    </div><br>

                    <!-- Publication Date Input -->
                    <div class="form-group">
                        <label for="publication_date">Publication Date</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date">
                    </div><br>

                    <!-- Publication Title Input -->
                    <div class="form-group">
                        <label for="publication_title">Title of the Journal or Name of Publication</label>
                        <input type="text" class="form-control" id="publication_title" name="publication_title">
                    </div><br>

                    <!-- Editors Input -->
                    <div class="form-group">
                        <label for="editors">Editor/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="editors" name="editors">
                    </div><br>

                    <!-- Publisher Input -->
                    <div class="form-group">
                        <label for="publisher">Publisher <span>(e.g. New York Business Global)</span></label>
                        <input type="text" class="form-control" id="publisher" name="publisher">
                    </div><br>

                    <!-- Volume and Issue Number Input -->
                    <div class="form-group">
                        <label for="vol_issue_no">Volume/Issue Number <span>(e.g. Vol No. 17, No. 2, pp. 790-809)</span></label>
                        <input type="text" class="form-control" id="vol_issue_no" name="vol_issue_no">
                    </div><br>

                    <!-- Number of Pages Input -->
                    <div class="form-group">
                        <label for="no_pages">Number of Pages</label>
                        <input type="number" class="form-control" id="no_pages" name="no_pages">
                    </div><br>

                    <!-- Publication Type Input -->
                    <div class="form-group">
                        <label for="publication_type">Publication Type <span>(International/National/Local, e.g. International – SCOPUS indexed)</span></label>
                        <input type="text" class="form-control" id="publication_type" name="publication_type">
                    </div><br>

                    <!-- ISSN/ISBN Input -->
                    <div class="form-group">
                        <label for="issn_isbn">ISSN/ISBN <span>(e.g. 1307-5543)</span></label>
                        <input type="text" class="form-control" id="issn_isbn" name="issn_isbn">
                    </div><br>

                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Upload Publication File <span>(optional) .pdf files only</span></label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">DOI link/Website Link </label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="http://example.com">
                    </div>
                </div>
                <div class="modal-footer" style="background: #bdd5d8;">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Publication</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Datatable for admin -->
		<div class="card">
            <div class="card-body">
            <h4 class="card-title">Admin's Publications </h4> <br>

		<!-- Add Publication Button -->
		<button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addPublicationModal">
        Add Publication
        </button>
		<br><br>

			<div class="table-responsive-md">
            <table class="table table-publications">
                <thead>
                  <tr>
				  	<th>ID</th>
					<th>Research Title</th>
                    <th>File Path</th>
                    <th>Link Path</th>
                    <th>Date Upload</th>
                    <th>Last Update</th>  
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($adminPublications as $adminpub)

                <tr>
				<td>{{ $adminpub->p_id }}</td>
                <td>{{ $adminpub->research_title }}</td>
                <td>
                    @if ($adminpub->p_file_path)
					<a id="file-table" href="{{ asset($adminpub->p_file_path) }}" target="_blank">{{ basename($adminpub->p_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($adminpub->p_link)
                        <a id="link-table" href="{{ $adminpub->p_link }}" target="_blank">{{ $adminpub->p_link }}</a>
                    @else
                        No link available
                    @endif
                </td>

                <td>{{ date('Y-m-d', strtotime($adminpub->created_at)) }} <br>
                    {{ date('h:i A', strtotime($adminpub->created_at)) }}
                </td>

                <td>{{ date('Y-m-d', strtotime($adminpub->updated_at)) }} <br>
                    {{ date('h:i A', strtotime($adminpub->updated_at)) }}
                </td>
                
				<td>
                <!-- View Button -->
					<button id="view-btn"class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#viewPublicationModal{{ $adminpub->p_id }}">
						View
					</button>
				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPublicationModal{{ $adminpub->p_id }}">
						Edit
					</button>
				</td>

                </tr>

<!-- Edit Modal -->
<div class="modal fade" id="editPublicationModal{{ $adminpub->p_id }}" tabindex="-1" aria-labelledby="editPublicationModalLabel{{ $adminpub->p_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPublicationModalLabel{{ $adminpub->p_id }}" style="color: #ffffff">Edit Publication Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.updatePublication', $adminpub->p_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                            <label for="research_title">Research Title</label>
                            <input type="text" class="form-control" id="research_title" name="research_title" value="{{ $adminpub->research_title }}" required>
                        </div><br>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description">Publication Description <span>(Optional. You can include Keywords, Beneficiaries, Objectives, and Press Release) </span></label>
                            <textarea class="form-control" id="description" name="description" rows="10">{{ $adminpub->description }}</textarea>
                        </div><br>

                    <!-- Research Type Input -->
                    <div class="form-group">
                        <label for="research_type">Research Type <span>(Study/Project/Article, e.g Article)</span></label>
                        <input type="text" class="form-control" id="research_type" name="research_type" value="{{ $adminpub->research_type }}">
                    </div><br>

                    <p><span style="color: #a41d21">Include your name if you are one of the Author or Co-author</span></p>
                    
                    <!-- Authors Input -->
                    <div class="form-group">
                        <label for="authors">Author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="authors" name="authors" value="{{ $adminpub->authors }}">
                    </div><br>

                    <!-- Coauthors Input -->
                    <div class="form-group">
                        <label for="coauthors">Co-author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="coauthors" name="coauthors" value="{{ $adminpub->coauthors }}">
                    </div><br>

                    <!-- Time Duration Input -->
                    <div class="form-group">
                        <label for="time_duration">Date Duration <span>(in terms of months, e.g. 10 months)</span></label>
                        <input type="text" class="form-control" id="date_duration" name="date_duration" value="{{ $adminpub->date_duration }}">
                    </div><br>

                    <!-- Date Started Input -->
                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started" value="{{ $adminpub->date_started }}">
                    </div><br>

                    <!-- Date Completed Input -->
                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed" value="{{ $adminpub->date_completed }}">
                    </div><br>

                    <!-- Cost Input -->
                    <div class="form-group">
                        <label for="cost">Approved Cost <span>(in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $adminpub->cost}}">
                    </div><br>

                    <!-- Funding Source Input -->
                    <div class="form-group">
                        <label for="funding_source">Funding Source <span>(e.g. DOST-ASTHRDP)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source" value="{{ $adminpub->funding_source }}">
                    </div><br>

                    <!-- Publication Date Input -->
                    <div class="form-group">
                        <label for="publication_date">Date of Publication</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $adminpub->publication_date }}">
                    </div><br>

                    <!-- Publication Title Input -->
                    <div class="form-group">
                        <label for="publication_title">Title of the Journal or Name of Publication </label>
                        <input type="text" class="form-control" id="publication_title" name="publication_title" value="{{ $adminpub->publication_title }}">
                    </div><br>

                    <!-- Editors Input -->
                    <div class="form-group">
                        <label for="editors">Editor/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="editors" name="editors" value="{{ $adminpub->editors }}">
                    </div><br>

                    <!-- Publisher Input -->
                    <div class="form-group">
                        <label for="publisher">Publisher <span>(e.g. New York Business Global)</span></label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $adminpub->publisher }}">
                    </div><br>

                    <!-- Volume and Issue Number Input -->
                    <div class="form-group">
                        <label for="vol_issue_no">Volume/Issue Number <span>(e.g. Vol No. 17, No. 2, pp. 790-809)</span></label>
                        <input type="text" class="form-control" id="vol_issue_no" name="vol_issue_no" value="{{ $adminpub->vol_issue_no }}">
                    </div><br>

                    <!-- Number of Pages Input -->
                    <div class="form-group">
                        <label for="no_pages">Number of Pages</label>
                        <input type="number" class="form-control" id="no_pages" name="no_pages" value="{{ $adminpub->no_pages }}">
                    </div><br>

                    <!-- Publication Type Input -->
                    <div class="form-group">
                        <label for="publication_type">Publication Type <span>(International/National/Local, e.g. International – SCOPUS indexed)</span></label>
                        <input type="text" class="form-control" id="publication_type" name="publication_type" value="{{ $adminpub->publication_type }}">
                    </div><br>

                    <!-- ISSN/ISBN Input -->
                    <div class="form-group">
                        <label for="issn_isbn">ISSN/ISBN <span>(e.g. 1307-5543)</span></label>
                        <input type="text" class="form-control" id="issn_isbn" name="issn_isbn" value="{{ $adminpub->issn_isbn }}">
                    </div><br>

                        <!-- File Path Input -->
                        <div class="form-group">
                            <label for="file_path">Publication File <span>(optional) .pdf files only</span></label>
                            <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                        </div><br>

                        <!-- Link Input -->
                        <div class="form-group">
                            <label for="link">DOI link/Website Link </label>
                            <input type="url" class="form-control" id="link" name="link" value="{{ $adminpub->p_link }}" placeholder="http://example.com">
                        </div>
                    </div>
                    <div class="modal-footer" style="background: #bdd5d8;">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
	</div>

    
<!-- View Publication Modal -->
<div class="modal fade" id="viewPublicationModal{{ $adminpub->p_id }}" tabindex="-1" aria-labelledby="viewPublicationModalLabel{{ $adminpub->p_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background: #daeef1;">
            <h4>Admin Publication Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Publication Details -->
                <div class="container container-publication">

                    <div class="row" style="border-bottom: 2px solid #fff;"></div>
                    
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->research_title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Description</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->description }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->research_type }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Author/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->authors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Co-Author/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->coauthors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Duration</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->date_duration }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Started</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->date_started }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Completed</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->date_completed }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Approved Cost</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->cost }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Funding Source</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->funding_source }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date of Publication</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->publication_date }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->publication_title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Editor/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->editors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publisher</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->publisher }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Volume/Issue No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->vol_issue_no }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Number of Pages</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->no_pages }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->publication_type }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">ISSN/ISBN</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->issn_isbn }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication File</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                            @if ($adminpub->p_file_path)
                                <a href="{{ asset($adminpub->p_file_path) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($adminpub->p_file_path) }}</a>
                            @else
                                No file available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">DOI link/Website Link</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                        @if ($adminpub->p_link)
                                <a href="{{ asset($adminpub->p_link) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($adminpub->p_link) }}</a>
                            @else
                                No link available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Upload</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->created_at }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Last Update</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $adminpub->updated_at }}</div>
                    </div>
                </div>
                <!-- End of Publication Details -->
                 <br>
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

	<br>

    <!-- DataTable for users -->
	<div class="card">
    <div class="card-body">
        <h4 class="card-title">Users' Publications </h4> <br>
		<div class="table-responsive-md">
            <table class="table table-publications">
                <thead>
                  <tr>
					
					<th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th> 
					<th>Publications</th>
					<th>Action</th>

                  </tr>
                </thead>
                <tbody>
				@foreach($usersPublications as $userpub)
                <tr>

                <td>{{ $userpub->uid }}</td>
                <td>{{ $userpub->first_name }}</td>
                <td>{{ $userpub->last_name }}</td>
                <td>{{ $userpub->email }}</td>
				<td style="color: #a41d21; font-size: 16px;">count: <b><i>{{ $userpub->publication_count }}</i></b></td>
				<td>
				<a id="view-btn" class="btn btn-outline-dark" href="{{ route('admin.viewPublications', ['id' => $userpub->uid]) }}">
				View
				</a>
				</td>

                </tr>
                @endforeach
                </tbody>
            </table>
		</div>
		</div>
	</div>


<script>
    function validateForm() {
        const filePath = document.getElementById('file_path').value;
        const link = document.getElementById('link').value;

        // At least one of the two fields should be filled
        if (!filePath && !link) {
            alert("Please provide either a PDF file or a link.");
            return false; // Prevent form submission
        }
        return true; // Proceed with the form submission
    }
</script>

@else
<p>No user is logged in.</p>
@endif

	</main>
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

<script>
        $(document).ready(function() {
            $('.table-publications').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
			"order": [[0, 'desc']]
            });
        });
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