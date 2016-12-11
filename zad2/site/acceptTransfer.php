<?php

	require_once("sqll.php");
	session_start();
	if (!(isset($_SESSION['id'])) || $_SESSION['id'] != 'admin'){
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/lista4/index.php");
		exit;
	}
	for($i=1 ; $i<=4 ; $i++){
		if(!(isset($_POST[(string)$i]))){
			header("location: http://" . $_SERVER['HTTP_HOST'] . "/lista4/userPanel.php");
			exit;
		}
	}
	
	acceptTransfer($_POST['0'], $_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5']);
	
	header("location: http://" . $_SERVER['HTTP_HOST'] . "/lista4/accept.php");
?>
