$(document).ready(function(){
	$("#userSubmit").click(function(e){
        var captchResponse = $('#g-recaptcha-response').val();
				if(captchResponse.length == 0 ) {
					alert('Please Fill all fields and Captcha');
					e.preventDefault();
					return false;
				}
	});

	// $("#contactUsSubmit").click(function(){
	// 	var captchResponse = $('#g-recaptcha-responsecontact').val();
	// 	if(captchResponse.length == 0 ) {
	// 		alert('Please Fill all fields and Captcha');
	// 	}
	// });

	
	$(document).on('submit','#contactFormQuery',function(e){
		var values = {};
		$.each($(this).serializeArray(), function (i, field) {
			values[field.name] = field.value;
		});

		//Value Retrieval Function
		var getValue = function (valueName) {
			return values[valueName];
		};

		//Retrieve the Values
		var response = getValue("g-recaptcha-response");
		if (response === undefined || response === null || response === ''){
			alert('Please Fill Captcha');
			e.preventDefault();
			return false;
		}

	 });	

	$(document).on('submit','#my_captcha_form',function(e){
		var values = {};
		$.each($(this).serializeArray(), function (i, field) {
			values[field.name] = field.value;
		});

		//Value Retrieval Function
		var getValue = function (valueName) {
			return values[valueName];
		};

		//Retrieve the Values
		var response = getValue("g-recaptcha-response");
		if (response === undefined || response === null || response === ''){
			alert('Please Fill Captcha');
			e.preventDefault();
			return false;
		}

	 });

	jQuery('#couponCode').on('click',function (e){
    	//Applied Code
    	var coupon_code = jQuery('#coupon_code').val();
    	var total = $("input[name=total]").val();
    	var product_id = $("input[name=product_id]").val();
    	

    	if(coupon_code === ''){ // do stuff };
    		alert('Please add coupon code');
    	} else {
    		$.ajax({
	            headers: {
	                'X-CSRF-Token': csrfCustomerToken 
	            },
	            url: myBaseUrl +'/base/applycouponcode',
	            data: {
	            	coupon_code: coupon_code,
	            	total : total,
	            	product_id : product_id,
                },
	            type: "POST",
	            success: function(data) {
	            	var data = JSON.parse(data);             
	                console.log('finaldata',data);
	                console.log('test1',data.discounted_price);
	                console.log('test2',data.status);
	                console.log('test3',data.message);
	                if(data.status === 0) {
	                	alert(data.message);
	                } else {
	                	alert('Applied successfully');
	                	$('#couponcodeapplied').css("display","block");
		                

		                if ($('#customSwitches').is(":checked")) {
						  var tax= $("input[name=gst]").val();
						  $('#totalPrice').text(parseInt(data.discounted_price)+parseInt(tax));
						  $("input[name=gross_total]").val(parseInt(data.discounted_price)+parseInt(tax));	
						} else {
						  $('#totalPrice').text(data.discounted_price);
						  $("input[name=gross_total]").val(data.discounted_price);
						}

		                $('#totalPricecoupon').text(data.discount_value);
		                $("input[name=couponinUse]").val('yes');
		                $("input[name=coupon_id]").val(data.id);
		                $("input[name=coupon_discount]").val(data.discount_value);
	                }
	                
	            }
	        });
    	}
    	
    	
    });

	// $("form[name='contact-form']").validate({
	//     rules: {
	//       	name: 	 "required",
	//       	surname: "required",
	//       	message: "required",
	//       	email: {
	//         	required: true,
	//         	email: true
	//       	},
	//       	phone: {
	//         	required: true,
	//         	maxlength: 10
	//       	}
	//     },
	//     messages: {
	//       	name: "Please enter your firstname",
	//       	lastname: "Please enter your lastname",
	//       	password: {
	//         	required: "Please provide a password",
	//         	minlength: "Your password must be at least 5 characters long"
	//       	},
	//       	email: "Please enter a valid email address"
	//     },
	//     submitHandler: function(form,event) {
	//     	form.submit();
	//     }
 	//  	});

});