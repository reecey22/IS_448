<?php
	
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","lukresn1","lukresn1","lukresn1");
	
	$name = $_GET["name"];


$constructed_query = "SELECT name FROM d5form where name= '$name'";

//execute your query
$result = mysqli_query($db, $constructed_query);

//Place your username values in an array 
$row_array = mysqli_fetch_array($result);

$num_rows = mysqli_num_rows($result);

if ($num_rows >= 1)
{
	$response="Already in use";
}
else{
	$response = "available";
	//$constructed_query = "INSERT INTO username (username) value ('$q')";
	$constructed_query = "INSERT INTO d5form (name) VALUES ('$name')";
	$result = mysqli_query($db, $constructed_query);	
}
echo $response;


?>