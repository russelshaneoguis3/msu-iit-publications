<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presentation Print | Researchers' Repo</title>
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

    <h6>PAPER PRESENTATION:</h6>

    <table class="table table-bordered ">

        <tbody>

            <tr>
                <th>Research Title</th>
                <td>{{ $upresentation->research_title }}</td>
            </tr>
            <tr>
                <th>Research Project Title</th>
                <td>{{ $upresentation->research_project_title }}</td>
            </tr>
            <tr>
                <th>Internally funded , Externally 
                funded or Patriotic Research</th>
                <td>{{ $upresentation->fund }}</td>
            </tr>
            <tr>
                <th>Research Type</th>
                <td>{{ $upresentation->research_type }}</td>
            </tr>
            <tr>
                <th>Special Order No.</th>
                <td>{{ $upresentation->so_no }}</td>
            </tr>
            <tr>
                <th>Name of Researcher(s)/Author</th>
                <td>{{ $upresentation->researcher_name }}</td>
            </tr>
            <tr>
                <th>Presenter * Pls. specify if (Faculty, Graduate or Undergraduate) </th>
                <td>{{ $upresentation->presenter_name }}</td>
            </tr>
            <tr>
                <th>Research Duration</th>
                <td>{{ $upresentation->date_duration }}</td>
            </tr>
            <tr>
                <th>Date Started</th>
                <td>{{ $upresentation->date_started }}</td>
            </tr>
            <tr>
                <th>Completion Date</th>
                <td>{{ $upresentation->date_completed }}</td>
            </tr>
            <tr>
                <th>Approved Cost</th>
                <td>₱ {{ $upresentation->cost }}</td>
            </tr>
            <tr>
                <th>Funding Source</th>
                <td>{{ $upresentation->funding_source }}</td>
            </tr>
            <tr>
                <th>Type of Presentation (Oral/Poster)</th>
                <td>{{ $upresentation->presentation_type }}</td>
            </tr>
            <tr>
                <th>Type of Conference (International/National/Local)</th>
                <td>{{ $upresentation->conference_type }}</td>
            </tr>
            <tr>
                <th>Title of Conference/Symposium</th>
                <td>{{ $upresentation->conference_title }}</td>
            </tr>
            <tr>
                <th>Venue</th>
                <td>{{ $upresentation->venue }}</td>
            </tr>
            <tr>
                <th>Conference Date</th>
                <td>{{ $upresentation->conference_date }}</td>
            </tr>
            <tr>
                <th>Organizer</th>
                <td>{{ $upresentation->organizer }}</td>
            </tr>
            <tr>
            <th colspan="2">
                IF THE PAPER IS ALREADY PUBLISHED, KINDLY INDICATE THE REQUIRED FIELDS BELOW 
                Note: A part of the results to be presented is published in the following paper. However, the greater substance will be submitted for publication.
            </th>
            </tr>
            <tr>
                <th>Title of the Article Published</th>
                <td>{{ $upresentation->article_title }}</td>
            </tr>
            <tr>
                <th>Date of Publication</th>
                <td>{{ $upresentation->publication_date }}</td>
            </tr>
            <tr>
                <th>Journal Title</th>
                <td>{{ $upresentation->journal_title }}</td>
            </tr>
            <tr>
                <th>Editor/s</th>
                <td>{{ $upresentation->editor }}</td>
            </tr>
            <tr>
                <th>Publisher</th>
                <td>{{ $upresentation->publisher }}</td>
            </tr>
            <tr>
                <th>Vol. No. & Issue No.</th>
                <td>{{ $upresentation->vol_issue_no }}</td>
            </tr>
            <tr>
                <th>Page number(s) and No. of Pages</th>
                <td>{{ $upresentation->page_no }}</td>
            </tr>
            <tr>
                <th>Type of Publication (International/National/Local)</th>
                <td>{{ $upresentation->publication_type }}</td>
            </tr>
            <tr>
                <th>Indicate indexing of the Journal * Thomson Reuters –Indexed,Scopus-Indexed , CHED Accredited Journals, Others if (pls specify )</th>
                <td>{{ $upresentation->indexing }}</td>
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