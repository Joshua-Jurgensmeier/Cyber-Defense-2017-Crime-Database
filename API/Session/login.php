<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = [
		'username',
        'password'
	];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
        die('Missing required attribute');
    }

    $u = $_SESSION['req_data']['username'];
    $p = $_SESSION['req_data']['password'];

	$M_query = "SELECT * FROM users WHERE name='$u';";
	error_log($M_query);

	$M_result = $mysqli->query($M_query);
	$result = [];

	if (!$M_result) {
		error_log($mysqli->error);
		die($mysqli->error);
	}

	$M_row = $M_result->fetch_assoc();
	if ($M_row['password'] == $p) {
		$_SESSION['id'] = $M_row['id'];
		$_SESSION['username'] = $u;
		$_SESSION['password'] = $p;
		$_SESSION['role'] = $M_row['role'];
		echo "success";
	} else {
		$_SESSION['id'] = "";
		$_SESSION['username'] = "";
		$_SESSION['password'] = "";
		$_SESSION['role'] = "";
		echo "Invalid password.";
	}
?>
