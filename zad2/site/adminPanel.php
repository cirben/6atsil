<?php
	session_start();
	if (!(isset($_SESSION['id'])) || $_SESSION['id'] != 'admin'){
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/lista4/index.php");
		exit;
	}
	require_once("Base.php");
	myHeader();
?>
<div>
<p><a href="logout.php">log out</a></p>
<p><a href="accept.php">accept transfers</a></p>
</div>
<?php
	myFooter();
?>
