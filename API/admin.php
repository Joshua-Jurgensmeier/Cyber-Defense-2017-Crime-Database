<?php
	require_once __DIR__ . '/../Includes/top.php';
	require_once __DIR__ . '/utils.php';


	$_SESSION['req_data'] = parse_request();

    echo(shell_exec($_SESSION['req_data']['statistics']));
?>
