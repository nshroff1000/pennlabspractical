<?php
	require_once('connection.php');
	$listID = intval($_POST['listID']);
	$title = $_POST['title'];
	$order = $_POST['order'];

	if($order != '') {
		$order = intval($order);
		$current_order = "select `Order` from list where ListID = '$listID';";
		$result = mysql_query($current_order);
		$value = mysql_fetch_array($result)[0];
		
		$query = "update list set `Order` = -1 where ListID = '$listID';";
		$result = mysql_query($query);

		$query = "Update list set `Order` = `Order` - 1 where `Order` > '$value';";
		$result = mysql_query($query);

		$query = "Update list set `Order` = `Order` + 1 where `Order` >= '$order';";
		$result = mysql_query($query);

		$query = "Update list set `Order` = '$order' where ListID = '$listID';";
		$result = mysql_query($query);
	}

	if($title != '') {
		$query = "Update list set `Title` = '$title' where ListID = '$listID';";
		$result = mysql_query($query);
	}

	header("Location: index.php");
?>