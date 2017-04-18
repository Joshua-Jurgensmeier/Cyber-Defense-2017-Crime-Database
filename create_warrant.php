<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Create Warrant</title>
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
			<h1>Create Warrant</h1>
			<form id='create-warrant-form' action="#">
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" class="form-control" id="title" aria-describedby="Enter the title here." placeholder="Enter title" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="person">Person</label>
					<input type="text" class="form-control" id="person" aria-describedby="Enter the person here." placeholder="Enter person" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="granted_date">Granted Date</label>
					<input type="text" class="form-control" id="granted_date" aria-describedby="Enter the granted_date here." placeholder="Enter granted_date in YYYY-MM-DD format." autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="served_at">Served At</label>
					<input type="text" class="form-control" id="served_at" aria-describedby="Enter the served_at here." placeholder="Enter served_at in YYYY-MM-DD HH:MM:SS format." autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="served_by">Served By</label>
					<input type="text" class="form-control" id="served_by" aria-describedby="Enter the served_by here." placeholder="Enter served_by" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<button type="submit" class="btn btn-primary">Create Warrant</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitCreateWarrantForm() {
				var title = $('#title').val();
				var person = $('#person').val();
				var granted_date = $('#granted_date').val();
				var served_at = $('#served_at').val();
				var served_by = $('#served_by').val();

				AppCreateWarrant(title, person, granted_date, served_at, served_by);
			}

			$(document).ready(function() {
				$('#create-warrant-form').submit(function(ev) {
					SubmitCreateWarrantForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
