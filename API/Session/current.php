<?php
	require_once __DIR__ . '/../../Includes/top.php';
	require_once __DIR__ . '/../utils.php';

    if (isset($_SESSION['id'])) {
    	$M_query = $pdo->prepare("SELECT * FROM users WHERE id=?;");
    	error_log($M_query);

        $M_query->execute([$_SESSION['id']]);

        $M_row = $M_query->fetch();

        foreach($M_row as &$cell) {
            $cell = htmlspecialchars($cell, ENT_QUOTES);
        }
        unset($cell);

        $M_row['authed'] = true;
               
        if($M_row['role'] == 'admin' || $M_row['role'] == 'records')
        {
            $_SESSION['admin'] = true;
        }

        print(json_encode($M_row));
    } else {
        print('{"authed": false}');
    }
?>
