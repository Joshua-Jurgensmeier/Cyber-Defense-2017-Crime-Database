<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = ['id'];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
		die("Error: missing required attribute");
	}

	$M_query = $pdo->prepare("SELECT id, name, role FROM users WHERE id=?;");

	error_log($M_query);

	$M_query->execute([$_SESSION['req_data']['id']]);

	$M_row = $M_query->fetch();

	$M_row['password'] = "";

	print(json_encode($M_row));
?>
