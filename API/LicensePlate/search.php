<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$extended_attrs = ['plate', 'brand', 'model', 'color', 'owner'];

	$extended_attrs = check_extended_attrs($_SESSION['req_data'], $extended_attrs);

	if (sizeof($extended_attrs) == 0) {
		die("Must have at least one search parameter.");
	}

	$attrs = $extended_attrs;

	$conditions = array_map(function($attr) { return $attr . ' LIKE "%' . $_SESSION['req_data'][$attr] . '%"'; }, $attrs);

	$M_table = "license_plate";

	$M_query = "SELECT * FROM $M_table WHERE " . join(" AND ", $conditions) . ";";
	if (sizeof($conditions) == 0) {
		$M_query = "SELECT * FROM $M_table";
	}

	error_log($M_query);
	$M_result = $mysqli->query($M_query);
	$result = [];
	if (!$M_result) {
		error_log($mysqli->error);
		die($mysqli->error);
	}
	while ($M_row = $M_result->fetch_assoc()) {
		$result[] = $M_row;
	}
	print(json_encode($result));
?>
