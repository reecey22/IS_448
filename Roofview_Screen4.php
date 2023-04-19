<!DOCTYPE html>
<html lang = "en">
<head> <meta http-equiv = "Content-Type" content = "text/html; charset = utf-8">
	<title> Roofview filtered</title>
	<!-- Link to Stylesheet -->
	<link rel="stylesheet" type="text/css" href="d4_css.css"/>
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="roof">
<h1 class = "roof_text"> Roofview <img src="https://swe.umbc.edu/~sreece1/is448/Group_Project/map.png"
alt="Map" class="img.h1"</h1>
<!--Insert icon-->
<i class="fa fa-user" style="color:white; float:right; margin-top: 5px;"></i>
<!--Initiate form-->
</div>
<?php
$location = $_POST['location_selection'];
$filter = $_POST['filter_selection'];
?>
<h1> Locations in Maryland: <span class="selected">
<?php
#display location
if($location == 'ec'){
	echo "Ellicott City";
}elseif($location == 'ih'){
	echo "Inner Harbor";
}elseif($location == 'arb'){
	echo "Arbutus";
}elseif($location == 'anps'){
	echo "Annapolis";
}elseif($location == 'caton'){
	echo "Catonsville";
}
?></span>
<span class="filter_php">Filter by: </span> <span class="selected">
<?php
#display filter
if($filter == 'cost'){
	echo "Cost";
}elseif($filter == 'rating'){
	echo "Rating";
}elseif($filter == 'distance'){
	echo "Distance";
}
?></span>
</h1>
</body>