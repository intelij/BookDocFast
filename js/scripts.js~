function validate(){
	if((validateSpec() == true) && (validatePostal() == true)){
		window.location.replace("selectdoctor.php?id=" + $('#specialty').val() + "&postcode=" + $('#postcode').val());
		return true;		
	}
	else {
		return false;
	}
}

function validateSpec(){
	$('#spec-error').html('');
	if ( $('#specialty').val() == 'none'){
		$('#spec-error').html('<small class="error">Please select a specialty.</small>');
		return false;
	}
	else {
		return true;
	}
}

function validatePostal(){
	$('#postal-error').html('');
	
	var regEx = /[a-zA-Z][0-9][a-zA-Z](-| |)[0-9][a-zA-Z][0-9]/;

	if (!regEx.test(document.getElementById("postcode").value)){
		$('#postal-error').html('<small class="error">The postal code you entered is invalid.</small>');
		return false ;		
	}

	if ( $('#postcode').val().length > 6){
		$('#postal-error').html('<small class="error">The postal code you entered is too long.</small>');
		return false;
	}
	if ( $('#postcode').val().length < 6){
		$('#postal-error').html('<small class="error">The postal code you entered is too short.</small>');
		return false;
	}	
	
	if ( $('#postcode').val() == '' ||  $('#postcode').val() == null){
		$('#postal-error').html('<small class="error">Please enter a postal code.</small>');
		return false;
	}
	else {
		return true;
	}
}

