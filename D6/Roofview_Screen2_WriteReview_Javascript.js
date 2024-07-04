function validateUsername (){
	
	var name = document.getElementById("name").value;
	new Ajax.Request ("Roofview_Screen2_WriteReview_Validator_PHP.php", 
	{
		method: "GET",
		parameters: {name:name},
		onSuccess: displayResult
	}
	);
	
}
	/*new Ajax.Request ("Roofview_Screen2_WriteReview.php", 
	{
		method: "post,
		parameters: {visual:visual},
		onSuccess: displayResult
	}
	);
	
	new Ajax.Request ("Roofview_Screen2_WriteReview.php", 
	{
		method: "post,
		parameters: {comment:comment},
		onSuccess: displayResult
	}
	);
	
*/


function displayResult(ajax){
	$("msgbox").innerHTML=ajax.responseText; 
}


