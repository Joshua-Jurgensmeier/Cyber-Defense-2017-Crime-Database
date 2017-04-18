<?php
	require_once __DIR__ . '/Includes/top.php'
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Create User</title>
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
			<h1>Create User</h1>
			<form id='create-user-form' action="#">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" id="name" aria-describedby="Enter the name here." placeholder="Enter name" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" aria-describedby="Enter the password here." placeholder="Enter password" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>
				<div class="form-group">
					<label for="role">Role</label>
					<input type="text" class="form-control" id="role" aria-describedby="Enter the role here." placeholder="Enter role" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				</div>

				<button type="submit" class="btn btn-primary">Create User</button>
			</form>
            <div id="form-results">
            </div>
		</div>
		<script>
			function SubmitCreateUserForm() {
				var name = $('#name').val();
				var password = $('#password').val();
				var role = $('#role').val();
				AppCreateUser(name, password, role);
			}

			$(document).ready(function() {
				$('#create-user-form').submit(function(ev) {
					SubmitCreateUserForm();
					ev.preventDefault();
				});
			});
		</script>
	</body>
</html>
