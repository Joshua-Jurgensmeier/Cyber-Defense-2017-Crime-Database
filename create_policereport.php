<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Create Police Report</title>
		<?php
			require_once __DIR__ . '/Includes/head.php'
		?>
		<script>AppLoadUser(CheckAdmin);</script>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/Includes/header.php'
		?>
		<div class="create-page">
			<h1>Create Police Report</h1>
			<form id='create-policereport-form' action="#">
				<div class="form-group">
					<label for="reporting_officer">Reporting Officer</label>
					<input type="text" class="form-control" id="reporting_officer" aria-describedby="Enter the reporting_officer here." placeholder="Enter reporting_officer" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="report_time">Report Time</label>
					<input type="text" class="form-control" id="report_time" aria-describedby="Enter the report_time here." placeholder="Enter report_time in YYYY-MM-DD HH:MM:SS format." autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="offense_time">Offense Time</label>
					<input type="text" class="form-control" id="offense_time" aria-describedby="Enter the offense_time here." placeholder="Enter offense_time in YYYY-MM-DD HH:MM:SS format." autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" aria-describedby="Enter the title here." placeholder="Enter title" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" class="form-control" id="description" aria-describedby="Enter the description here." placeholder="Enter description" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="reporting_person">Reporting Person</label>
					<input type="text" class="form-control" id="reporting_person" aria-describedby="Enter the reporting_person here." placeholder="Enter reporting_person" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>

				<button type="submit" class="btn btn-primary">Create Police Report</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitCreatePoliceReportForm() {
				var reporting_officer = $('#reporting_officer').val();
				var report_time = $('#report_time').val();
				var offense_time = $('#offense_time').val();
				var title = $('#title').val();
				var description = $('#description').val();
				var reporting_person = $('#reporting_person').val();

				AppCreatePoliceReport(reporting_officer, report_time, offense_time, title, description, reporting_person);
			}

			$(document).ready(function() {
				$('#create-policereport-form').submit(function(ev) {
					SubmitCreatePoliceReportForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
