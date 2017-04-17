<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = ['plate', 'brand', 'model', 'color', 'owner'];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
		die("Error: missing required attribute");
	}

	$attrs = $required_attrs;

	$values = array_map(function($attr) { return '"' . $_SESSION['req_data'][$attr] . '"'; }, $attrs);

	$M_query = "INSERT INTO license_plate (" . join(', ', $attrs) . ") VALUES (" . join(',', $values) . ");";
	error_log($M_query);
	$M_result = $mysqli->query($M_query);
	if (!$M_result) {
		error_log($mysqli->error);
		die($mysqli->error);
	}
	echo "success";
?>
