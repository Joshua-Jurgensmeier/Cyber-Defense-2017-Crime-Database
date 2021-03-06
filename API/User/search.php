<?php
	
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	if(!(isset($_SESSION['admin']) and $_SESSION['admin'] == true))
	{
		header('Location: http://crime.team12.isucdc.com/index.php');
		exit("Access denied");
	}

	$_SESSION['req_data'] = parse_request();

	$extended_attrs = [
		'name',
		'password',
		'role'
	];

	$extended_attrs = check_extended_attrs($_SESSION['req_data'], $extended_attrs);

	if (sizeof($extended_attrs) == 0) {
		die("Must have at least one search parameter.");
	}

	$attr = $extended_attrs[0];

	$M_table = "users";

	$M_query = $pdo->prepare("SELECT id, name, role FROM $M_table WHERE $attr LIKE ?;");

	error_log($M_query);

	$condition = "%" . $_SESSION['req_data'][$attr] . "%";

	$M_query->execute([$condition]);

	$result = [];
	
	while ($M_row = $M_query->fetch()) {
		foreach($M_row as &$cell) {
			$cell = htmlspecialchars($cell, ENT_QUOTES);
		}
		unset($cell);

		$M_row['password'] = "*****";

		$result[] = $M_row;
	}
	print(json_encode($result));
?>
