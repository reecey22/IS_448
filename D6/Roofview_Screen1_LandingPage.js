function complete() {
	  new Autocompleter.Local(
	    "location_search", //element where user is entering text that needs to be matched
	    "location", //element to fill with matches
	    ["Annapolis", "Arbutus", "Catonsville", "Ellicott City", "Inner Harbor"], //array of matches
	    {}
	  );
}

var img1, img2;

function submitButton(){
	if(!img1){
		if($("location_search").value == "Annapolis"){
			img1 = create_image("Locations/Historic_Annapolis.jpg", 600, 600, "Historic Annapolis");
		}else if($("location_search").value == "Arbutus"){
			img1 = create_image("Locations/RC_Hollywood_Cinema.jpg", 600, 600, "RC Hollywood Cinema");
		}else if($("location_search").value == "Ellicott City"){
			img1 = create_image("Locations/Crazy_Mason.jpg", 600, 600, "Crazy Mason");
		}else if($("location_search").value == "Inner Harbor"){
			img1 = create_image("Locations/Fort_McHenry.jpg", 600, 600, "Fort McHenry");
		}else if($("location_search").value == "Catonsville"){
			img1 = create_image("Locations/Lurman_Woodland_Theatre.jpg", 600, 600, "Lurman Woodland Theatre");
		}
	}
	if(!img2){
		if($("location_search").value == "Annapolis"){
			img2 = create_image("Locations/Sandy_Point_State_Park.jpg", 600, 600, "Sandy Point");
		}else if($("location_search").value == "Arbutus"){
			img2 = create_image("Locations/Sorrento.png", 600, 600, "Sorrento");
		}else if($("location_search").value == "Ellicott City"){
			img2 = create_image("Locations/trolly_stop.png", 600, 600, "Trolly Stop");
		}else if($("location_search").value == "Inner Harbor"){
			img2 = create_image("Locations/National_Aquarium.jpg", 600, 600, "National Aquarium");
		}else if($("location_search").value == "Catonsville"){
			img2 = create_image("Locations/Pottery_Cove.jpg", 600, 600, "Pottery Cove");
		}
	}
	toggle_image(img1);
	toggle_image(img2);
}

function create_image(src, width, height, alt){
	var img = document.createElement("img");
	img.src = src;
	img.width = width;
	img.height = height;
	img.alt = alt;
	return img;
}

function toggle_image(img){
	var parent = img.parentElement;
	if(!parent){
		document.body.appendChild(img);
	}else{
		parent.removeChild(img);
	}
}

//Referenced from https://stackoverflow.com/questions/29039602/button-showing-image-only-once