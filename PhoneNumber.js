$(window).load(function() {

   		var phoneFormater = { "mask": "(###) ###-####"};
    	$('.phone').inputmask({ 
        	mask: phoneFormater,
        	greedy: false, 
        	definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
	});
