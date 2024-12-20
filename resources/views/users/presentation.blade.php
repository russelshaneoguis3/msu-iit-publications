<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation | Researchers' Repo</title>
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
@csrf  <!-- CSRF token -->

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="{{ route('users.dashboard') }}" class="brand">
		<img src="{{ asset('assets/img/msuiit-logo.png') }}" alt="logo" class="nav-logo">
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
			<li>
				<a href="{{ route('users.publication') }}">
					<i class='bx bx-globe' ></i>
					<span class="text">Publication</span>
				</a>
			</li>
			<li class="active">
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

<!-- Modal for Adding Presentation -->
<div class="modal fade add-modal" id="addPresentationModal" tabindex="-1" aria-labelledby="addPresentationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPresentationModalLabel" style="color: #ffffff">Add New Presentation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p style="color: #a41d21; padding: 20px; text-align: justify">Please fill out all the input fields, particularly the Conference Date, as it is required for calculating the presentation count and yearly analytics. You can also either provide the Presentation Link/Conference Link or upload the Presentation in .pdf format. </p>
            <form action="{{ route('users.addPresentation') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="research_title">Title of the Research Paper to be presented</label>
                        <input type="text" class="form-control" id="research_title" name="research_title" required>
                    </div><br>

                    <div class="form-group">
                        <label for="research_project_title">Title of the Research Project</label>
                        <input type="text" class="form-control" id="research_project_title" name="research_project_title">
                    </div><br>

                    <div class="form-group">
                        <label for="fund">Internally funded, Externally funded or Patriotic Research</label>
                        <select class="form-select" aria-label="Default select example" id="fund" name="fund">
                        <option value="">-- Select Here --</option>
                        <option value="Internally funded">Internally funded</option>
                        <option value="Externally funded">Externally funded</option>
                        <option value="Patriotic Research">Patriotic Research</option>
                    </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="research_type">Type of Research (study/project/article)</label>
                        <select class="form-select" aria-label="Default select example" id="research_type" name="research_type">
                        <option value="">-- Select Here --</option>
                        <option value="Study">Study</option>
                        <option value="Project">Project</option>
                        <option value="Article">Article</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="so_no">Specian Order No. <span>(e.g. SO No. 00133-2022)</span></label>
                        <input type="text" class="form-control" id="so_no" name="so_no">
                    </div><br>
                    
                    <div class="form-group">
                        <label for="researcher_name">Name of Researcher(s)/Author <span>(if multiple inputs, separate with semicolon ';')</span></label>
                        <input type="text" class="form-control" id="researcher_name" name="researcher_name">
                    </div><br>

                    <div class="form-group">
                        <label for="presenter_name">Presenter <span> Pls. specify if (Faculty, Graduate or Undergraduate, e.g. Bob Jones(Faculty))</span> </label>
                        <input type="text" class="form-control" id="presenter_name" name="presenter_name">
                    </div><br>

                    <div class="form-group">
                        <label for="date_duration">Research Duration <span> (in months, e.g. 10 months)</span></label>
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

                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started">
                    </div><br>

                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed">
                    </div><br>

                    <div class="form-group">
                        <label for="cost">Approved Cost <span> (in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div><br>

                    <div class="form-group">
                        <label for="funding_source">Funding Source <span> (e.g. OPF-Research/DR)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source">
                    </div><br>

                    <div class="form-group">
                        <label for="presentation_type">Type of Presentation (Oral/Poster)</label>
                        <select class="form-select" aria-label="Default select example" id="presentation_type" name="presentation_type">
                        <option value="">-- Select Here --</option>
                        <option value="Oral">Oral</option>
                        <option value="Poster">Poster</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="conference_type">Type of Conference (International/National/Local)</label>
                        <select class="form-select" aria-label="Default select example" id="conference_type" name="conference_type">
                        <option value="">-- Select Here --</option>
                        <option value="International">International</option>
                        <option value="Local">Local</option>
                        <option value="National">National</option>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="conference_title">Title of Conference/Symposium</label>
                        <input type="text" class="form-control" id="conference_title" name="conference_title">
                    </div><br>

                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue">
                    </div><br>

                    <div class="form-group">
                        <label for="conference_date">Conference Date</label>
                        <input type="date" class="form-control" id="conference_date" name="conference_date">
                    </div><br>

                    <div class="form-group">
                        <label for="organizer">Organizer</label>
                        <input type="text" class="form-control" id="organizer" name="organizer">
                    </div><br><br>

                    <h5><span>IF THE PAPER IS ALREADY PUBLISHED , KINDLY INDICATE THE REQUIRED FIELDS 
                    BELOW</span></h5>

                    <div class="form-group">
                        <label for="article_title">Title of the Article Published</label>
                        <input type="text" class="form-control" id="article_title" name="article_title">
                    </div><br>

                    <div class="form-group">
                        <label for="publication_date">Publication Date</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date">
                    </div><br>

                    <div class="form-group">
                        <label for="journal_title">Title of the Journal</label>
                        <input type="text" class="form-control" id="journal_title" name="journal_title">
                    </div><br>

                    <div class="form-group">
                        <label for="editor">Editor/s <span> (if multiple inputs, separate with semicolon ';')</span></label>
                        <input type="text" class="form-control" id="editor" name="editor">
                    </div><br>

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher">
                    </div><br>

                    <div class="form-group">
                        <label for="vol_issue_no">Vol. No. & Issue No.</label>
                        <input type="text" class="form-control" id="vol_issue_no" name="vol_issue_no">
                    </div><br>


                    <div class="form-group">
                        <label for="page_no">Page number(s) and No. of Pages <span> (e.g. pp. 262-269)</span></label>
                        <input type="text" class="form-control" id="page_no" name="page_no">
                    </div><br>

                    <div class="form-group">
                        <label for="publication_type">Type of Publication (International/National/Local) </label>
                        <select class="form-select" aria-label="Default select example" id="publication_type" name="publication_type">
                        <option value="">-- Select Here --</option>
                        <option value="International">International</option>
                        <option value="Local">Local</option>
                        <option value="National">National</option>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="indexing">Indicate indexing of the Journal * Thomson Reuters –Indexed, Scopus-Indexed , CHED Accredited Journals, Others if (pls specify )</label>
                        <input type="text" class="form-control" id="indexing" name="indexing">
                    </div><br>

                    <h5><span>You can choose to upload either of the two below</span></h5>
                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Upload Presentation File (optional) .pdf files only</label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Presentation Link (optional)</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="http://example.com">
                    </div>
                </div>
                <div class="modal-footer" style="background-color: #ebf4ff;">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Presentation</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTable for users Presentation -->
<div class="card">
<div class="card-body">
        <h4 class="card-title">Researchers' Presentations </h4> 
        <p><i>This section allows researchers to upload their presentations in PDF format only.</i></p>

        <br>

<!-- Add Presentation Button -->
<button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addPresentationModal">
Add Presentation
</button>

	<br><br>

		<div class="table-responsive">
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
				@foreach($usersPresentation as $userpresent)
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

				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPresentationModal{{ $userpresent->pr_id }}">
						Edit
					</button>
                <!-- Print Button -->
                <a href="{{ route('users.print.presentation', ['pr_id' => $userpresent->pr_id]) }}" 
                class="btn btn-outline-primary" id="print-btn"
                target="_blank">
                    Print
                </a>

				</td>
                </tr>
                
<!-- Edit Modal -->
<div class="modal fade edit-modal" id="editPresentationModal{{ $userpresent->pr_id }}" tabindex="-1" aria-labelledby="editPresentationModalLabel{{ $userpresent->pr_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPresentationModalLabel{{ $userpresent->pr_id }}" style="color: #ffffff">Edit Presentation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.updatePresentation', $userpresent->pr_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                    <div class="form-group">
                        <label for="research_title">Title of the Research Paper to be presented</label>
                        <input type="text" class="form-control" id="research_title" name="research_title" value="{{ $userpresent->research_title }}" required>
                    </div><br>

                    <div class="form-group">
                        <label for="research_project_title">Title of the Research Project</label>
                        <input type="text" class="form-control" id="research_project_title" name="research_project_title" value="{{ $userpresent->research_project_title }}">
                    </div><br>

                    <div class="form-group">
                        <label for="fund">Internally funded, Externally funded or Patriotic Research</label>
                        <select class="form-select" aria-label="Default select example" id="fund" name="fund" value="{{ $userpresent->research_project_title }}">
                        <option value="">-- Select Here --</option>
                        <option value="Internally funded" {{ $userpresent->fund == 'Internally funded' ? 'selected' : '' }}>Internally funded</option>
                        <option value="Externally funded" {{ $userpresent->fund == 'Externally funded' ? 'selected' : '' }}>Externally funded</option>
                        <option value="Patriotic Research" {{ $userpresent->fund == 'Patriotic Research' ? 'selected' : '' }}>Patriotic Research</option>
                    </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="research_type">Type of Research (study/project/article)</label>
                        <select class="form-select" aria-label="Default select example" id="research_type" name="research_type" >
                        <option value="">-- Select Here --</option>
                        <option value="Study" {{ $userpresent->research_type == 'Study' ? 'selected' : '' }}>Study</option>
                        <option value="Project" {{ $userpresent->research_type == 'Project' ? 'selected' : '' }}>Project</option>
                        <option value="Article" {{ $userpresent->research_type == 'Article' ? 'selected' : '' }}>Article</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="so_no">Specian Order No. <span>(e.g. SO No. 00133-2022)</span> </label>
                        <input type="text" class="form-control" id="so_no" name="so_no" value="{{ $userpresent->so_no }}">
                    </div><br>
                    
                    <div class="form-group">
                        <label for="researcher_name">Name of Researcher(s)/Author <span>(if multiple inputs, separate with semicolon ';')</span></label>
                        <input type="text" class="form-control" id="researcher_name" name="researcher_name" value="{{ $userpresent->researcher_name }}">
                    </div><br>

                    <div class="form-group">
                        <label for="presenter_name">Presenter <span> Pls. specify if (Faculty, Graduate or Undergraduate, e.g. Bob Jones(Faculty))</span> </label>
                        <input type="text" class="form-control" id="presenter_name" name="presenter_name" value="{{ $userpresent->presenter_name }}">
                    </div><br>

                    <div class="form-group">
                        <label for="date_duration">Research Duration <span> (in months, e.g. 10 months)</span></label>
                        <select class="form-select" id="date_duration" name="date_duration">
                            <option value="">-- Select Here --</option>
                            <option value="1 month" {{ $userpresent->date_duration == '1 month' ? 'selected' : '' }}>1 month</option>
                            <option value="2 months" {{ $userpresent->date_duration == '2 months' ? 'selected' : '' }}>2 months</option>
                            <option value="3 months" {{ $userpresent->date_duration == '3 months' ? 'selected' : '' }}>3 months</option>
                            <option value="4 months" {{ $userpresent->date_duration == '4 months' ? 'selected' : '' }}>4 months</option>
                            <option value="5 months" {{ $userpresent->date_duration == '5 months' ? 'selected' : '' }}>5 months</option>
                            <option value="6 months" {{ $userpresent->date_duration == '6 months' ? 'selected' : '' }}>6 months</option>
                            <option value="7 months" {{ $userpresent->date_duration == '7 months' ? 'selected' : '' }}>7 months</option>
                            <option value="8 months" {{ $userpresent->date_duration == '8 months' ? 'selected' : '' }}>8 months</option>
                            <option value="9 months" {{ $userpresent->date_duration == '9 months' ? 'selected' : '' }}>9 months</option>
                            <option value="10 months" {{ $userpresent->date_duration == '10 months' ? 'selected' : '' }}>10 months</option>
                            <option value="11 months" {{ $userpresent->date_duration == '11 months' ? 'selected' : '' }}>11 months</option>
                            <option value="12 months" {{ $userpresent->date_duration == '12 months' ? 'selected' : '' }}>12 months</option>
                            <option value="13 months" {{ $userpresent->date_duration == '13 months' ? 'selected' : '' }}>13 months</option>
                            <option value="14 months" {{ $userpresent->date_duration == '14 months' ? 'selected' : '' }}>14 months</option>
                            <option value="15 months" {{ $userpresent->date_duration == '15 months' ? 'selected' : '' }}>15 months</option>
                            <option value="16 months" {{ $userpresent->date_duration == '16 months' ? 'selected' : '' }}>16 months</option>
                            <option value="17 months" {{ $userpresent->date_duration == '17 months' ? 'selected' : '' }}>17 months</option>
                            <option value="18 months" {{ $userpresent->date_duration == '18 months' ? 'selected' : '' }}>18 months</option>
                            <option value="19 months" {{ $userpresent->date_duration == '19 months' ? 'selected' : '' }}>19 months</option>
                            <option value="20 months" {{ $userpresent->date_duration == '20 months' ? 'selected' : '' }}>20 months</option>
                            <option value="21 months" {{ $userpresent->date_duration == '21 months' ? 'selected' : '' }}>21 months</option>
                            <option value="22 months" {{ $userpresent->date_duration == '22 months' ? 'selected' : '' }}>22 months</option>
                            <option value="23 months" {{ $userpresent->date_duration == '23 months' ? 'selected' : '' }}>23 months</option>
                            <option value="24 months" {{ $userpresent->date_duration == '24 months' ? 'selected' : '' }}>24 months</option>
                            <option value="24+ months" {{ $userpresent->date_duration == '24+ months' ? 'selected' : '' }}>24+ months</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started" value="{{ $userpresent->date_started }}">
                    </div><br>

                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed" value="{{ $userpresent->date_completed }}">
                    </div><br>

                    <div class="form-group">
                        <label for="cost">Approved Cost <span> (in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $userpresent->cost }}">
                    </div><br>

                    <div class="form-group">
                        <label for="funding_source">Funding Source <span> (e.g. OPF-Research/DR)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source" value="{{ $userpresent->funding_source }}">
                    </div><br>

                    <div class="form-group">
                        <label for="presentation_type">Type of Presentation (Oral/Poster)</label>
                        <select class="form-select" aria-label="Default select example" id="presentation_type" name="presentation_type" value="{{ $userpresent->presentation_type }}">
                        <option value="">-- Select Here --</option>
                        <option value="Oral" {{ $userpresent->presentation_type == 'Oral' ? 'selected' : '' }}>Oral</option>
                        <option value="Poster" {{ $userpresent->presentation_type == 'Poster' ? 'selected' : '' }}>Poster</option>
                        </select>
                    </div><br>

                    <div class="form-group">
                        <label for="conference_type">Type of Conference (International/National/Local)</label>
                        <select class="form-select" aria-label="Default select example" id="conference_type" name="conference_type" value="{{ $userpresent->conference_type }}">
                        <option value="">-- Select Here --</option>
                        <option value="International" {{ $userpresent->conference_type == 'International' ? 'selected' : '' }}>International</option>
                        <option value="Local" {{ $userpresent->conference_type == 'Local' ? 'selected' : '' }}>Local</option>
                        <option value="National" {{ $userpresent->conference_type == 'National' ? 'selected' : '' }}>National</option>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="conference_title">Title of Conference/Symposium</label>
                        <input type="text" class="form-control" id="conference_title" name="conference_title" value="{{ $userpresent->conference_title }}">
                    </div><br>

                    <div class="form-group">
                        <label for="venue">Venue</label>
                        <input type="text" class="form-control" id="venue" name="venue" value="{{ $userpresent->venue }}">
                    </div><br>

                    <div class="form-group">
                        <label for="conference_date">Conference Date</label>
                        <input type="date" class="form-control" id="conference_date" name="conference_date" value="{{ $userpresent->conference_date }}">
                    </div><br>

                    <div class="form-group">
                        <label for="organizer">Organizer</label>
                        <input type="text" class="form-control" id="organizer" name="organizer" value="{{ $userpresent->organizer }}">
                    </div><br><br>

                    <h5><span>IF THE PAPER IS ALREADY PUBLISHED , KINDLY INDICATE THE REQUIRED FIELDS 
                    BELOW</span></h5>

                    <div class="form-group">
                        <label for="article_title">Title of the Article Published</label>
                        <input type="text" class="form-control" id="article_title" name="article_title" value="{{ $userpresent->article_title }}">
                    </div><br>

                    <div class="form-group">
                        <label for="publication_date">Publication Date</label>
                        <input type="date" class="form-control" id="publication_date" name="publication_date" value="{{ $userpresent->publication_date }}">
                    </div><br>

                    <div class="form-group">
                        <label for="journal_title">Title of the Journal</label>
                        <input type="text" class="form-control" id="journal_title" name="journal_title" value="{{ $userpresent->journal_title }}">
                    </div><br>

                    <div class="form-group">
                        <label for="editor">Editor/s <span> (if multiple inputs, separate with semicolon ';')</span></label>
                        <input type="text" class="form-control" id="editor" name="editor" value="{{ $userpresent->editor }}">
                    </div><br>

                    <div class="form-group">
                        <label for="publisher">Publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $userpresent->publisher }}">
                    </div><br>

                    <div class="form-group">
                        <label for="vol_issue_no">Vol. No. & Issue No.</label>
                        <input type="text" class="form-control" id="vol_issue_no" name="vol_issue_no" value="{{ $userpresent->vol_issue_no }}">
                    </div><br>

                    <div class="form-group">
                        <label for="page_no">Page number(s) and No. of Pages <span> (e.g. pp. 262-269)</span></label>
                        <input type="text" class="form-control" id="page_no" name="page_no" value="{{ $userpresent->page_no }}">
                    </div><br>

                    <div class="form-group">
                        <label for="publication_type">Type of Publication (International/National/Local) </label>
                        <select class="form-select" aria-label="Default select example" id="publication_type" name="publication_type" value="{{ $userpresent->publication_type }}">
                        <option value="">-- Select Here --</option>
                        <option value="International" {{ $userpresent->publication_type == 'International' ? 'selected' : '' }}>International</option>
                        <option value="Local" {{ $userpresent->publication_type == 'Local' ? 'selected' : '' }}>Local</option>
                        <option value="National" {{ $userpresent->publication_type == 'Local' ? 'selected' : '' }}>Local</option>
                        </select>
                    </div><br>
                    
                    <div class="form-group">
                        <label for="indexing">Indicate indexing of the Journal * Thomson Reuters –Indexed, Scopus-Indexed , CHED Accredited Journals, Others if (pls specify )</label>
                        <input type="text" class="form-control" id="indexing" name="indexing" value="{{ $userpresent->indexing }}">
                    </div><br>

                    <h5><span>You can choose to upload either of the two below</span></h5>
                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Upload Presentation File (optional) .pdf files only</label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf" >
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Presentation Link (optional)</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="http://example.com" value="{{ $userpresent->pr_link }}">
                    </div>
                    <br>
                </div>

                    <div class="modal-footer" style="background-color: #ebf4ff;">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
	</div>

<!-- View Presentation Modal -->
<div class="modal fade view-modal" id="viewPresentationModal{{ $userpresent->pr_id }}" tabindex="-1" aria-labelledby="viewPresentationModalLabel{{ $userpresent->pr_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background: #ebf4ff; max-height: 1000px; overflow-y: auto;">
            <h4>Presentation Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Presentation Details -->
                <div class="container container-publication">
                    <div class="row" style="border-bottom: 2px solid #fff;"></div>

                    <div class="row" style="border-bottom: 2px solid #fff;"><br><br>
                        <div class="col-3">Research Title</div>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;"><br><br>
                        <div class="col-3">Research Project Title</div>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_project_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Fund</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->fund }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Research Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->research_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">SO Number</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->so_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Researcher Name</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->researcher_name }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Presenter Name</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->presenter_name }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Duration</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_duration }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Started</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_started }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Completed</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->date_completed }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Approved Cost</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->cost }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Funding Source</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->funding_source }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Presentation Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->presentation_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Conference Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Conference Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Venue</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->venue }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Conference Date</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->conference_date }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Organizer</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->organizer }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Article Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->article_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Publication Date</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publication_date }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Journal Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->journal_title }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Editor</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->editor }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Publisher</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publisher }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Volume/Issue No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->vol_issue_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Page No.</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->page_no }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Publication Type</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->publication_type }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Indexing</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->indexing }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Presentation File</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                            @if ($userpresent->pr_file_path)
                                <a href="{{ asset($userpresent->pr_file_path) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ basename($userpresent->pr_file_path) }}</a>
                            @else
                                No file available
                            @endif
                        </div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">DOI link/Website Link</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">
                        @if ($userpresent->pr_link)
                                <a href="{{ asset($userpresent->pr_link) }}" target="_blank" style="color: #a41d21; text-decoration: underline;">{{ Str::limit($userpresent->pr_link, 20) }}{{ strlen($userpresent->pr_link) > 20 ? : '' }}</a>
                            @else
                                No link available
                            @endif
                        </div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Date Upload</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $userpresent->created_at }}</div>
                    </div>

                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Last Update</div><br><br>
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