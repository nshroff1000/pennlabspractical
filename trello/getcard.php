<?php
	require_once('connection.php');
	$cardID = $_GET['ID'];
	$query = "select * from card where ID = '$cardID';";
	$result = mysql_query($query);
	$value = mysql_fetch_array($result, MYSQL_ASSOC);
	$value['status'] = 200;
	echo json_encode($value);
?>