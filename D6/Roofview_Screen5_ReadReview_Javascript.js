function redirect () {
	var interval = setInterval(myURL, 5000);
		var result = document.getElementById("result");
        result.innerHTML = "<b> The page will redirect after delay of 5 seconds";
		
}

function myURL() {
        document.location.href = 'https://swe.umbc.edu/~lukresn1/is448/D5_WriteReview/Roofview_Screen2_WriteReview.html';
    }
   