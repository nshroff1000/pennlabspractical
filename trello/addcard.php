<?php
	require_once('connection.php');
	$title = $_POST['title'];
	$description = $_POST['description'];
	$listID = $_POST['listID'];
	if($listID == "")
		$listID = -1;
	if(intval($listID) == -1)
		$query = "INSERT INTO card(Title, Description) Values('$title', '$description');";
	else
		$query = "INSERT INTO card(Title, Description, listID) Values('$title', '$description', '$listID');";
	$result = mysql_query($query);
	header("Location: index.php");
?>