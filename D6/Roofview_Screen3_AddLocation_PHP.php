<!DOCTYPE html>
<html lang = "en">
<head> <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

	<title>Roofview Form Responses </title>
	
	<!-- This links to a stylesheet that gives basic formatting to your page; you do not need to modify this. -->

	<link rel="stylesheet" type="text/css" href="./d4_css.css" title="style">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://kit.fontawesome.com/ec21e44b1f.js" crossorigin="anonymous"></script>
	<!-- Style palet taking from: https://www.canva.com/colors/color-palettes/emerald-entrance/ -->	
</head>

<body>

<?php 

#Connect to database
$db = mysqli_connect ("studentdb-maria.gl.umbc.edu", "sreece1", "sreece1", "sreece1");

//initiate variables
$area = $other_area = $loc_name = $headline = $description = $trst_accessible = $stud_disc = "";

$area_err = $loc_name_err = $headline_err = $desc_err = $trst_accessible_err = $stud_disc_err = "";

//ERROR OUTPUTS

//Select an area

if (($_POST ["area"]) == "Other?") {
	$area_err = "Please enter an area in the following \"area\" textbox.";
	echo "<ul class = \"form_error\"> <li> $area_err </li></ul>";
}

else {
	
	$area = $_POST ["area"];
}

// Other area 

$other_area = $_POST ["other_area"];

	//Enter location name
	
if (($_POST ["loc_name"] == "")) {
	$loc_name_err = "Please enter a location name.";
	
}

else {
	$loc_name = $_POST ["loc_name"];
}

	//Add a Headline
	
if (($_POST ["headline"] == "")) {
	$headline_err = "Please enter a headline.";
	
}

else {
		$headline = $_POST ["headline"];
}

	//Add Description
	
if (($_POST ["description"] == "")) {
	$desc_err = "Please enter a description.";
}
	
else {
	$description = $_POST ["description"];
}

	//Transit Access
	
if (($_POST ["transit_accessible"] == "")) {
	$trst_accessible_err = "Please select an option.";
	
}

else {
		$trst_accessible = $_POST ["transit_accessible"];
}

	//Student Discounts
		
if (($_POST ["discounts_available"] == "")) {
	$stud_disc_err = "Please select an option for student discounts.";

}

else {
		$stud_disc = $_POST ["discounts_available"];
}

//QUERIES FOR ADDING TO DATABASE


#Construct query

$constructed_query = 
"INSERT INTO roofview_db (area, other_area, loc_name, headline, loc_desc, trst_accessible, stud_disc) 
VALUES ('$area', '$other_area', '$loc_name','$headline','$description', '$trst_accessible', '$stud_disc')";

//Constructu query for area:
//$constructed_query2 = "SELECT other_area FROM roofview_db where other_area = '$other_area'";
#Execute Query
$result = mysqli_query ($db, $constructed_query);

/*$result2 = mysqli_query($db, $constructed_query2);

$row_array = mysqli_fetch_array ($result2);
$num_rows = mysqli_num_rows ($result2);

if ($num_rows >= 1)
{
	$response="Area already added.";
}
else{
	$response = "Area Available.";
	$constructed_query2 = "INSERT INTO roofview_db (other_area) value ('$result2')";
	$result2 = mysqli_query($db, $constructed_query2);	
}
echo $response;*/

?>

<!--Output to user -->
<div class = "roof">
<h1 class = "roof_text"> Roofview <img src = "map-icon.png" alt = "Map" class = "img.h1">  </h1>
</div>
<div class = "whiteBorder">

Thank you for adding a new location to Roofview! Here is what we received.<br><br>

<ul>
<li><b>Area:</b> <?php echo $area?> </li>
<li><b>Other area if not listed above:</b> <?php echo $other_area ?> </li>
<li><b>Location name:</b> <?php echo $loc_name?></li>
<li><b>Headline:</b> <?php echo $headline?></li>
<li><b>Description:</b> <?php echo $description?></li>
</ul>

<!--DISPLAY ERRORS-->
<?php

//DISPLAY ERRORS

if 	(($loc_name_err != "") || ($headline_err !="") || ($description == "")) {
	
	echo "<span style = 'color:#212121; font-weight: bold;'> We've encountered the following errors in your submission. 
	Click <a href = \"https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen3_AddLocation.html\"> here</a> to resubmit your entry. </span><br> ";
	
	
	if ($loc_name_err != "") {
	echo "<ul class = \"form_error\"> <li> $loc_name_err  </li> </ul>";
	}
	
	if ($headline_err != "") {
	echo "<ul class = \"form_error\"><li> $headline_err </li> </ul>";
	}
	
	if ($desc_err != "") {
	echo "<ul class = \"form_error\"><li> $desc_err </li> </ul>";
	}
	
	
	/*
	if ($trst_accessible != "") {
	echo "<ul class = \"form_error\"> <li> $trst_accessible_err </li> </ul>";
	}
	
	if ($stud_disc_err != "") {
	echo "<ul class = \"form_error\"> <li> $stud_disc_err </li> </ul>";
	}*/
}
	else {
	echo "<span style = 'color:#212121; font-weight: bold;'>No errors found :)</span><br><br>";
	}
?>

Where would you like to go next? Click the bus to travel there.
<ul >
<li> 
<a href = "https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen5_ReadReview.html">
<i class="fa-solid fa-2xl fa-bus" style="color: #FF9800;"></i>
</a>Read reviews </li><br>

<li> 
<a href = "https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen1_LandingPage.html">
<i class="fa-solid fa-2xl fa-bus" style="color: #FF9800;"></i>
</a>Return to Roofview's landing page </li><br>

<li> 
<a href = "https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen3_AddLocation.html">
<i class="fa-solid fa-2xl fa-bus" style="color: #FF9800;"></i>
</a>Add another location </li><br>

<li> 
<a href = "https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen2_WriteReview.html">
<i class="fa-solid fa-2xl fa-bus" style="color: #FF9800;"></i>
</a>Leave a review for an existing location </li>
</ul>

</div>
</body>
</html>

