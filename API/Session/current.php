<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

    if (isset($_SESSION['id'])) {
    	$M_query = "SELECT * FROM users WHERE id='" . $_SESSION['id'] . "';";
    	error_log($M_query);

    	$M_result = $mysqli->query($M_query);
    	$result = [];

    	if (!$M_result) {
    		error_log($mysqli->error);
    		die($mysqli->error);
    	}
        $M_row = $M_result->fetch_assoc();
        $M_row['authed'] = true;
        print(json_encode($M_row));
    } else {
        print('{"authed": false}');
    }
?>
