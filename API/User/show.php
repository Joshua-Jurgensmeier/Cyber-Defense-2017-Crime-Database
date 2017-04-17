<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = ['id'];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
		die("Error: missing required attribute");
	}

	$M_query = "SELECT * FROM users WHERE id='" . $_SESSION['req_data']['id'] . "';";
	error_log($M_query);
	$M_result = $mysqli->query($M_query);
	if (!$M_result) {
		error_log($mysqli->error);
		die($mysqli->error);
	}
	$M_row = $M_result->fetch_assoc();
	print(json_encode($M_row));
?>
