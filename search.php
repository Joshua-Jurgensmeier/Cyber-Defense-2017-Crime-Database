<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Search</title>
		<?php
			require_once __DIR__ . '/Includes/head.php'
		?>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/Includes/header.php'
		?>
		<div class="search-page">
			<h1>Search Records</h1>
			<form id='search-form' action="#">
				<div class="form-group">
					<label for="search">Search Term</label>
					<input type="text" class="form-control" id="search" aria-describedby="Enter your search term here." placeholder="Enter search term" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="model">Search Location</label>
					<select id="model" class="custom-select">
                        <option value="LicensePlate">License Plates</option>
                        <option value="Person">People</option>
                        <option value="PoliceReport">Police Reports</option>
                        <option value="User">Users</option>
                        <option value="Warrants">Warrants</option>
                    </select>
				</div>
				<button type="submit" class="btn btn-primary">Search</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitRecordsSearch() {
                var value = $('#search').val();
                var table = $('#model').val();

                AppSearch(value, table);
			}

			$(document).ready(function() {
				$('#search-form').submit(function(ev) {
					SubmitRecordsSearch();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
