<?php 

#Connect to database
$db = mysqli_connect ("studentdb-maria.gl.umbc.edu", "sreece1", "sreece1", "sreece1");

// Other area 
$other_area = $_GET["other"];


$constructed_query = "SELECT other_area FROM roofview_db where other_area = '$other_area'";

$result = mysqli_query($db, $constructed_query);


$row_array = mysqli_fetch_array($result);

$num_rows = mysqli_num_rows($result);


	
if ($num_rows >= 1)
{
	$response="Area Already Added. ";
}
else{
	$response = "Area Available.";
	$constructed_query = "INSERT INTO roofview_db (other_area) value ('$other_area')";
	$result = mysqli_query($db, $constructed_query);	
}
echo $response;
?>