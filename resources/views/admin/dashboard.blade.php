<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSU-IIT Researchers' Repo</title>
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
			<li class="active">
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

		<div class="greeting-containerAdmin">
        <div class="greetingAdmin" id="greetingAdmin" style="color: #000"></div>
        <h4 style="color: #000">{{ $user->first_name }}</h4>
		</div>
		<i><div id="quoteAdmin" class="quoteAdmin"></div></i>
        <i><div id="authorAdmin" class="authorAdmin"></div></i>

<br>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Publication Card Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card publications-card">

                <div class="card-body publications">
                  <h5 class="card-title">Publications</h5>

                  <div class="d-flex align-items-center">
                      <i class="bx bx-globe"></i>
                    <div class="ps-3">
					<h6><b style="color: #bb8082">{{ $totalPublicationCount }}</b> <span>Overall Count</span></h6>
					<h6><b style="color: #bb8082">{{ $adminPublicationCount }} </b><span>Admin Publication</span></h6> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Publication Card -->

			<hr id = "publication-card-spacing">

            <!-- Research Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card research-card">

                <div class="card-body research">
                  <h5 class="card-title">Research</span></h5>

                  <div class="d-flex align-items-center">
                      <i class="bx bx-file-find"></i>
                    <div class="ps-3">
					<h6><b style="color: #ceb66f">{{ $totalResearchCount }}</b> <span>Overall Count</span></h6>
					<h6><b style="color: #ceb66f">{{ $adminResearchCount }} </b><span>Admin Research</span></h6> 

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Research Card -->

			<hr id = "research-report-spacing">

            <!-- Presentations Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card presentations-card">

                <div class="card-body presentations">
                  <h5 class="card-title">Presentations</span></h5>

                  <div class="d-flex align-items-center">
                      <i class="bx bx-spreadsheet"></i>
                    <div class="ps-3">
                      <h6><b style="color: #608BC1">{{ $totalPresentationCount }}</b> <span>Overall Count</span></h6>
                      <h6><b style="color: #608BC1">{{ $adminPresentationCount }}</b> <span>Admin Presentation</span></h6> 

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Presentations Card -->

<hr id = "linechart-report">

<!-- Reports -->
<div class="col-12">
    <div class="card reports" id="dashboard-cards-admin">
        <div class="card-body">
            <h5 class="card-title">
                <i class='bx bxs-report'></i> Reports | Performance Distribution (Last 5 Years)
            </h5>

            <br>

            <!-- Dropdown for Center Selection -->
            <select id="centerFilter" class="form-select form-select-sm">
                <option value="all">All Centers (Select Center here)</option>
                <!-- Dynamic options will be inserted here -->
            </select>

            <br>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    let chartInstance = null; // To hold the chart instance

                    // Fetch Centers and Populate the Dropdown
                    fetch('/dashboard/centers')
                        .then(response => response.json())
                        .then(data => {
                            const dropdown = document.querySelector('#centerFilter');
                            data.forEach(center => {
                                const option = document.createElement('option');
                                option.value = center.cid; // Assuming `cid` is the center ID
                                option.textContent = center.c_name; // Assuming `c_name` is the center name
                                dropdown.appendChild(option);
                            });
                        });

                    // Fetch and Render Chart Data
                    const fetchAndRenderData = (centerId = 'all') => {
                        fetch(`/dashboard/yearly-report?center=${centerId}`)
                            .then(response => response.json())
                            .then(data => {
                                console.log("Fetched Data:", data);
                                const years = data.map(item => item.year);
                                const publications = data.map(item => item.publications);
                                const research = data.map(item => item.research);
                                const presentations = data.map(item => item.presentations);

                                // Check if chartInstance exists and destroy the previous chart
                                if (chartInstance && typeof chartInstance.destroy === 'function') {
                                    chartInstance.destroy(); // Safely destroy previous chart
                                }

                                // Clear the chart container to avoid stacking charts
                                const chartContainer = document.querySelector("#reportsChart");
                                chartContainer.innerHTML = '';

                                // Add a small delay before rendering the new chart
                                setTimeout(() => {
                                    // Render the new chart after DOM has cleared
                                    chartInstance = new ApexCharts(chartContainer, {
                                        series: [
                                            { name: 'Publications', data: publications },
                                            { name: 'Research', data: research },
                                            { name: 'Presentations', data: presentations },
                                        ],
                                        chart: {
                                            height: 350,
                                            type: 'area',
                                            toolbar: { show: false },
                                        },
                                        markers: { size: 4 },
                                        colors: ['#bb8082', '#ceb66f', '#608BC1'],
                                        fill: {
                                            type: "gradient",
                                            gradient: {
                                                shadeIntensity: 1,
                                                opacityFrom: 0.9,
                                                opacityTo: 0.1,
                                                stops: [0, 90, 100],
                                            }
                                        },
                                        dataLabels: { enabled: false },
                                        stroke: { curve: 'smooth', width: 2 },
                                        xaxis: {
                                            categories: years,
                                        },
                                        tooltip: { x: { format: 'yyyy' } },
                                    }).render();
                                }, 200); // Wait for 200ms before rendering
                            })
                            .catch(err => console.error("Error fetching data:", err));
                    };

                    // Initial Render
                    fetchAndRenderData();

                    // Update chart when center is selected
                    document.querySelector('#centerFilter').addEventListener('change', (event) => {
                        const centerId = event.target.value;
                        console.log("Selected Center ID:", centerId); // Debug: Log selected center ID
                        fetchAndRenderData(centerId);
                    });
                });
              </script>


        </div>
    </div>
</div>


<hr id="announcement-report-spacing">

            <!-- Announcements  -->
            <div class="col-12">
              <div class="card announcement overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Announcements</span></h5>
                  <br>
                  <!-- Add Documentation Button -->
                    <button id="add-btn" type="button" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#addAnnouncementModal">
                    Add Announcement
                    </button>

                    <br><br>

                  <div class="table-responsive">
                  <table class="table table-announcement">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Upload Date</th>
                          <th>Last Update</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach($announcements as $announcement)
                      <tr>
                          <td>{{ $announcement->a_id }}</td>
                          <td>{{ $announcement->title }}</td>
                          <td>{{ $announcement->created_at }}</td>
                          <td>{{ $announcement->updated_at }}</td>
                          <td>
                          <!-- View Button -->
                          <button id="view-btn"class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#viewAnnouncementModal{{ $announcement->a_id }}">
                            View
                          </button>
                          <!-- Edit Button -->
                          <button id="edit-btn" class="btn btn-outline" data-bs-toggle="modal" data-bs-target="#editAnnouncementModal{{ $announcement->a_id }}">
                            Edit
                          </button>
                        </td>
                      </tr>

  <!-- Edit Modal -->
<div class="modal fade edit-modal" id="editAnnouncementModal{{ $announcement->a_id }}" tabindex="-1" aria-labelledby="editAnnouncementModalLabel{{ $announcement->a_id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAnnouncementModalLabel{{ $announcement->a_id }}" style="color: #ffffff">Edit Announcement Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.updateAnnouncement', $announcement->a_id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateEditForm()">
                    @csrf
                    @method('PUT') <!-- Specify that this is a PUT request -->
                    <div class="modal-body">
                        <!-- Title Input -->
                        <div class="form-group">
                            <label for="research_title">Announcement Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title }}" required>
                        </div><br>

                        <!-- Description Input -->
                        <div class="form-group">
                            <label for="description">Announcement Description</label>
                            <textarea class="form-control" id="description" name="description" rows="10">{{ $announcement->description }}</textarea>
                        </div><br>

                    </div>
                    <div class="modal-footer" style="background: #f5f1f2;">
                        <button id="updatebtn-close" type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button  id="updatebtn-save" type="submit" class="btn btn-outline">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
	</div>


<!-- Modal for Adding Announcement -->
<div class="modal fade add-modal" id="addAnnouncementModal" tabindex="-1" aria-labelledby="addAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAnnouncementModalLabel" style="color: #ffffff">Add New Announcement</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.addAnnouncement') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="modal-body">
                    <!-- Title Input -->
                    <div class="form-group">
                        <label for="title">Announcement Title/Type</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>

                    <!-- Description Input -->
                    <div class="form-group">
                        <label for="description">Announcement Description</label>
                        <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                    </div><br>

                </div>
                <div class="modal-footer" style="background: #f5f1f2">
                    <button type="button" id ="public-modal-botton-close" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id ="public-modal-botton-save" class="btn btn-outline">Save Document</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- View Announcement Modal -->
<div class="modal fade view-modal" id="viewAnnouncementModal{{ $announcement->a_id }}" tabindex="-1" aria-labelledby="viewAnnouncementModalLabel{{ $announcement->a_id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            @csrf
            <div class="modal-body" style="background: #f5f1f2;">
            <h4>Announcement Details
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="float:right"></button>
            </h4>
            <br>
                <!-- Start of Announcement Details -->
                <div class="container container-announcement">

                    <div class="row" style="border-bottom: 2px solid #fff;"></div>
                    
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Announcement Title</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $announcement->title }}</div>
                    </div>
                    <div class="row" style="border-bottom: 2px solid #fff;">
                        <div class="col-3">Announcement Description</div><br><br>
                        <div class="col-9" style="border-left: 2px solid #fff;">{{ $announcement->description }}</div>
                    </div>
                <!-- End of Announcement Details -->
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
            </div><!-- End Announcements Sales -->

          </div>
        </div><!-- End Left side columns -->

<hr id="filtered-table-report-spacing">

        <!-- Right side columns -->
        <div class="col-lg-4">

        <!-- Recent Activity -->
            <div class="card filtered-reports">

            <div class="card-body">
              <h5 class="card-title">Filtered Reports</h5>
			  <br>
			  <div class="activity">

            <!-- Filters -->
             
            <div class="col-md">
                    <!-- Center Filter -->
                    <label for="centerFiltered" class="form-label">Select Center</label>
                    <select id="centerFiltered" class="form-select form-select-sm">
                        <option value="all">All Centers</option>
                        <!-- Dynamic options will be inserted here -->
                    </select>
                </div>

            <div class="row">
                
            <div class="col-md-6">
                    <!-- Quarter Filter -->
                    <label for="quarterFilter" class="form-label">Select Quarter</label>
                    <select id="quarterFilter" class="form-select form-select-sm">
                        <option value="all">All Quarters</option>
                        <option value="1">Q1: Jan - Mar</option>
                        <option value="2">Q2: Apr - Jun</option>
                        <option value="3">Q3: Jul - Sep</option>
                        <option value="4">Q4: Oct - Dec</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <!-- Year Filter -->
                    <label for="yearFilter" class="form-label">Select Year</label>
                    <select id="yearFilter" class="form-select form-select-sm">
                        <!-- Dynamic year options will be inserted here -->
                    </select>
                </div>
            </div>
			  
                <!-- Table for displaying report details -->
                <div class="mt-4">
                    <h5>Report Details:</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Type</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background: #bb8082; border-top-left-radius: 20px;"><b>Publications</b></td>
                                <td style="background: #c29698; border-top-right-radius: 20px;"><b id="publicationsCount">0</b></td>
                            </tr>
                            <tr>
                                <td style="background: #ceb66f"><b>Research</b></td>
                                <td style="background: #d1c08c"><strong id="researchCount">0</strong></td>
                            </tr>
                            <tr>
                                <td style="background: #608BC1"><b>Presentations</b></td>
                                <td style="background: #87a6cc"><strong id="presentationsCount">0</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    // Fetch Centers and Populate the Dropdown
                    fetch('/dashboard/centers')
                        .then(response => response.json())
                        .then(data => {
                            console.log("Fetched Centers:", data); // Debug: Log fetched data
                            const dropdown = document.querySelector('#centerFiltered');
                            data.forEach(center => {
                                const option = document.createElement('option');
                                option.value = center.cid; // Center ID
                                option.textContent = center.c_name; // Center Name
                                dropdown.appendChild(option);
                            });
                        })
                        .catch(err => console.error("Error fetching centers:", err));

                    // Populate Year Dropdown
                    const populateYearDropdown = () => {
                        const yearDropdown = document.querySelector('#yearFilter');
                        const currentYear = new Date().getFullYear();

                        // Add "All Years" option
                        const allYearsOption = document.createElement('option');
                        allYearsOption.value = 'all';
                        allYearsOption.textContent = 'All Years';
                        yearDropdown.appendChild(allYearsOption);

                        // Add years from 2000 to the current year
                        for (let i = currentYear; i >= 2000; i--) {
                            const option = document.createElement('option');
                            option.value = i;
                            option.textContent = i;
                            yearDropdown.appendChild(option);
                        }
                    };

                    populateYearDropdown();

                    // Fetch and Update Report Details
                    const fetchAndUpdateReportDetails = (centerId = 'all', year = 'all', quarter = 'all') => {
                        fetch(`/dashboard/filtered-report?center=${centerId}&year=${year}&quarter=${quarter}`)
                            .then(response => response.json())
                            .then(data => {
                                console.log("Fetched Data:", data);

                                // Update text content dynamically
                                document.getElementById('publicationsCount').textContent = data.publications || 0;
                                document.getElementById('researchCount').textContent = data.research || 0;
                                document.getElementById('presentationsCount').textContent = data.presentations || 0;
                            })
                            .catch(err => console.error("Error fetching data:", err));
                    };

                    // Initial Render for default values
                    fetchAndUpdateReportDetails('all', 'all', 'all');

                    // Update when filters change
                    document.querySelector('#centerFiltered').addEventListener('change', (event) => {
                        const selectedCenter = event.target.value;
                        const selectedYear = document.querySelector('#yearFilter').value;
                        fetchAndUpdateReportDetails(selectedCenter, selectedYear);
                    });

                    document.querySelector('#yearFilter').addEventListener('change', (event) => {
                        const selectedYear = event.target.value;
                        const selectedCenter = document.querySelector('#centerFiltered').value;
                        fetchAndUpdateReportDetails(selectedCenter, selectedYear);
                    });

                    document.querySelector('#quarterFilter').addEventListener('change', (event) => {
                        const selectedQuarter = event.target.value;
                        const selectedCenter = document.querySelector('#centerFiltered').value;
                        const selectedYear = document.querySelector('#yearFilter').value;
                        fetchAndUpdateReportDetails(selectedCenter, selectedYear, selectedQuarter);
                    });
                });

            </script>

			
			</div>

            </div>
          </div><!-- End Filtered table -->

<hr id="activity-logs-report-spacing">

          <!-- Recent Activity -->
          <div class="card activity-logs">

            <div class="card-body">
              <h5 class="card-title">Activity Logs</h5>
			  <br>

			  <div class="activity">
			  <div class="table-responsive">
			  <table class="table table-activity-logs">
						<thead>
							<tr>
                <th scope="col" style="display: none;">Log ID</th>
								<th scope="col">Time</th>
								<th scope="col">User/Admin</th>
								<th scope="col">Activity</th>
								<th scope="col">Doc.ID</th>
								<th scope="col">Table </th>
							</tr>
						</thead>
						<tbody>
							@foreach ($activityLogs as $log)
								<tr>
                  <td style="display: none;">{{ $log->log_id }}</td>
									<td style="color: #a41d21">{{ $log->log_time_calc }}</td>
									<td>{{ $log->first_name }} {{ $log->last_name }}</td>
									<td>
										{{ $log->activity == 'UPDATE' ? 'Updated a document' 
											: ($log->activity == 'INSERT' ? 'Inserted a Document' 
											: 'Deleted a document') }}
									</td>
									<td>{{ $log->affected_doc }}</td>
									<td>{{ $log->table_name }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>

					</div>

            </div>
          </div><!-- End Recent Activity Logs -->

        </div><!-- End Right side columns -->

      </div>


@else
        <p>No user is logged in.</p>
@endif




		</main>
</section>


<script>
        // Function to determine the time of day and display the appropriate greeting
        function getGreeting() {
            const currentHour = new Date().getHours(); // Get current hour

            let greetingAdmin = "";

            // Determine the greeting based on the time of day
            if (currentHour >= 5 && currentHour < 12) {
                greetingAdmin = "Good Morning!";
            } else if (currentHour >= 12 && currentHour < 18) {
                greetingAdmin = "Good Afternoon!";
            } else {
                greetingAdmin = "Good Evening!";
            }

            // Display the greeting in the HTML element with id "greeting"
            document.getElementById("greetingAdmin").textContent = greetingAdmin;
        }

        // Call the function to set the greeting when the page loads
        window.onload = getGreeting;
</script>

<script>
	// Array of quotes
	const quotes = [
    { quote: "The only way to do great work is to love what you do.", author: "Steve Jobs" },
    { quote: "Life is what happens when you're busy making other plans.", author: "John Lennon" },
    { quote: "In the end, we only regret the chances we didn’t take.", author: "Lewis Carroll" },
    { quote: "Success is not final, failure is not fatal: It is the courage to continue that counts.", author: "Winston Churchill" },
    { quote: "It always seems impossible until it's done.", author: "Nelson Mandela" },
    { quote: "Believe you can and you're halfway there.", author: "Theodore Roosevelt" },
    { quote: "The best way to predict the future is to create it.", author: "Abraham Lincoln" },
    { quote: "Don’t watch the clock; do what it does. Keep going.", author: "Sam Levenson" },
    { quote: "You miss 100% of the shots you don’t take.", author: "Wayne Gretzky" },
    { quote: "The journey of a thousand miles begins with one step.", author: "Lao Tzu" },
    { quote: "It is never too late to be what you might have been.", author: "George Eliot" },
    { quote: "You must be the change you wish to see in the world.", author: "Mahatma Gandhi" },
    { quote: "The only limit to our realization of tomorrow is our doubts of today.", author: "Franklin D. Roosevelt" },
    { quote: "Success usually comes to those who are too busy to be looking for it.", author: "Henry David Thoreau" },
    { quote: "What you get by achieving your goals is not as important as what you become by achieving your goals.", author: "Zig Ziglar" },
    { quote: "Hardships often prepare ordinary people for an extraordinary destiny.", author: "C.S. Lewis" },
    { quote: "Do not wait to strike till the iron is hot, but make it hot by striking.", author: "William Butler Yeats" },
    { quote: "Opportunities don't happen. You create them.", author: "Chris Grosser" },
    { quote: "You can't go back and change the beginning, but you can start where you are and change the ending.", author: "C.S. Lewis" },
    { quote: "Everything you’ve ever wanted is on the other side of fear.", author: "George Addair" },
    { quote: "Dream big and dare to fail.", author: "Norman Vaughan" },
    { quote: "The only way to achieve the impossible is to believe it is possible.", author: "Charles Kingsleigh" },
    { quote: "The future belongs to those who believe in the beauty of their dreams.", author: "Eleanor Roosevelt" },
    { quote: "What lies behind us and what lies before us are tiny matters compared to what lies within us.", author: "Ralph Waldo Emerson" },
    { quote: "The pessimist sees difficulty in every opportunity. The optimist sees opportunity in every difficulty.", author: "Winston Churchill" },
    { quote: "You are never too old to set another goal or to dream a new dream.", author: "C.S. Lewis" },
    { quote: "It’s not whether you get knocked down, it’s whether you get up.", author: "Vince Lombardi" },
    { quote: "Act as if what you do makes a difference. It does.", author: "William James" },
    { quote: "The best revenge is massive success.", author: "Frank Sinatra" },
    { quote: "Doubt kills more dreams than failure ever will.", author: "Suzy Kassem" }
];


        // Check if a quote is stored in localStorage
        let dailyQuote = localStorage.getItem('dailyQuote');
        let dailyQuoteDate = localStorage.getItem('dailyQuoteDate');

        // If no quote is stored or it's a new day, choose a new quote
        const today = new Date().toDateString();
        if (dailyQuoteDate !== today) {
            const randomQuoteIndex = Math.floor(Math.random() * quotes.length);
            dailyQuote = quotes[randomQuoteIndex];
            // Save the quote and the date to localStorage
            localStorage.setItem('dailyQuote', JSON.stringify(dailyQuote));
            localStorage.setItem('dailyQuoteDate', today);
        } else {
            dailyQuote = JSON.parse(dailyQuote);
        }
        // Display the quote

        document.getElementById("quoteAdmin").textContent = `"${dailyQuote.quote}"`;
        document.getElementById("authorAdmin").textContent = `~${dailyQuote.author}`;
</script>


</body>

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

<!-- apexcharts -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>

<script>
        $(document).ready(function() {
            $('.table-activity-logs').DataTable({
                "paging": true,
                "searching": true,
                "lengthMenu": [10, 25, 50, 75, 100],  // Set the options for the number of rows per page
			"order": [[0, 'desc']]
            });
        });
</script>

<script>
        $(document).ready(function() {
            $('.table-announcement').DataTable({
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

</html>