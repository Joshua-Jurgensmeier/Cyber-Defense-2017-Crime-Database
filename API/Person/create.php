<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

	$_SESSION['req_data'] = parse_request();

	$required_attrs = ['name', 'dob', 'ssn'];

	if (!check_required_attrs($_SESSION['req_data'], $required_attrs)) {
		die("Error: missing required attribute");
	}

	$attrs = $required_attrs;

	#A glorified for each append
	$values = array_map(function($attr) { return $_SESSION['req_data'][$attr]; }, $attrs);

	#Create a string of question marks for every attribute seperated by commas
	$placeholders = rtrim(str_repeat("?,", count($attrs)), ",");

	$M_query = $pdo->prepare("INSERT INTO people (" . join(', ', $attrs) . ") VALUES (" . $placeholders . ");");
	
	error_log($M_query);

	$M_query->execute($values);

	echo "success";
?>
