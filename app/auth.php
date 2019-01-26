<?php


//connection to the database
//$dbhandle = mysql_connect($hostname, $username, $password)
$connection = mysqli_connect('localhost', 'abhikalp_vhg', 'vh_1234','abhikalp_vh');
 //or die(mysql_error());

//select a database to work 
$selected = mysqli_select_db($connection,"abhikalp_vh") 
  or die(mysqli_error($selected));
?>


	