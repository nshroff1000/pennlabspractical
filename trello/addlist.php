<?php
	require_once('connection.php');
	$title = $_POST['title'];

	$count_query = "Select Count(*) from list";
	$result = mysql_query($count_query);
	
	$value = intval(mysql_fetch_array($result)[0]);

	if ($value > 0) {
		$max_query = "select max(`Order`) from list;";
		$result = mysql_query($max_query);
		$max = intval(mysql_fetch_array($result)[0]);
		$order = $max + 1;
	}
	else
		$order = 1;
	$query = "INSERT INTO list(Title, `Order`) Values('$title', '$order');";
	$result = mysql_query($query);
	header("Location: index.php");
?>