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
                <td>{{ $adpublication->research_title }}</td>
            </tr>

            <tr>
                <th>Keywords:</th>
                <td>{{ $adpublication->keywords }}</td>
            </tr>

            <tr>
                <th>Research Type</th>
                <td>{{ $adpublication->research_type }}</td>
            </tr>

            <tr>
                <th>Objective/s</th>
                <td>{{ $adpublication->objectives }}</td>
            </tr>

            <tr>
                <th>Beneficiariess</th>
                <td>{{ $adpublication->beneficiaries }}</td>
            </tr>

            <tr>
                <th>Name of Researchers/Author</th>
                <td>{{ $adpublication->authors }}</td>
            </tr>

            <tr>
                <th>Name of Co-author/s</th>
                <td>{{ $adpublication->coauthors }}</td>
            </tr>

            <tr>
                <th>Duration (in terms of months)</th>
                <td>{{ $adpublication->date_duration }}</td>
            </tr>

            <tr>
                <th>Date started</th>
                <td>{{ $adpublication->date_started }}</td>
            </tr>

            <tr>
                <th>Date completed</th>
                <td>{{ $adpublication->date_completed }}</td>
            </tr>

            <tr>
                <th>Approved Cost</th>
                <td>₱ {{ $adpublication->cost }}</td>
            </tr>

            <tr>
                <th>Funding Source</th>
                <td>{{ $adpublication->funding_source }}</td>
            </tr>

            <tr>
                <th>Date of Publication</th>
                <td>{{ $adpublication->publication_date }}</td>
            </tr>

            <tr>
                <th>Title of the Journal or Name of Publication</th>
                <td>{{ $adpublication->publication_title }}</td>
            </tr>

            <tr>
                <th>Editor/s</th>
                <td>{{ $adpublication->editors }}</td>
            </tr>

            <tr>
                <th>Publisher</th>
                <td>{{ $adpublication->publisher }}</td>
            </tr>

            <tr>
                <th>Vol. No. & Issue No.</th>
                <td>{{ $adpublication->vol_issue_no }}</td>
            </tr>

            <tr>
                <th>No. of pages</th>
                <td>{{ $adpublication->no_pages }}</td>
            </tr>

            <tr>
                <th>Type of publication (International/National/Local)</th>
                <td>{{ $adpublication->publication_type }}</td>
            </tr>

            <tr>
                <th>ISSN/ISBN No.</th>
                <td>{{ $adpublication->issn_isbn }}</td>
            </tr>

            <tr>
                <th>Press Release</th>
                <td>{{ $adpublication->press_release }}</td>
            </tr>

            <tr>
                <th>DOI link:</th>
                <td>
                     @php
                    $doiLink = $adpublication->p_link;
                    $chunks = str_split($doiLink, 40); // Split the string into chunks of 40 characters
                    @endphp
                    @foreach ($chunks as $chunk)
                        <div>{{ $chunk }}</div>
                    @endforeach</td>
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