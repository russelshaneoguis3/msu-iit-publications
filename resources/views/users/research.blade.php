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
<div class="modal fade" id="addResearchModal" tabindex="-1" aria-labelledby="addResearchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addResearchModalLabel" style="color: #ffffff">Add New Research</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.addResearch') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Research Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Research Description (Please include the SO No. and funding source)</label>
                        <textarea class="form-control" id="description" name="description" rows="10" required></textarea>
                    </div><br>

                    <!-- File Path Input -->
                    <div class="form-group">
                        <label for="file_path">Upload Research File (optional) .pdf files only</label>
                        <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                    </div><br>

                    <!-- Link Input -->
                    <div class="form-group">
                        <label for="link">Research Link (optional)</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="http://example.com">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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
        <p><i>This section allows researchers to upload their research files in PDF format only.</i></p>

        <br>
        
<!-- Add Research Button -->
<button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addResearchModal">
Add Research
</button>

	<br><br>

		<div class="table-responsive-md">
            <table class="table table-research">
                <thead>
                  <tr>
				  	<th>ID</th>
					<th>Title</th>
                    <th>Description</th>
                    <th>File Path</th>
                    <th>Link Path</th>
                    <th>Last Update</th>  
					<th>Action</th>
                  </tr>
                </thead>
                <tbody>
				@foreach($usersResearch as $userres)
                <tr>
				<td>{{ $userres->r_id }}</td>
                <td>{{ $userres->title }}</td>
                <td>{{ $userres->description }}</td>
                <td>
                    @if ($userres->r_file_path)
					<a id="file-table" href="{{ asset($userres->r_file_path) }}" target="_blank">{{ basename($userres->r_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($userres->r_link)
                        <a id="link-table" href="{{ $userres->r_link }}" target="_blank">{{ $userres->r_link }}</a>
                    @else
                        No link available
                    @endif
                </td>
                <td>{{ date('Y-m-d', strtotime($userres->updated_at)) }} <br>
                {{ date('h:i A', strtotime($userres->updated_at)) }}
               </td>
				<td>
				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editResearchModal{{ $userres->r_id }}">
						Edit
					</button>
				</td>
                </tr>
                
<!-- Edit Modal -->
<div class="modal fade" id="editResearchModal{{ $userres->r_id }}" tabindex="-1" aria-labelledby="editResearchModalLabel{{ $userres->r_id }}" aria-hidden="true">
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
                            <input type="text" class="form-control" id="title" name="title" value="{{ $userres->title }}" required>
                        </div><br>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description">Research Description (Please include the SO No. and funding source)</label>
                            <textarea class="form-control" id="description" name="description" rows="10" required>{{ $userres->description }}</textarea>
                        </div><br>

                        <!-- File Path Input -->
                        <div class="form-group">
                            <label for="file_path">Upload New Research File (optional), if no update you can skip this (.pdf files only)</label>
                            <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                        </div><br>

                        <!-- Link Input -->
                        <div class="form-group">
                            <label for="link">Research Link (optional)</label>
                            <input type="url" class="form-control" id="link" name="link" value="{{ $userres->r_link }}" placeholder="http://example.com">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
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