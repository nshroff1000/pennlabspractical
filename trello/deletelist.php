<?php
	require_once('connection.php');
	$listID = $_POST['listID'];
	$current_order = "select `Order` from list where ListID = '$listID';";
	$result = mysql_query($current_order);
	$value = mysql_fetch_array($result)[0];
	$query = "Update list set `Order` = `Order` - 1 where `Order` > '$value';";
	$result = mysql_query($query);
	$query = "delete from list where listID = '$listID';";
	$result = mysql_query($query);
	header("Location: index.php");
?>