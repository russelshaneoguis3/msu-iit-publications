<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Print | Researchers' Repo</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	 <!-- Favicons -->
	 <link href="{{ asset('assets/img/web-logo.png') }}" rel="icon">
  	<link href="{{ asset('assets/img/web-logo.png') }}" rel="apple-touch-icon">

	<!-- bootstrap css -->
	<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- My CSS -->

    <link rel="stylesheet" href="{{ asset('general/print.css') }}">


</head>
<body>
@csrf  <!-- CSRF token -->

	</section>
	<!-- SIDEBAR -->

@if(isset($user))

		</nav>
		<!-- NAVBAR -->

<main id="main">

<div class="container">
    <br>

    <div id="header-container">
        <img id="header-pic" src="{{ asset('assets/img/web-logo.png') }}" alt="logo" class="nav-logo">
        <div>
            <p><b>Republic of the Philippines</b></p>
            <h6><b>ILIGAN INSTITUTE OF TECHNOLOGY</b></h6>
            <p>of the Mindanao State University</p>
        </div>
    </div>

    <br>

    <div id="text-container">
    <p id="link">www.msuiit.edu.ph</p>
    <p id="influencing-text">Influencing the future</p>
    </div>
    <hr>

    <br>

    <h5 id="matrix">MATRIX</h5>

    <h6>FOR RESEARCH:</h6>

    <table class="table table-bordered ">

        <tbody>
            <tr>
                <th>Research Title</th>
                <td>{{ $adresearch->research_title }}</td>
            </tr>
            <tr>
                <th>Research Description</th>
                <td>{{ $adresearch->description }}</td>
            </tr>
            <tr>
                <th>Research Project Leader/s</th>
                <td>{{ $adresearch->leaders }}</td>
            </tr>
            <tr>
                <th>Research Project Member/s</th>
                <td>{{ $adresearch->members }}</td>
            </tr>
            <tr>
                <th>Research Project Type</th>
                <td>{{ $adresearch->research_type }}</td>
            </tr>
            <tr>
                <th>Special Order No.</th>
                <td>{{ $adresearch->so_no }}</td>
            </tr>
            <tr>
                <th>Special Order Link</th>
                <td>
                  {{ $adresearch->r_link }}
                </td>
            </tr>
            <tr>
                <th>Date Duration</th>
                <td>{{ $adresearch->date_duration }}</td>
            </tr>
            <tr>
                <th>Date Started</th>
                <td>{{ $adresearch->date_started }}</td>
            </tr>
            <tr>
                <th>Completion Date</th>
                <td>{{ $adresearch->date_completed }}</td>
            </tr>
            <tr>
                <th>Approved Cost (Direct Cost)</th>
                <td>₱ {{ $adresearch->cost }}</td>
            </tr>
            <tr>
                <th>Funding Source</th>
                <td>{{ $adresearch->funding_source }}</td>
            </tr>

        </tbody>
    </table>
</div>


@else
	<p>No user is logged in.</p>
@endif


</main>

</section>

<script>
    window.onload = function() {
    window.print();
    }
</script>

</body>

</html>