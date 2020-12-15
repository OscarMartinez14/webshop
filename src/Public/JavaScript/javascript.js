$(document).ready(function() {
	
	$("#checkboxIsStartingPrice").click(function() {

		if ($("#textboxStartingPrice").is(":disabled")){
			$('#textboxStartingPrice').prop("disabled", false);
		} else{
			$('#textboxStartingPrice').prop("disabled", true);
		}
			
	});	

});

