<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research | Researchers' Repo</title>
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
    <link rel="stylesheet" href="../assets/vendor/datatables/datatables.bootstrap4.css" rel="stylesheet">

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
			<span id="logo-text" class="text"> MSU-IIT Researchers' Repo</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="{{ route('users.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
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


<!-- Modal for Adding research -->
<div class="modal fade add-modal" id="addResearchModal" tabindex="-1" aria-labelledby="addResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResearchModalLabel" style="color: #ffffff">Add New Research</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p style="color: #a41d21; padding: 20px; text-align: justify">Please fill out all the input fields, particularly the Research Start Date, as it is required for calculating the research count and yearly analytics. You can also either provide the SO link from IIT documents or upload the Research Project Proposal File in .pdf format. </p>
            <form action="{{ route('users.addResearch') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Research Title</label>
                        <input type="text" class="form-control" id="research_title" name="research_title" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Research Description <span>(Optional)</span></label>
                        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                    </div><br>
                    
                    <p><span style="color: #a41d21">Include your name if you are one of the Project Leader or Project Member</span></p>
                    <!-- Leaders Input -->
                    <div class="form-group">
                        <label for="leaders">Research Project Leader/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="leaders" name="leaders" >
                    </div><br>

                    <!-- Members Input -->
                    <div class="form-group">
                        <label for="members">Research Project member/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="members" name="members" >
                    </div><br>

                    <!-- research_type Input -->
                    <div class="form-group">
                        <label for="research_type">Research Type  <span>(Applied/Basic, e.g. Basic)</span></label>
                        <select class="form-select" id="research_type" name="research_type">
                            <option value="">-- Select Here --</option>
                            <option value="Applied">Applied</option>
                            <option value="Basic">Basic</option>
                            <option value="Others">Others</option>
                        </select>
                    </div><br>

                    <!-- so_no  Input -->
                    <div class="form-group">
                        <label for="so_no">Special Order No.<span> (e.g. SO No. 00001-2024)</span></label>
                        <input type="text" class="form-control" id="so_no" name="so_no" >
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Special Order Link from IIT Docs <span>(optional)</span></label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="https://myiit.msuiit.edu.ph/my/v2/apps/iitdocs/index.php?ref=home">
                    </div><br>

                    <!-- Time Duration Input -->
                    <div class="form-group">
                        <label for="date_duration">Date Duration  <span>(in terms of months, e.g. 10 months)</span></label>
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
                        <label for="cost">Approved Cost - Direct Cost <span> (in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost">
                    </div><br>

                    <!-- Funding Source Input -->
                    <div class="form-group">
                        <label for="funding_source">Funding Source <span>(e.g. OVCRE-OPF)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source">
                    </div><br>

                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Upload Research Project Proposal File <span>(.pdf files only)</span></label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                    </div><br>

                </div>
                <div class="modal-footer" style="background-color: #fffbee;">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Research</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DataTable for users -->
<div class="card">
<div class="card-body">
        <h4 class="card-title">Researchers' Research </h4>
        <p><i>This section allows researchers to upload their research details and research proposal file in PDF format only.</i></p>

        <br>
        
<!-- Add Research Button -->
<button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addResearchModal">
Add Research
</button>

	<br><br>

		<div class="table-responsive">
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
				@foreach($usersResearch as $userres)
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
				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editResearchModal{{ $userres->r_id }}">
						Edit
					</button>
                <!-- Print Button -->
                <a href="{{ route('users.print.research', ['r_id' => $userres->r_id]) }}" 
                class="btn btn-outline-primary" id="print-btn"
                target="_blank">
                    Print
                </a>

				</td>
                </tr>
                
<!-- Edit Modal -->
<div class="modal fade edit-modal" id="editResearchModal{{ $userres->r_id }}" tabindex="-1" aria-labelledby="editResearchModalLabel{{ $userres->r_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editResearchModalLabel{{ $userres->r_id }}" style="color: #ffffff">Edit Research</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.updateResearch', $userres->r_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                        <label for="title">Research Title</label>
                        <input type="text" class="form-control" id="research_title" name="research_title" value="{{ $userres->research_title }}" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Research Description <span>(Optional)</span></label>
                        <textarea class="form-control" id="description" name="description" rows="10">{{ $userres->description }} </textarea>
                    </div><br>
                    
                    <p><span style="color: #a41d21">Include your name if you are one of the Project Leader or Project Member</span></p>
                    <!-- Leaders Input -->
                    <div class="form-group">
                        <label for="leaders">Research Project Leader/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="leaders" name="leaders" value="{{ $userres->leaders }}" >
                    </div><br>

                    <!-- Members Input -->
                    <div class="form-group">
                        <label for="members">Research Project member/s <span>(Separate with semicolon/s ';' for multiple inputs)</span></label>
                        <input type="text" class="form-control" id="members" name="members" value="{{ $userres->members }}">
                    </div><br>

                    <!-- research_type Input -->
                    <div class="form-group">
                        <label for="research_type">Research Type  <span>(Applied/Basic, e.g. Basic)</span></label>
                        <select class="form-select" id="research_type" name="research_type">
                            <option value="">-- Select Here --</option>
                            <option value="Applied" {{ $userres->research_type == 'Applied' ? 'selected' : '' }}>Applied</option>
                            <option value="Basic" {{ $userres->research_type == 'Basic' ? 'selected' : '' }}>Basic</option>
                            <option value="Others"{{ $userres->research_type == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div><br>

                    <!-- so_no  Input -->
                    <div class="form-group">
                        <label for="so_no">Special Order No.<span> (e.g. SO No. 00001-2024)</span></label>
                        <input type="text" class="form-control" id="so_no" name="so_no" value="{{ $userres->so_no }}">
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Special Order Link from IIT Docs <span>(optional)</span></label>
                        <input type="url" class="form-control" id="link" name="link" value="{{ $userres->r_link }}" placeholder="https://myiit.msuiit.edu.ph/my/v2/apps/iitdocs/index.php?ref=home">
                    </div><br>

                    <!-- Time Duration Input -->
                    <div class="form-group">
                        <label for="date_duration">Date Duration  <span>(in terms of months, e.g. 10 months)</span></label>
                        <select class="form-select" id="date_duration" name="date_duration">
                            <option value="">-- Select Here --</option>
                            <option value="1 month" {{ $userres->date_duration == '1 month' ? 'selected' : '' }}>1 month</option>
                            <option value="2 months" {{ $userres->date_duration == '2 months' ? 'selected' : '' }}>2 months</option>
                            <option value="3 months" {{ $userres->date_duration == '3 months' ? 'selected' : '' }}>3 months</option>
                            <option value="4 months" {{ $userres->date_duration == '4 months' ? 'selected' : '' }}>4 months</option>
                            <option value="5 months" {{ $userres->date_duration == '5 months' ? 'selected' : '' }}>5 months</option>
                            <option value="6 months" {{ $userres->date_duration == '6 months' ? 'selected' : '' }}>6 months</option>
                            <option value="7 months" {{ $userres->date_duration == '7 months' ? 'selected' : '' }}>7 months</option>
                            <option value="8 months" {{ $userres->date_duration == '8 months' ? 'selected' : '' }}>8 months</option>
                            <option value="9 months" {{ $userres->date_duration == '9 months' ? 'selected' : '' }}>9 months</option>
                            <option value="10 months" {{ $userres->date_duration == '10 months' ? 'selected' : '' }}>10 months</option>
                            <option value="11 months" {{ $userres->date_duration == '11 months' ? 'selected' : '' }}>11 months</option>
                            <option value="12 months" {{ $userres->date_duration == '12 months' ? 'selected' : '' }}>12 months</option>
                            <option value="13 months" {{ $userres->date_duration == '13 months' ? 'selected' : '' }}>13 months</option>
                            <option value="14 months" {{ $userres->date_duration == '14 months' ? 'selected' : '' }}>14 months</option>
                            <option value="15 months" {{ $userres->date_duration == '15 months' ? 'selected' : '' }}>15 months</option>
                            <option value="16 months" {{ $userres->date_duration == '16 months' ? 'selected' : '' }}>16 months</option>
                            <option value="17 months" {{ $userres->date_duration == '17 months' ? 'selected' : '' }}>17 months</option>
                            <option value="18 months" {{ $userres->date_duration == '18 months' ? 'selected' : '' }}>18 months</option>
                            <option value="19 months" {{ $userres->date_duration == '19 months' ? 'selected' : '' }}>19 months</option>
                            <option value="20 months" {{ $userres->date_duration == '20 months' ? 'selected' : '' }}>20 months</option>
                            <option value="21 months" {{ $userres->date_duration == '21 months' ? 'selected' : '' }}>21 months</option>
                            <option value="22 months" {{ $userres->date_duration == '22 months' ? 'selected' : '' }}>22 months</option>
                            <option value="23 months" {{ $userres->date_duration == '23 months' ? 'selected' : '' }}>23 months</option>
                            <option value="24 months" {{ $userres->date_duration == '24 months' ? 'selected' : '' }}>24 months</option>
                            <option value="24+ months" {{ $userres->date_duration == '24+ months' ? 'selected' : '' }}>24+ months</option>
                        </select>
                    </div><br>

                    
                    <!-- Date Started Input -->
                    <div class="form-group">
                        <label for="date_started">Date Started</label>
                        <input type="date" class="form-control" id="date_started" name="date_started" value="{{ $userres->date_started }}">
                    </div><br>

                    <!-- Date Completed Input -->
                    <div class="form-group">
                        <label for="date_completed">Date Completed</label>
                        <input type="date" class="form-control" id="date_completed" name="date_completed" value="{{ $userres->date_completed }}">
                    </div><br>

                    <!-- Cost Input -->
                    <div class="form-group">
                        <label for="cost">Approved Cost - Direct Cost <span> (in peso, e.g. 1000000)</span></label>
                        <input type="text" class="form-control" id="cost" name="cost" value="{{ $userres->cost }}">
                    </div><br>

                    <!-- Funding Source Input -->
                    <div class="form-group">
                        <label for="funding_source">Funding Source <span>(e.g. OVCRE-OPF)</span></label>
                        <input type="text" class="form-control" id="funding_source" name="funding_source" value="{{ $userres->funding_source }}">
                    </div><br>

                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Research Project Proposal File <span>(.pdf files only)</span></label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                    </div><br>

                    </div>
                    <div class="modal-footer" style="background-color: #fffbee;">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
	</div>

<!-- View Research Modal -->
<div class="modal fade view-modal" id="viewResearchModal{{ $userres->r_id }}" tabindex="-1" aria-labelledby="viewResearchModalLabel{{ $userres->r_id }}" aria-hidden="true">
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
                        <div class="col-3">Research Project Members</div><br><br>
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
            $('.table-research').DataTable({
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