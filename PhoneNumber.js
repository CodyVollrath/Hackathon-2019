$(window).load(function()
		{
   			var phoneFormater = [{ "mask": "(###) ###-####"}, { "mask": "(###) ###-##############"}];
    		$('.phone').inputmask({ 
        		mask: phoneFormater,
        		greedy: false, 
        		definitions: { '#': { validator: "[0-9]", cardinality: 1}} });
    			document.getElementByClassName("phone").maxLength = "10";

    			if (y.length == x.maxLength) {
  				var next = x.tabIndex;
  				if (next < document.getElementById("myForm").length) {
    			document.getElementById("myForm").elements[next].focus();
  					}
				}
			});
			