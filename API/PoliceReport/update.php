<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = ['id'];
	$extended_attrs = ['reporting_officer', 'report_time', 'offense_time', 'title', 'description', 'reporting_person'];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
		die("Error: missing required attribute");
	}

	$extended_attrs = check_extended_attrs($_SESSION['req_data'], $extended_attrs);

	$attrs = $extended_attrs;

	if (sizeof($attrs) == 0) {
		die("Missing optional attribute to update.");
	}

	$updates = array_map(function($attr) { return $_SESSION['req_data'][$attr]; }, $attrs);

	$updates[] = $_SESSION['req_data']['id'];

	$M_query = $pdo->prepare("UPDATE police_report SET " . join("= ?, ", $attrs) . "= ? WHERE id= ?;");

	error_log($M_query);

	$M_query->execute($updates);
	
	echo "success";
?>
