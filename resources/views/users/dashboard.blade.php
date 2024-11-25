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
		<a href="{{ route('users.dashboard') }}" class="brand">
		<img src="../assets/img/msuiit-logo.png" alt="logo" class="nav-logo">
			<span id="logo-text" class="text">MSU-IIT Researchers' Repo</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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



		<main id ="main">

<div id="dashboard-user" class="dashboard-user">

		<div class="greeting-container">
        <div class="greeting" id="greeting"></div>
        <h4>{{ $user->first_name }}</h4>
		</div>
		
		<i><div id="quote" class="quote"></div></i>
        <i><div id="author" class="author"></div></i>

<br><br>
		
<section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


<!-- Reports -->
<div class="col-12">
  <div class="card" id="dashboard-cards">
    <div class="card-body">
      <h5 class="card-title"><i class='bx bxs-report'></i> Reports | Total Publications/Research/Presentations</h5>

      <!-- Line Chart -->
      <div id="reportsChart"></div>

	  <script>
			document.addEventListener("DOMContentLoaded", () => {
				fetch('/dashboard/yearly-report')
				.then(response => response.json())
				.then(data => {
					const years = data.map(item => item.year);
					const publications = data.map(item => item.publications);
					const research = data.map(item => item.research);
					const presentations = data.map(item => item.presentations);

					new ApexCharts(document.querySelector("#reportsChart"), {
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
				});
			});
		</script>

      <!-- End Line Chart -->

    </div>
  </div>
</div>



    </div>
</div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

<hr id="announcements">

		<div class="card announcements" id="dashboard-cards">
			<div class="card-body">
				<h5 class="card-title"><i class='bx bxs-bell-ring'></i> Announcements</h5>
				<div class="activity">
					@foreach ($announcements as $announcement)
						<div class="activity-item d-flex">
							<div class="activity-label" style="color: #a41d21">{{ $announcement->relative_time }} </div>
							<i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
							<div class="activity-content">
								<!-- Tooltip displaying full description on hover -->
								<span data-bs-toggle="tooltip" 
									title="{{ $announcement->description }}">
									<strong style="color: #000000">&nbsp {{ $announcement->title }}</strong> 
									<p style="color: #3170AB">- {{ $announcement->short_description }} </p>
								</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<!-- Include Bootstrap's JavaScript for tooltips -->
		<script>
			document.addEventListener("DOMContentLoaded", function() {
				var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
				var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
					return new bootstrap.Tooltip(tooltipTriggerEl)
				})
			});
		</script>

			<!-- End annoucennts  -->
				
<hr style=" opacity: 0; ">
		  
		  <!-- Activity Logs report -->
		<div class="card actlogs dashboard-cards" id="user-actlogs">
					<div class="card-body">
						<h5 class="card-title"><i class='bx bxs-calendar-edit'></i> Activity Logs</h5>
						<div class="activity">
							@foreach ($activityLogs as $log)
								<div class="activity-item d-flex">
									<div class="activity-label" style="color: #a41d21">{{ $log->log_time_calc }} </div>
									<i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
									<div class="activity-content">
									<p style="color: #000000;">&nbsp {{ $log->activity == 'UPDATE' ? 'Updated a document' 
																	: ($log->activity == 'INSERT' ? 'Inserted a Document' 
																	: 'Deleted a document') }} 

																	(ID. {{ $log->affected_doc }}) 
										
																	→

																	{{ $log->table_name }}
									</p> 

								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

			<!-- end activity logs -->


        </div><!-- End Right side columns -->

      </div>
    </section>

<!-- end of cards -->

</div>



@else
<p>No user is logged in.</p>
@endif

</main>

<script>
        // Function to determine the time of day and display the appropriate greeting
        function getGreeting() {
            const currentHour = new Date().getHours(); // Get current hour

            let greeting = "";

            // Determine the greeting based on the time of day
            if (currentHour >= 5 && currentHour < 12) {
                greeting = "Good Morning!";
            } else if (currentHour >= 12 && currentHour < 18) {
                greeting = "Good Afternoon!";
            } else {
                greeting = "Good Evening!";
            }

            // Display the greeting in the HTML element with id "greeting"
            document.getElementById("greeting").textContent = greeting;
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

        document.getElementById("quote").textContent = `"${dailyQuote.quote}"`;
        document.getElementById("author").textContent = `~${dailyQuote.author}`;
</script>


<script>

// Array of background images (you should update the image paths to match your actual image filenames)
const backgrounds = [
    'url(../assets/img/userdashboard/dashboard1.jpg)',
    'url(../assets/img/userdashboard/dashboard2.jpg)',
    'url(../assets/img/userdashboard/dashboard3.jpg)',
    'url(../assets/img/userdashboard/dashboard4.jpg)',
    'url(../assets/img/userdashboard/dashboard5.jpg)',
    'url(../assets/img/userdashboard/dashboard6.jpg)',
    'url(../assets/img/userdashboard/dashboard7.jpg)',
    'url(../assets/img/userdashboard/dashboard8.jpg)',
    'url(../assets/img/userdashboard/dashboard9.jpg)',
    'url(../assets/img/userdashboard/dashboard10.jpg)',
    'url(../assets/img/userdashboard/dashboard11.jpg)',
    'url(../assets/img/userdashboard/dashboard12.jpg)',
    'url(../assets/img/userdashboard/dashboard13.jpg)',
    'url(../assets/img/userdashboard/dashboard14.jpg)',
    'url(../assets/img/userdashboard/dashboard15.jpg)',
    'url(../assets/img/userdashboard/dashboard16.jpg)',
    'url(../assets/img/userdashboard/dashboard17.jpg)',
    'url(../assets/img/userdashboard/dashboard18.jpg)',
    'url(../assets/img/userdashboard/dashboard19.jpg)',
    'url(../assets/img/userdashboard/dashboard20.jpg)',
    'url(../assets/img/userdashboard/dashboard21.jpg)',
    'url(../assets/img/userdashboard/dashboard22.jpg)',
    'url(../assets/img/userdashboard/dashboard23.jpg)',
    'url(../assets/img/userdashboard/dashboard24.jpg)',
    'url(../assets/img/userdashboard/dashboard25.jpg)',
	'url(../assets/img/userdashboard/dashboard26.jpg)',
	'url(../assets/img/userdashboard/dashboard27.jpg)',
	'url(../assets/img/userdashboard/dashboard28.jpg)',
	'url(../assets/img/userdashboard/dashboard29.jpg)',
	'url(../assets/img/userdashboard/dashboard30.jpg)'
];

const FIVE_MINUTES = 300000; // 5 minutes in milliseconds

// Function to pick a random background image
function getRandomBackground() {
	const randomIndex = Math.floor(Math.random() * backgrounds.length);
	return backgrounds[randomIndex];
}

// Function to change the background
function changeBackground() {
	const newBackgroundImage = getRandomBackground();
	document.getElementById('dashboard-user').style.backgroundImage = newBackgroundImage;

	// Save the current timestamp and background in localStorage
	localStorage.setItem('lastChangeTime', Date.now());
	localStorage.setItem('lastBackground', newBackgroundImage);
}

// Initialize background on page load
function initializeBackground() {
	const lastChangeTime = localStorage.getItem('lastChangeTime');
	const lastBackground = localStorage.getItem('lastBackground');

	// If there's a saved background and it hasn't been 5 minutes, use it
	if (lastChangeTime && Date.now() - lastChangeTime < FIVE_MINUTES && lastBackground) {
		document.getElementById('dashboard-user').style.backgroundImage = lastBackground;
	} else {
		// Otherwise, change the background
		changeBackground();
	}
}

// Call initializeBackground on page load
initializeBackground();

</script>

</body>

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

<!-- apexcharts -->
<script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>

<!-- sweet alert JS -->
<script src="../assets/vendor/sweetalert/sweetalert.js"></script>

</html>