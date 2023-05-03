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
<h1 class = "roof_text"> Roofview <img src="https://swe.umbc.edu/~sreece1/is448/Group_Project/Deliverable5/map.png"
alt="Map" class="img.h1"</h1>
<!--Insert icon-->
<i class="fa fa-user" style="color:white; float:right; margin-top: 5px;"></i>
<input type = "button" class="button4"
onclick="location.href='https://swe.umbc.edu/~rc34731/is448/Group_Project/D5/Roofview_Screen4.html'"
value="Back to Roofview filter">
</div>
<!--Initiate form-->
<?php
#connect to database
$db = mysqli_connect("studentdb-maria.gl.umbc.edu", "rc34731", "rc34731", "rc34731");
if(mysqli_connect_errno()){
	exit("Error - could not connect to MySQL!");
}
#isset() makes sure variable is not empty: if it is, set to empty string.
$location = isset($_POST['location_selection'])?$_POST['location_selection']:"";
$filter = isset($_POST['filter_selection'])?$_POST['filter_selection']:"None";
#makes user resubmit values
if($location == ""){
	echo "<br /> <br />";
	echo "<h2 class='no_info'>Please submit a location here by clicking on the button above!
	</h2>";
	exit;
}
?>
<h1>Locations in Maryland: <span class="selected">
<?php
#display location
if($location == 'ec'){
	echo "Ellicott City <br />";
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
<div class = "filter_php">
Filter by: </span> <span class="selected">
<?php
#display filter
if($filter == 'cost'){
	echo "Cost";
}elseif($filter == 'ratings'){
	echo "Ratings";
}elseif($filter == 'transit_access'){
	echo "Transit Access";
}elseif($filter == 'student_discount'){
	echo "Student Discount";
}else{
	echo "None";
}
?></div>
</h1>
<?php
#construct photo arrays
$ec_photos = array("Locations/old_ellicott_city.png", "Locations/trolly_stop.png", "Locations/Bo_Railroad_Museum.jpg",
"Locations/Crazy_Mason.jpg");
$ih_photos = array("Locations/Fort_McHenry.jpg", "Locations/Historic_Ships_in_Baltimore.jpg",
"Locations/National_Aquarium.jpg", "Locations/Maryland_Science_Center.jpg");
$arb_photos = array("Locations/Sorrento.png", "Locations/OCA_Mocha.png", "Locations/Wonderfly_Arena.jpg",
"Locations/RC_Hollywood_Cinema.jpg");
$anps_photos = array("Locations/Miss_Shirleys_Cafe.jpg", "Locations/Sandy_Point_State_Park.jpg",
"Locations/Historic_Annapolis.jpg", "Locations/Chick_&_Ruths.jpg");
$caton_photos = array("Locations/Trolly_trail.jpg", "Locations/Pottery_Cove.jpg",
"Locations/Benjamin_Banneker_Historical_Park.jpg", "Locations/Lurman_Woodland_Theatre.jpg");

#constructs queries for locations
$ellicott_city = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Ellicott City'";
$inner_harbor = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Inner Harbor'";
$arbutus = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Arbutus'";
$annapolis = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Annapolis'";
$catonsville = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Catonsville'";

#constructs queries results
$ec_result = mysqli_query($db, $ellicott_city);
$ih_result = mysqli_query($db, $inner_harbor);
$arb_result = mysqli_query($db, $arbutus);
$anps_result = mysqli_query($db, $annapolis);
$caton_result = mysqli_query($db, $catonsville);	

#filter locations based on filter box
if($filter == 'cost'){
	if($location == 'ec'){
		$ellicott_city = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Ellicott City' order by cost";
		$ec_result = mysqli_query($db, $ellicott_city);
		$ec_photos[1] = "Locations/Bo_Railroad_Museum.jpg";
		$ec_photos[2] = "Locations/trolly_stop.png";
		display_location();
	}elseif($location == 'ih'){
		$inner_harbor = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Inner Harbor' order by cost";
		$ih_result = mysqli_query($db, $inner_harbor);
		$ih_photos[0] = "Locations/Maryland_Science_Center.jpg";
		$ih_photos[3] = "Locations/Fort_McHenry.jpg";
		display_location();
	}elseif($location == 'anps'){
		$annapolis = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Annapolis' order by cost";
		$anps_result = mysqli_query($db, $annapolis);
		$anps_photos[0] = "Locations/Sandy_Point_State_Park.jpg";
		$anps_photos[1] = "Locations/Miss_Shirleys_Cafe.jpg";
		display_location();
	}elseif($location == 'caton'){
		$catonsville = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Catonsville' order by cost";
		$caton_result = mysqli_query($db, $catonsville);
		$caton_photos[2] = "Locations/Lurman_Woodland_Theatre.jpg";
		$caton_photos[3] = "Locations/Benjamin_Banneker_Historical_Park.jpg";
		display_location();
	}elseif($location == 'arb'){display_location();}
}elseif($filter == 'ratings'){
	if($location == 'ec'){
		$ellicott_city = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Ellicott City' order by ratings";
		$ec_result = mysqli_query($db, $ellicott_city);
		display_location();
	}elseif($location == 'ih'){
		$inner_harbor = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Inner Harbor' order by ratings";
		$ih_result = mysqli_query($db, $inner_harbor);
		$ih_photos[0] = "Locations/Historic_Ships_in_Baltimore.jpg";
		$ih_photos[1] = "Locations/Fort_McHenry.jpg";
		display_location();
	}elseif($location == 'arb'){
		$arbutus = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Arbutus' order by ratings";
		$arb_result = mysqli_query($db, $arbutus);
		$arb_photos[2] = "Locations/RC_Hollywood_Cinema.jpg";
		$arb_photos[3] = "Locations/Wonderfly_Arena.jpg";
		display_location();
	}elseif($location == 'anps'){
		$annapolis = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Annapolis' order by ratings";
		$anps_result = mysqli_query($db, $annapolis);
		$anps_photos[0] = "Locations/Sandy_Point_State_Park.jpg";
		$anps_photos[1] = "Locations/Historic_Annapolis.jpg";
		$anps_photos[2] = "Locations/Miss_Shirleys_Cafe.jpg";
		display_location();
	}elseif($location == 'caton'){display_location();}
}elseif($filter == 'transit_access'){
	if($location == 'arb'){
		$arbutus = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Arbutus' order by transit_access";
		$arb_result = mysqli_query($db, $arbutus);
		$arb_photos[0] = "Locations/Wonderfly_Arena.jpg";
		$arb_photos[1] = "Locations/Sorrento.png";
		$arb_photos[2] = "Locations/OCA_Mocha.png";
		display_location();
	}elseif($location == 'caton'){
		$catonsville = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Catonsville' order by transit_access";
		$caton_result = mysqli_query($db, $catonsville);
		$caton_photos[0] = "Locations/Benjamin_Banneker_Historical_Park.jpg";
		$caton_photos[1] = "Locations/Trolly_trail.jpg";
		$caton_photos[2] = "Locations/Pottery_Cove.jpg";
		display_location();
	}else{$display_location();}
}elseif($filter == 'student_discount'){
	if($location == 'ec'){
		$ellicott_city = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Ellicott City' order by student_discount";
		$ec_result = mysqli_query($db, $ellicott_city);
		$ec_photos[1] = "Locations/Bo_Railroad_Museum.jpg";
		$ec_photos[2] = "Locations/trolly_stop.png";
		display_location();
	}elseif($location == 'ih'){
		$inner_harbor = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Inner Harbor' order by student_discount";
		$ih_result = mysqli_query($db, $inner_harbor);
		$ih_photos[0] = "Locations/Historic_Ships_in_Baltimore.jpg";
		$ih_photos[1] = "Locations/Fort_McHenry.jpg";
		display_location();
	}elseif($location == 'arb'){
		$arbutus = "select location_md, location, ratings, cost, transit_access, student_discount
from places where location_md = 'Arbutus' order by student_discount";
		$arb_result = mysqli_query($db, $arbutus);
		$arb_photos[0] = "Locations/Wonderfly_Arena.jpg";
		$arb_photos[1] = "Locations/Sorrento.png";
		$arb_photos[2] = "Locations/OCA_Mocha.png";
		display_location();
	}else{display_location();}
}elseif($filter == 'None'){display_location();}

function display_location(){
	#globalize variables
	global $db;
	global $location;
	global $filter;
	global $ec_photos;
	global $ih_photos;
	global $arb_photos;
	global $anps_photos;
	global $caton_photos;
	global $ellicott_city;
	global $inner_harbor;
	global $arbutus;
	global $annapolis;
	global $catonsville;
	global $ec_result;
	global $ih_result;
	global $arb_result;
	global $anps_result;
	global $caton_result;

	#total photo count for all the photo arrays 
	$photo_count = 4; 
	
	#display locations
	if ($location == 'ec'){
		for($i = 0; $i < $photo_count; $i++){ 
			$data = mysqli_fetch_array($ec_result);
			if($i == 0){
				echo "<img src='$ec_photos[$i]' alt= 'Old Ellicott City' class='oec'>";
				echo "<div class='below_oec'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 1){
				echo "<img src='$ec_photos[$i]' alt= 'Trolly Stop' class='trolly_stop'>";
				echo "<div class='below_trolly_stop'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 2){
				echo "<img src='$ec_photos[$i]' alt= 'Bo Railroad Musuem' class='railroad'>";
				echo "<div class='below_railroad'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 3){
				echo "<img src='$ec_photos[$i]' alt= 'Crazy Mason' class='crazyMason'>";
				echo "<div class='below_crazy'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}
		}
	}elseif($location == 'ih'){
		for($i = 0; $i < $photo_count; $i++){ 
			$data = mysqli_fetch_array($ih_result);
			if($i == 0){
				echo "<img src='$ih_photos[$i]' alt= 'Fort McHenry' class='fort_mchenry'>";
				echo "<div class='below_fort'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 1){
				echo "<img src='$ih_photos[$i]' alt= 'Historic Ships in Baltimore' class='baltimore_ships'>";
				echo "<div class='below_bs'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 2){
				echo "<img src='$ih_photos[$i]' alt= 'National Aquarium' class='national_aqu'>";
				echo "<div class='below_na'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 3){
				echo "<img src='$ih_photos[$i]' alt= 'Maryland Science Center' class='science'>";
				echo "<div class='below_sci'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}
		}
	}elseif($location == 'arb'){
		for($i = 0; $i < $photo_count; $i++){ 
			$data = mysqli_fetch_array($arb_result);
			if($i == 0){
				echo "<img src='$arb_photos[$i]' alt= 'Sorrento' class='sorrento'>";
				echo "<div class='below_sor'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 1){
				echo "<img src='$arb_photos[$i]' alt= 'OCA Mocha' class='oca_mocha'>";
				echo "<div class='below_oca'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 2){
				echo "<img src='$arb_photos[$i]' alt= 'Wonderfly Arena' class='wonderfly'>";
				echo "<div class='below_wonder'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 3){
				echo "<img src='$arb_photos[$i]' alt= 'RC Hollywood Cinema' class='hollywood'>";
				echo "<div class='below_holly'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}
		}
	}elseif($location == 'anps'){
		for($i = 0; $i < $photo_count; $i++){ 
			$data = mysqli_fetch_array($anps_result);
			if($i == 0){
				echo "<img src='$anps_photos[$i]' alt= 'Miss Shirleys Cafe' class='shirleys'>";
				echo "<div class='below_shirly'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 1){
				echo "<img src='$anps_photos[$i]' alt= 'Sandy Point State Park' class='sandy_point'>";
				echo "<div class='below_sandy'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 2){
				echo "<img src='$anps_photos[$i]' alt= 'Historic Annapolis' class='hist_anps'>";
				echo "<div class='below_hist_anps'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 3){
				echo "<img src='$anps_photos[$i]' alt= 'Chick & Ruths' class='chick_ruths'>";
				echo "<div class='below_chick'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}
		}		
	}elseif($location == 'caton'){
		for($i = 0; $i < $photo_count; $i++){ 
			$data = mysqli_fetch_array($caton_result);
			if($i == 0){
				echo "<img src='$caton_photos[$i]' alt= 'Trolly Trail' class='trolly_trail'>";
				echo "<div class='below_trolly_trail'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 1){
				echo "<img src='$caton_photos[$i]' alt='Pottery Cove' class='pottery_cove'>";
				echo "<div class='below_pottery'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 2){
				echo "<img src='$caton_photos[$i]' alt='Benjamin Banneker Historical Park' class='banneker_park'>";
				echo "<div class='below_banneker'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}elseif($i == 3){
				echo "<img src='$caton_photos[$i]' alt='Lurman Woodland Theatre' class='lurman_theatre'>";
				echo "<div class='below_lurman'><p>Location: <span class='selected'>$data[location] </span><br />
				  Ratings: <span class='selected'>$data[ratings]</span><br />
				  Cost: <span class='selected'>$data[cost]</span><br />";
				if($data['transit_access'] == '1'){
					echo "Transit Access: <span class='selected'> YES </span><br />";
				}else{
					echo "Transit Access: <span class='selected'> NO </span><br />";
				}
				if($data['student_discount'] == '1'){
					echo "Student Discount: <span class='selected'> YES </span></p></div>";
				}else{
					echo "Student Discount: <span class='selected'> NO </span></p></div>";
				}
			}
		}
	}
}

#close database
mysqli_close($db);
?>
</body>
