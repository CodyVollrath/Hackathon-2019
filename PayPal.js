$('#ApplicationForm').on('submit', function()){
	paypal.Buttons().render('#PayPal');
	return false;
}