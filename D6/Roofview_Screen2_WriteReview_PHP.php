<?php
	
	$db = mysqli_connect("studentdb-maria.gl.umbc.edu","lukresn1","lukresn1","lukresn1");
	
	$name = $_GET["name"];

	$visual = $_GET['visual'];

	$comment = $_GET['comment'];
	
	
	
	if (empty($name)) 
	{
		$nameError = "Name is required"; }
	else 
	{
		$name = test_input($_GET["name"]);
	}

	if (empty($visual))
	{
		$visual = " ";
	}
	else
	{
		$visual = test_input($_GET["visual"]);
	}

	if (empty($_GET["comment"])) {
		$commentError = "Comment is required";
	} else {
    $comment = test_input($_GET["comment"]);
	}
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;	
} 

$constructed_query = "SELECT name, visual, comment FROM d5form where name= '$name'";

//execute your query
$result = mysqli_query($db, $constructed_query);



if (empty($nameError)){
	include('Roofview_Screen2_WriteReview_Submit.php');}
else{
	include('Roofview_Screen2_WriteReview.html');}


?>