<?php
	require_once __DIR__ . '/Includes/top.php';
	if (isset($_SESSION['id'])) {
		header("Location: /API/Session/logout.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CrimeDB | Log Out</title>
		<?php
			require_once __DIR__ . '/Includes/head.php'
		?>
	</head>
	<body>
		<?php
			require_once __DIR__ . '/Includes/header.php'
		?>
		<div class="login-page">
			<h1>Log In</h1>
			<form action="#">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" aria-describedby="Enter your username here." placeholder="Enter username" autocapitalize="none" autocorrect="off" autocomplete="off" spellcheck="false">
				 </div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" placeholder="Password">
				</div>
				<button type="submit" class="btn btn-primary">Log In</button>
			</form>
		</div>
	</body>
</html>
