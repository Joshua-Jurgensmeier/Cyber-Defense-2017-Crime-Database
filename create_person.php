<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Create Person</title>
		<?php
			require_once __DIR__ . '/Includes/head.php'
		?>
		<script>CheckAdmin();</script>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/Includes/header.php'
		?>
		<div class="create-page">
			<h1>Create Person</h1>
			<form id='create-person-form' action="#">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" aria-describedby="Enter the name here." placeholder="Enter name" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="dob">Date of Birth</label>
					<input type="text" class="form-control" id="dob" aria-describedby="Enter the date of birth here. Must be YYYY-MM-DD" placeholder="Enter date of birth in YYYY-MM-DD format." autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="ssn">SSN</label>
					<input type="text" class="form-control" id="ssn" aria-describedby="Enter the ssn here." placeholder="Enter ssn" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<button type="submit" class="btn btn-primary">Create Person</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitCreatePersonForm() {
				var name = $('#name').val();
				var dob = $('#dob').val();
				var ssn = $('#ssn').val();
				AppCreatePerson(name, dob, ssn);
			}

			$(document).ready(function() {
				$('#create-person-form').submit(function(ev) {
					SubmitCreatePersonForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
