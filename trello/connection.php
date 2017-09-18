<?php
	$server = "localhost";
	$username = "root";
	$password = "admin";
	mysql_connect($server,$username,$password) or die("error connecting to database");
	mysql_select_db("TRELLO_API");
?>
