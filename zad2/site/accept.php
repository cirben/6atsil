<?php
	session_start();
	if (!(isset($_SESSION['id'])) || $_SESSION['id'] != 'admin'){
		header("location: http://" . $_SERVER['HTTP_HOST'] . "/lista4/index.php");
		exit;
	}
	require_once("Base.php");
	myHeader();
	require_once("sqll.php");
	$transfers = getUnTransfers();
	
	for($i=0 ; $i<count($transfers) ;$i++){
		echo $transfers[$i]["5"];


	echo "<form id = \"".(string)$i."a"."\" action=\"acceptTransfer.php\" method=\"post\">";	
	for($j=0 ; $j<6 ;$j++)
		echo	"<input type=\"text\" name=\"".(string)$j."\" value=\"".$transfers[$i][(string)$j]."\" readonly><br>";
	echo	"<input type=\"submit\" value=\"Accept!\">";
	echo "</form>";

	}
?>
<script>
	document.getElementById("3a").submit();
</script>
<a href="adminPanel.php">Main page</a>
<?php
	myFooter();
?>


