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
		<a href="{{ route('users.dashboard') }}" class="brand">
		<img src="../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
			<span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
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

	</section>
	<!-- SIDEBAR -->



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

@if(isset($user))

<main id ="main">

<!-- Modal for Adding Publication -->
<div class="modal fade" id="addPublicationModal" tabindex="-1" aria-labelledby="addPublicationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPublicationModalLabel" style="color: #ffffff">Add New Publication</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.addPublication') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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
                        <select class="form-select" id="research_type" name="research_type">
                            <option value="">-- Select Here --</option>
                            <option value="Study">Study</option>
                            <option value="Project">Project</option>
                            <option value="Article">Article</option>
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
                        <select class="form-select" id="date_duration" name="date_duration">
                            <option value="">-- Select Here --</option>
                            <option value="1 month">1 month</option>
                            <option value="2 months">2 months</option>
                            <option value="3 months">3 months</option>
                            <option value="4 months">4 months</option>
                            <option value="5 months">5 months</option>
                            <option value="6 months">6 months</option>
                            <option value="7 months">7 months</option>
                            <option value="8 months">8 months</option>
                            <option value="9 months">9 months</option>
                            <option value="10 months">10 months</option>
                            <option value="11 months">11 months</option>
                            <option value="12 months">12 months</option>
                            <option value="13 months">13 months</option>
                            <option value="14 months">14 months</option>
                            <option value="15 months">15 months</option>
                            <option value="16 months">16 months</option>
                            <option value="17 months">17 months</option>
                            <option value="18 months">18 months</option>
                            <option value="19 months">19 months</option>
                            <option value="20 months">20 months</option>
                            <option value="21 months">21 months</option>
                            <option value="22 months">22 months</option>
                            <option value="23 months">23 months</option>
                            <option value="24 months">24 months</option>
                            <option value="24+ months">24+ months</option>
                        </select>
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
                <div class="modal-footer" style="background: #fdf3f3;">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Publication</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTable for users -->
	<div class="card">
    <div class="card-body">
        <h4 class="card-title">Researchers' Publications </h4>
        <p><i>This section allows researchers to upload their publication details and publication file in PDF format only.</i></p>

        <br>

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

@foreach($usersPublications as $userpub)

                <tr>
				<td>{{ $userpub->p_id }}</td>
                <td>{{ $userpub->research_title }}</td>
                <td>
                    @if ($userpub->p_file_path)
					<a id="file-table" href="{{ asset($userpub->p_file_path) }}" target="_blank">{{ basename($userpub->p_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($userpub->p_link)
                        <a id="link-table" href="{{ $userpub->p_link }}" target="_blank">{{ Str::limit($userpub->p_link, 20) }}{{ strlen($userpub->p_link) > 20 ? : '' }}</a>
                    @else
                        No link available
                    @endif
                </td>

                <td>{{ date('Y-m-d', strtotime($userpub->created_at)) }} <br>
                    {{ date('h:i A', strtotime($userpub->created_at)) }}
                </td>

                <td>{{ date('Y-m-d', strtotime($userpub->updated_at)) }} <br>
                    {{ date('h:i A', strtotime($userpub->updated_at)) }}
                </td>
                
				<td>
                <!-- View Button -->
					<button id="view-btn"class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#viewPublicationModal{{ $userpub->p_id }}">
						View
					</button>
				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPublicationModal{{ $userpub->p_id }}">
						Edit
					</button>
				</td>

                </tr>
				
<!-- Edit Modal -->
<div class="modal fade" id="editPublicationModal{{ $userpub->p_id }}" tabindex="-1" aria-labelledby="editPublicationModalLabel{{ $userpub->p_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPublicationModalLabel{{ $userpub->p_id }}" style="color: #ffffff">Edit Publication Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.updatePublication', $userpub->p_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                            <label for="research_title">Research Title</label>
                            <input type="text" class="form-control" id="research_title" name="research_title" value="{{ $userpub->research_title }}" required>
                        </div><br>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description">Publication Description <span>(Optional. You can include Keywords, Beneficiaries, Objectives, and Press Release) </span></label>
                            <textarea class="form-control" id="description" name="description" rows="10">{{ $userpub->description }}</textarea>
                        </div><br>

                    <!-- Research Type Input -->
                    <div class="form-group">
                        <label for="research_type">Research Type <span>(Study/Project/Article, e.g Article)</span></label>
                        <select class="form-select" id="research_type" name="research_type">
                            <option value="">-- Select Here --</option>
                            <option value="Study" {{ $userpub->research_type == 'Study' ? 'selected' : '' }}>Study</option>
                            <option value="Project" {{ $userpub->research_type == 'Project' ? 'selected' : '' }}>Project</option>
                            <option value="Article" {{ $userpub->research_type == 'Article' ? 'selected' : '' }}>Article</option>
                        </select>
                    </div><br>

                    <p><span style="color: #a41d21">Include your name if you are one of the Author or Co-author</span></p>
                    
                    <!-- Authors Input -->
                    <div class="form-group">
                        <label for="authors">Author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="authors" name="authors" value="{{ $userpub->authors }}">
                    </div><br>

                    <!-- Coauthors Input -->
                    <div class="form-group">
                        <label for="coauthors">Co-author/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="coauthors" name="coauthors" value="{{ $userpub->coauthors }}">
                    </div><br>

                    <!-- Time Duration Input -->
                    <div class="form-group">
                        <label for="time_duration">Date Duration <span>(in terms of months, e.g. 10 months)</span></label>
                        <select class="form-select" id="date_duration" name="date_duration">
                            <option value="">-- Select Here --</option>
                            <option value="1 month" {{ $userpub->date_duration == '1 month' ? 'selected' : '' }}>1 month</option>
                            <option value="2 months" {{ $userpub->date_duration == '2 months' ? 'selected' : '' }}>2 months</option>
                            <option value="3 months" {{ $userpub->date_duration == '3 months' ? 'selected' : '' }}>3 months</option>
                            <option value="4 months" {{ $userpub->date_duration == '4 months' ? 'selected' : '' }}>4 months</option>
                            <option value="5 months" {{ $userpub->date_duration == '5 months' ? 'selected' : '' }}>5 months</option>
                            <option value="6 months" {{ $userpub->date_duration == '6 months' ? 'selected' : '' }}>6 months</option>
                            <option value="7 months" {{ $userpub->date_duration == '7 months' ? 'selected' : '' }}>7 months</option>
                            <option value="8 months" {{ $userpub->date_duration == '8 months' ? 'selected' : '' }}>8 months</option>
                            <option value="9 months" {{ $userpub->date_duration == '9 months' ? 'selected' : '' }}>9 months</option>
                            <option value="10 months" {{ $userpub->date_duration == '10 months' ? 'selected' : '' }}>10 months</option>
                            <option value="11 months" {{ $userpub->date_duration == '11 months' ? 'selected' : '' }}>11 months</option>
                            <option value="12 months" {{ $userpub->date_duration == '12 months' ? 'selected' : '' }}>12 months</option>
                            <option value="13 months" {{ $userpub->date_duration == '13 months' ? 'selected' : '' }}>13 months</option>
                            <option value="14 months" {{ $userpub->date_duration == '14 months' ? 'selected' : '' }}>14 months</option>
                            <option value="15 months" {{ $userpub->date_duration == '15 months' ? 'selected' : '' }}>15 months</option>
                            <option value="16 months" {{ $userpub->date_duration == '16 months' ? 'selected' : '' }}>16 months</option>
                            <option value="17 months" {{ $userpub->date_duration == '17 months' ? 'selected' : '' }}>17 months</option>
                            <option value="18 months" {{ $userpub->date_duration == '18 months' ? 'selected' : '' }}>18 months</option>
                            <option value="19 months" {{ $userpub->date_duration == '19 months' ? 'selected' : '' }}>19 months</option>
                            <option value="20 months" {{ $userpub->date_duration == '20 months' ? 'selected' : '' }}>20 months</option>
                            <option value="21 months" {{ $userpub->date_duration == '21 months' ? 'selected' : '' }}>21 months</option>
                            <option value="22 months" {{ $userpub->date_duration == '22 months' ? 'selected' : '' }}>22 months</option>
                            <option value="23 months" {{ $userpub->date_duration == '23 months' ? 'selected' : '' }}>23 months</option>
                            <option value="24 months" {{ $userpub->date_duration == '24 months' ? 'selected' : '' }}>24 months</option>
                            <option value="24+ months" {{ $userpub->date_duration == '24+ months' ? 'selected' : '' }}>24+ months</option>
                        </select>
                    </div><br>

                    <!-- Date Started Input -->
                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started" value="{{ $userpub->date_started }}">
                    </div><br>

                    <!-- Date Completed Input -->
                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed" value="{{ $userpub->date_completed }}">
                    </div><br>

                    <!-- Cost Input -->
                    <div class="form-group">
                        <label for="cost">Approved Cost <span>(in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $userpub->cost}}">
                    </div><br>

                    <!-- Funding Source Input -->
                    <div class="form-group">
                        <label for="funding_source">Funding Source <span>(e.g. DOST-ASTHRDP)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source" value="{{ $userpub->funding_source }}">
                    </div><br>

                    <!-- Publication Date Input -->
                    <div class="form-group">
                        <label for="publication_date">Date of Publication</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $userpub->publication_date }}">
                    </div><br>

                    <!-- Publication Title Input -->
                    <div class="form-group">
                        <label for="publication_title">Title of the Journal or Name of Publication </label>
                        <input type="text" class="form-control" id="publication_title" name="publication_title" value="{{ $userpub->publication_title }}">
                    </div><br>

                    <!-- Editors Input -->
                    <div class="form-group">
                        <label for="editors">Editor/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="editors" name="editors" value="{{ $userpub->editors }}">
                    </div><br>

                    <!-- Publisher Input -->
                    <div class="form-group">
                        <label for="publisher">Publisher <span>(e.g. New York Business Global)</span></label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $userpub->publisher }}">
                    </div><br>

                    <!-- Volume and Issue Number Input -->
                    <div class="form-group">
                        <label for="vol_issue_no">Volume/Issue Number <span>(e.g. Vol No. 17, No. 2, pp. 790-809)</span></label>
                        <input type="text" class="form-control" id="vol_issue_no" name="vol_issue_no" value="{{ $userpub->vol_issue_no }}">
                    </div><br>

                    <!-- Number of Pages Input -->
                    <div class="form-group">
                        <label for="no_pages">Number of Pages</label>
                        <input type="number" class="form-control" id="no_pages" name="no_pages" value="{{ $userpub->no_pages }}">
                    </div><br>

                    <!-- Publication Type Input -->
                    <div class="form-group">
                        <label for="publication_type">Publication Type <span>(International/National/Local, e.g. International – SCOPUS indexed)</span></label>
                        <input type="text" class="form-control" id="publication_type" name="publication_type" value="{{ $userpub->publication_type }}">
                    </div><br>

                    <!-- ISSN/ISBN Input -->
                    <div class="form-group">
                        <label for="issn_isbn">ISSN/ISBN <span>(e.g. 1307-5543)</span></label>
                        <input type="text" class="form-control" id="issn_isbn" name="issn_isbn" value="{{ $userpub->issn_isbn }}">
                    </div><br>

                        <!-- File Path Input -->
                        <div class="form-group">
                            <label for="file_path">Publication File <span>(optional) .pdf files only</span></label>
                            <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                        </div><br>

                        <!-- Link Input -->
                        <div class="form-group">
                            <label for="link">DOI link/Website Link </label>
                            <input type="url" class="form-control" id="link" name="link" value="{{ $userpub->p_link }}" placeholder="http://example.com">
                        </div>
                    </div>
                    <div class="modal-footer" style="background: #fdf3f3;">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
	</div>

    
<!-- View Publication Modal -->
<div class="modal fade" id="viewPublicationModal{{ $userpub->p_id }}" tabindex="-1" aria-labelledby="viewPublicationModalLabel{{ $userpub->p_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background: #fdf3f3;">
            <h4>Publication Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Publication Details -->
                <div class="container container-publication">

                    <div class="row" style="border-bottom: 2px solid #fff;"></div>
                    
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->research_title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Description</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->description }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Research Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->research_type }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Author/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->authors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Co-Author/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->coauthors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Duration</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->date_duration }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Started</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->date_started }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Completed</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->date_completed }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Approved Cost</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->cost }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Funding Source</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->funding_source }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date of Publication</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->publication_date }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->publication_title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Editor/s</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->editors }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publisher</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->publisher }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Volume/Issue No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->vol_issue_no }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Number of Pages</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->no_pages }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->publication_type }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">ISSN/ISBN</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->issn_isbn }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Publication File</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                            @if ($userpub->p_file_path)
                                <a href="{{ asset($userpub->p_file_path) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($userpub->p_file_path) }}</a>
                            @else
                                No file available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">DOI link/Website Link</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                        @if ($userpub->p_link)
                                <a href="{{ asset($userpub->p_link) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ Str::limit($userpub->p_link, 20) }}{{ strlen($userpub->p_link) > 20 ? : '' }}</a>
                            @else
                                No link available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Date Upload</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->created_at }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3" style="font-size: 20px">Last Update</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpub->updated_at }}</div>
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