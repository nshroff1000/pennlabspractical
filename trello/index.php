<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>

<body>
<h1>TRELLO</h1>

<h2>Card Table</h2>
<?php
	require_once('connection.php');
	$query = "select * from card;";
	$result = mysql_query($query);

	echo "<table border='1'>";

$i = 0;
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<h2>List Table</h2>
<?php
	require_once('connection.php');
	$query = "select * from list ORDER BY `Order` ASC;";
	$result = mysql_query($query);

	echo "<table border='1'>";

$i = 0;
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    if ($i == 0) {
      $i++;
      echo "<tr>";
      foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
      }
      echo "</tr>";
    }
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

<p>
<h3>Add Card</h3>
<form action="addcard.php" method="post">
  Title: <input type="text" name="title"><br>
  Description: <input type="text" name="description"><br>
  ListID: <input type="text" name="listID"><br>
  <input type="submit" value="Add Card">
</form>
</p>
<p>
<h3>Add List</h3>
<form action="addlist.php" method="post">
  Title: <input type="text" name="title"><br>
  <input type="submit" value="Add List">
</form>
</p>
<p>
<h3>Edit List</h3>
<form action="editlist.php" method="post">
  ListID to be updated: <input type="text" name="listID"><br>

  <h4>Choose which parameters to update</h4>
  New Title: <input type="text" name="title"><br>
  New Order: <input type="text" name="order"><br>
  <input type="submit" value="Edit List">
</form>
</p>
<p>
<h3>Retrieve Card Info</h3>
<form id = "card" action="getcard.php" method="get">
  ID of Card: <input type="text" name="ID"><br>
  <input type="submit" value="Get Card Info">
</form>
</p>
<div id="cardResponse"></div>
<p>
<h3>Retrieve List Info</h3>
<form id = "list" action="getlist.php" method="get">
  ID of List: <input type="text" name="retrievelistID"><br>
  <input type="submit" value="Get List Info">
</form>
</p>
<div id="listResponse"></div>
<p>
<h3>Delete Card</h3>
<form action="deletecard.php" method="post">
  ID of Card: <input type="text" name="ID"><br>
  <input type="submit" value="Delete">
</form>
</p>
<p>
<h3>Delete List</h3>
<form action="deletelist.php" method="post">
  ID of List: <input type="text" name="listID"><br>
  <input type="submit" value="Delete">
</form>
</p>
<script>
     $("#card").submit(function(event) 
     {
         event.preventDefault();

         var $form = $( this ),
             $submit = $form.find( 'button[type="submit"]' ),
             id_value = $form.find( 'input[name="ID"]' ).val(),
             url = $form.attr('action');

         var get_ = $.get( url, { 
                           ID: id_value, 
                       });

         get_.done(function( data )
         {
             $( "#cardResponse" ).html(data);
         });
    });

     $("#list").submit(function(event) 
     {
         event.preventDefault();

         var $form = $( this ),
             $submit = $form.find( 'button[type="submit"]' ),
             id_value = $form.find( 'input[name="retrievelistID"]' ).val(),
             url = $form.attr('action');

         var get_ = $.get( url, { 
                           listID: id_value, 
                       });

         get_.done(function( data )
         {
             $( "#listResponse" ).html(data);
         });
    });
</script>
</body>
</html>