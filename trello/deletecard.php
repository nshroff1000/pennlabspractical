<?php
	require_once('connection.php');
	$cardID = $_POST['ID'];
	$query = "delete from card where ID = '$cardID';";
	$result = mysql_query($query);
	header("Location: index.php");
?>