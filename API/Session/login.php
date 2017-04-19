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

	$M_query = $pdo->prepare("SELECT * FROM users WHERE name=?;");
	error_log($M_query);

	$M_query->execute([$u]);

	$M_row = $M_query->fetch();

	if (password_verify($p, $M_row['password'])) {
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
