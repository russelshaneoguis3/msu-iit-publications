<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Print | Researchers' Repo</title>
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

    <h6>FOR PUBLICATION:</h6>

    <table class="table table-bordered ">

        <tbody>

            <tr>
                <th>Research Title</th>
                <td>{{ $upublication->research_title }}</td>
            </tr>

            <tr>
                <th>Keywords:</th>
                <td>{{ $upublication->keywords }}</td>
            </tr>

            <tr>
                <th>Research Type</th>
                <td>{{ $upublication->research_type }}</td>
            </tr>

            <tr>
                <th>Objective/s</th>
                <td>{{ $upublication->objectives }}</td>
            </tr>

            <tr>
                <th>Beneficiariess</th>
                <td>{{ $upublication->beneficiaries }}</td>
            </tr>

            <tr>
                <th>Name of Researchers/Author</th>
                <td>{{ $upublication->authors }}</td>
            </tr>

            <tr>
                <th>Name of Co-author/s</th>
                <td>{{ $upublication->coauthors }}</td>
            </tr>

            <tr>
                <th>Duration (in terms of months)</th>
                <td>{{ $upublication->date_duration }}</td>
            </tr>

            <tr>
                <th>Date started</th>
                <td>{{ $upublication->date_started }}</td>
            </tr>

            <tr>
                <th>Date completed</th>
                <td>{{ $upublication->date_completed }}</td>
            </tr>

            <tr>
                <th>Approved Cost</th>
                <td>₱ {{ $upublication->cost }}</td>
            </tr>

            <tr>
                <th>Funding Source</th>
                <td>{{ $upublication->funding_source }}</td>
            </tr>

            <tr>
                <th>Date of Publication</th>
                <td>{{ $upublication->publication_date }}</td>
            </tr>

            <tr>
                <th>Title of the Journal or Name of Publication</th>
                <td>{{ $upublication->publication_title }}</td>
            </tr>

            <tr>
                <th>Editor/s</th>
                <td>{{ $upublication->editors }}</td>
            </tr>

            <tr>
                <th>Publisher</th>
                <td>{{ $upublication->publisher }}</td>
            </tr>

            <tr>
                <th>Vol. No. & Issue No.</th>
                <td>{{ $upublication->vol_issue_no }}</td>
            </tr>

            <tr>
                <th>No. of pages</th>
                <td>{{ $upublication->no_pages }}</td>
            </tr>

            <tr>
                <th>Type of publication (International/National/Local)</th>
                <td>{{ $upublication->publication_type }}</td>
            </tr>

            <tr>
                <th>ISSN/ISBN No.</th>
                <td>{{ $upublication->issn_isbn }}</td>
            </tr>

            <tr>
                <th>Press Release</th>
                <td>{{ $upublication->press_release }}</td>
            </tr>

            <tr>
                <th>DOI link:</th>
                <td>
                @php
                    $doiLink = $upublication->p_link;
                    $chunks = str_split($doiLink, 40); // Split the string into chunks of 40 characters
                    @endphp
                    @foreach ($chunks as $chunk)
                        <div>{{ $chunk }}</div>
                    @endforeach
        </td>
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