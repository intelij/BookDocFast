function validate(){
	if((validateSpec() == true) && (validatePostal() == true)){
		window.location.replace("/BookDocFast/selectdoctor.php?id=" + $('#specialty').val() + "&postcode=" + $('#postcode').val());
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
	if ( $('#postcode').val().length > 6){
		$('#postal-error').html('<small class="error">The postal code you entered is too long.</small>');
		return false;
	}
	if ( $('#postcode').val().length < 6){
		$('#postal-error').html('<small class="error">The postal code you entered is too short.</small>');
		return false;
	}
	$('#postal-error').html('');
	if ( $('#postcode').val() == '' ||  $('#postcode').val() == null){
		$('#postal-error').html('<small class="error">Please enter a postal code.</small>');
		return false;
	}
	else {
		return true;
	}

}