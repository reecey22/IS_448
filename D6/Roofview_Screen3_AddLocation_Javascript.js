
//STAR SELECTOR ICON STARTUP
const icon = document.querySelector ('.icon i');

icon.addEventListener('click', function() {
	icon.classList.toggle('active');
});


//Storing stars
const stars = document.querySelectorAll(".stars i");

//Looping through star listStyleType
stars.forEach ((star, index1) => {
	//eventListern that runs a function when click is triggered
	star.addEventListener ("click",() => {
		
		//loop through the "stars"
		
		stars.forEach ((s, index2) => {
			//Add the "active class to the clicked star and any star with a lower index
			//remove active class forom any stars with a higher index
			if (index1 >= index2) {
				s.classList.add("active");
			}
			else {
				s.classList.remove("active");
			}
			
		});
		
	});
	
	
});

//pull info from php file
function validateArea () {
	var other_area = document.getElementById("other_area").value;
	new Ajax.Request("Roofview_Screen3_AddLocation_Validator_PHP.php",{
		method: "get",
		parameters: {other: other_area},
		onSuccess: displayResult
	});
}
	
/*var other_area = document.getElementById("other_area").value;
	var val = new XMLHttpRequest();
	val.open ('post', 'https://swe.umbc.edu/~sreece1/is448/Group_Project/deliverable6/Roofview_Screen3_AddLocation_Validator_PHP.php');
	val.setRequestHeader ('Content-Type', 'application/x-www-form-urlencoded');
	val.onload = function() {
		if (val.status === 200 ){
		displayResult(val.responseText);
	}
	else {
		console.log('Request failed. Returned status of' + ' val.status')
	}
	val.send('other_area=' + encodeURIComponent (other_area));
	
}
}*/

function displayResult (ajax) {
	document.getElementById("areaBox").innerHTML = ajax.responseText;
}

function validateForm() {
	let x = document.forms ["newLocationForm"]["headline"].value;
	let y = document.forms ["newLocationForm"]["other_area"].value;
	let z = document.forms ["newLocationForm"]["description"].value;

	if (x == "" || y =="" || z=="") {
		alert("Howdy Retriever! Please complete all required fields🐶.");
		return false;
	}
}

/*
function validateArea (other_area) {
	new Ajax.Request ("Roofview_Screen3_AddLocation_Validator_PHP.php",	{
		method: "post",
		parameters: {name: other_area},
		onSuccess: displayResult
	});
}

function displayResult (ajax) {
	document.getElementById("areaBox").innerHTML = ajax.responseText;
}

function validateForm() {
	let x = document.forms ["newLocationForm"]["headline"].value;
	if (x == "") {
		alert("Howdy Retriever! Please complete all required fields🐶.");
		return false;
	}
}

*/