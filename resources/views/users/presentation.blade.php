<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation | Researchers' Repo</title>
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
		<img src="../assets/img/web-logo.png" alt="logo" class="nav-logo">
			<span class="text">MSU-IIT Researchers' Repo</span>
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
		<ul class="side-menu">
			<li>
				<a href="{{ route('logout') }}" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
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
		</nav>
		<!-- NAVBAR -->

@if(isset($user))

	<main id ="main">

<!-- Modal for Adding Presentation -->
<div class="modal fade" id="addPresentationModal" tabindex="-1" aria-labelledby="addPresentationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #a41d21;">
                <h5 class="modal-title" id="addPresentationModalLabel" style="color: #ffffff">Add New Presentation</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.addPresentation') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Presentation Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Presentation Description (Please include What, When, Where)</label>
                        <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                    </div><br>

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
                <div class="modal-footer">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
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

		<div class="table-responsive-md">
            <table class="table table-presentation">
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
				@foreach($usersPresentation as $userpresent)
                <tr>
				<td>{{ $userpresent->pr_id }}</td>
                <td>{{ $userpresent->title }}</td>
                <td>{{ $userpresent->description }}</td>
                <td>
                    @if ($userpresent->pr_file_path)
					<a id="file-table" href="{{ asset($userpresent->pr_file_path) }}" target="_blank">{{ basename($userpresent->pr_file_path) }}</a>
                    @else
                        No file available
                    @endif
                </td>
                <td>
                    @if ($userpresent->pr_link)
                        <a id="link-table" href="{{ $userpresent->pr_link }}" target="_blank">{{ $userpresent->pr_link }}</a>
                    @else
                        No link available
                    @endif
                </td>
                <td>{{ date('Y-m-d', strtotime($userpresent->updated_at)) }}<br>
                {{ date('h:i A', strtotime($userpresent->updated_at)) }}
                </td>
				<td>
				<!-- Edit Button -->
					<button id="edit-btn"class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editPresentationModal{{ $userpresent->pr_id }}">
						Edit
					</button>
				</td>
                </tr>
                
<!-- Edit Modal -->
<div class="modal fade" id="editPresentationModal{{ $userpresent->pr_id }}" tabindex="-1" aria-labelledby="editPresentationModalLabel{{ $userpresent->pr_id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background: #a41d21">
                    <h5 class="modal-title" id="editPresentationModalLabel{{ $userpresent->pr_id }}" style="color: #ffffff">Edit Presentation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('users.updatePresentation', $userpresent->pr_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                            <label for="title">Presentation Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $userpresent->title }}" required>
                        </div><br>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description">Presentation Description (Please include What, When, Where)</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ $userpresent->description }}</textarea>
                        </div><br>

                        <!-- File Path Input -->
                        <div class="form-group">
                            <label for="file_path">Upload New Presentation File (optional), if no update you can skip this (.pdf files only)</label>
                            <input type="file" class="form-control" id="file_path" name="file_path" accept=".pdf">
                        </div><br>

                        <!-- Link Input -->
                        <div class="form-group">
                            <label for="link">Presentation Link (optional)</label>
                            <input type="url" class="form-control" id="link" name="link" value="{{ $userpresent->pr_link }}" placeholder="http://example.com">
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