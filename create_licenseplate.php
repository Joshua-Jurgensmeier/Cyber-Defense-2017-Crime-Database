<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Create License Plate</title>
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
			<h1>Create License Plate</h1>
			<form id='create-licenseplate-form' action="#">
				<div class="form-group">
					<label for="plate">Plate</label>
					<input type="text" class="form-control" id="plate" aria-describedby="Enter the plate here." placeholder="Enter plate" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="brand">Brand</label>
					<input type="text" class="form-control" id="brand" aria-describedby="Enter the brand here." placeholder="Enter brand" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="model">Model</label>
					<input type="text" class="form-control" id="model" aria-describedby="Enter the model here." placeholder="Enter model" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="color">Color</label>
					<input type="text" class="form-control" id="color" aria-describedby="Enter the color here." placeholder="Enter color" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="owner">Owner</label>
					<input type="number" class="form-control" id="owner" aria-describedby="Enter the owner here." placeholder="Enter owner" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<button type="submit" class="btn btn-primary">Create License Plate</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitCreateLicensePlateForm() {
				var plate = $('#plate').val();
				var brand = $('#brand').val();
				var model = $('#model').val();
				var color = $('#color').val();
				var owner = $('#owner').val();
				AppCreateLicensePlate(plate, brand, model, color, owner);
			}

			$(document).ready(function() {
				$('#create-licenseplate-form').submit(function(ev) {
					SubmitCreateLicensePlateForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
