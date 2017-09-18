<?php
	require_once('connection.php');
	$listID = $_GET['listID'];
	$query = "select * from list where listID = '$listID';";
	$result = mysql_query($query);
	$value = mysql_fetch_array($result, MYSQL_ASSOC);
	$value['status'] = 200;
	echo json_encode($value);
?>