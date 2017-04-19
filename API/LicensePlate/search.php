<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$extended_attrs = ['plate', 'brand', 'model', 'color', 'owner'];

	$extended_attrs = check_extended_attrs($_SESSION['req_data'], $extended_attrs);

	if (sizeof($extended_attrs) == 0) {
		die("Must have at least one search parameter.");
	}

	$attr = $extended_attrs[0];

	$M_table = "license_plate";

	$M_query = $pdo->prepare("SELECT * FROM $M_table WHERE $attr LIKE ?;");

	error_log($M_query);

	$condition = "%" . $_SESSION['req_data'][$attr] . "%";

	$M_query->execute([$condition]);

	$result = [];
	
	while ($M_row = $M_query->fetch()) {
		foreach($M_row as $cell) {htmlspecialchars($cell, ENT_QUOTES);}
		$result[] = $M_row;
	}
	print(json_encode($result));
?>
