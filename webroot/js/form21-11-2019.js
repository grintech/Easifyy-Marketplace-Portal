var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  console.log('currentTab',currentTab);
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  // if (n == 0) {
  //   document.getElementById("prevBtn").style.display = "none";
  // } else {
  //   document.getElementById("prevBtn").style.display = "inline";
  // }
  // if (n == (x.length - 1)) {
  //   document.getElementById("nextBtn").innerHTML = "Submit";
  // } else {
  //   document.getElementById("nextBtn").innerHTML = "Next";
  // }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var previousTab = currentTab;
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  console.log('currentTab',currentTab);
  //x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }else{
	 x[previousTab].style.display = "none";  
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
   if(currentTab == 0){
	  var customer_name =  document.getElementById("customer_name").value;
	  var address =  document.getElementById("address").value;
	  var city =  document.getElementById("city").value;
	  var postal_code =  document.getElementById("postal_code").value;
	  var sin =  document.getElementById("sin").value;
	  console.log('abc ',customer_name,address,city,postal_code,sin);
	  if(customer_name =='' || address =='' || city =='' || postal_code =='' || sin ==''){
		valid = false;  
		var msg = "* Please Fill All Required fields.";
	   $('#msg').text(msg);
	  }
	  
   
   }else if(currentTab == 1){
	 var salesman_name =  document.getElementById("salesman_name").value; 
	 var sales_rep =  document.getElementById("sales_rep").value; 
	 var sd_rep =  document.getElementById("sd_rep").value; 
	 var rep_email =  document.getElementById("rep_email").value;
	 if(salesman_name =='' || sales_rep =='' || sd_rep =='' || rep_email ==''){
		 var msg = "* Please Fill All Required fields.";
		  $('#msg').text(msg);
		  valid = false;  
	 }else{
		 /* if (!emailValidation(document.getElementById("rep_email"), "* Please enter a valid email address *")) {
			 valid = false;  
		 } */

	 }
   }else if(currentTab == 2){   
	  $('#userTable').find('tr').each(function() {
			if($(this).attr('data-filled') === 'filled'){
				var price = $(this).find(".price").val();
				var quantity = $(this).find(".quantity").val();
				console.log('inputEl',price,quantity);
				if(price !='' && quantity !=''){
					valid = true;
				    return false; // breaks
				}	
			}else{
				valid = false;
			}
				
		});
		var msg = "Please Choose Atleast one Product for Order.";
		$('#msg').text(msg); 
   }
  if (valid) {
    document.getElementsByClassName("steps_item")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function emailValidation(inputtext, alertMsg) {
var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

if(!pattern.test(inputtext.value)){
return true;
} else {
document.getElementById('p4').innerText = alertMsg; // This segment displays the validation rule for email.
inputtext.focus();
return false;
}
}


function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("steps_item");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

function grandTotal(){
	var total = 0;
	$('.total').each(function(){
		if($(this).val() != "" )
			total += parseFloat( $(this).val() );
	});
	return total;
}

$(document).ready(function(){
	var product ={};
	var dealer ={};
	var salesman = {};
	var selected_product={};
	
	$(document).on('change','.product_name',function(e){
		e.preventDefault();
		var current = $(this);
		console.log( current.val() );
		if( current.val() == "" ) return;
		
		var parent = $(this).parents('.product_row');
		$.ajax({
			url: item_name_ajax_url,
			headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
		    type: 'post',
		    dataType: 'json',
		    data: {
		    	product_name: current.val()
		    },
		    success: function( response ){
		    	if ( response.length > 0 ) {
		    		parent.find('.item_name').children().remove();

		    		//add empty
		    		var option = $('<option />')
						.val( "" )
						.html( 'Select Item' )
						.appendTo( parent.find('.item_name') );

		    		for (var i = 0; i < response.length ; i++) {
						var option = $('<option />')
						.val( response[i]['item_name'] )
						.attr('data-item-id', response[i]['item_name'] )
						.html( response[i]['item_name'] )
						.appendTo( parent.find('.item_name') );

					}			
					parent.find('.item_type').val('');  
		            parent.find('.product_id').val('');
					parent.find('.quantity').prop('readonly', true);
					parent.find('.total').val('');
					parent.find('.price').val('');
					parent.find('.desc').val('');
					parent.find('.discount').val('');
					parent.find('.quantity').val('');
					$('#msg').text('');	
		    	}
		    	
		    },
		    beforeSend: function(){
		    	console.log('item_name_ajax_url')
		    },
		    error: function(a,b,c){
		    	console.log('Error: '+c);
		    }
			    
		});
		
	});
	
	$(document).on('change','.item_name',function(e){
		e.preventDefault();
		var current = $(this);
		var parent = current.parents('.product_row');
		console.log(typeof parent, parent);
		$.ajax({
			url: item_number_ajax_url,
			headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
		    type: 'post',
		    dataType: 'json',
		    data: {
		    	product_name: parent.find('.product_name').val(),
		    	item_name: current.val(),
		    },
		    success: function( response ){
		    	if ( response.length > 0 ) {
		    		parent.find('.item_number').html('');

		    		//add empty
		    		var option = $('<option />')
						.val( "" )
						.html( 'Select Item Number' )
						.appendTo( parent.find('.item_number') );

		    		for (var i = 0; i < response.length ; i++) {
						var option = $('<option />')
						.val( response[i]['item_number'] )
						.attr('data-item-id', response[i]['id'] )
						.html( response[i]['item_number'] )
						.appendTo( parent.find('.item_number') );

					}			
					parent.find('.item_type').val('');  
		            parent.find('.product_id').val('');
					parent.find('.quantity').prop('readonly', true);
					parent.find('.total').val('');
					parent.find('.price').val('');
					parent.find('.desc').val('');
					parent.find('.discount').val('');
					parent.find('.quantity').val('');
					$('#msg').text('');	
		    	}
		    	
		    },
		    beforeSend: function(){
		    	console.log('item_number_ajax_url')
		    },
		    error: function(a,b,c){
		    	console.log('Error: '+c);
		    }
			    
		});
		
	});
	
	$(document).on('change','.item_number',function(e){
		e.preventDefault();
		var current = $(this);
		var parent = current.parents('.product_row');

		$.ajax({
			url: product_ajax_url,
			headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
		    type: 'post',
		    dataType: 'json',
		    data: {
		    	product_id: current.find(':selected').attr('data-item-id'),
		    },
		    success: function( response ){
		    	if ( response.length > 0 ) {
		    		product = response[0]; 
		    		parent.find('.product_json').val( JSON.stringify(product) );
					var desc = product.product_name +' '+ product.item_name+' '+ product.item_number+' '+ product.color_name ;
					parent.find('.item_type').val(product.item_type);
		            parent.find('.product_id').val(product.id);
					parent.find('.quantity').prop('readonly', false);
					parent.find('.price').val(product.per_item);
					parent.find('.franklin-checkbox').prop('checked', true);
					parent.find('.franklin-checkbox').trigger('change');
					parent.find('.total').val('');
					parent.find('.discount').val('');
					parent.find('.quantity').val(1);
					parent.attr('data-filled','filled');
					parent.find('.desc').val(desc);

					// parent.find(".quantity").trigger("change");
					getGrandTotal( parent );
					$('#msg').text('');
		    	}
		    	
		    },
		    beforeSend: function(){
		    	console.log('product_ajax_url')
		    },
		    error: function(a,b,c){
		    	console.log('Error: '+c);
		    }
		});
	});
	
	$(document).on('click ','button.tr_clone_add',function(e){
		e.preventDefault();
            var $tr    = $('#myTabledata > tr:last').closest('.product_row');
            var $clone = $tr.clone();
            $clone.find(':text').val('');		
			$clone.find('.item_type').val('');
            $clone.find('.product_id').val('');
			$clone.find('.price').val('');
			$clone.find('.discount').val('');
			$clone.find('.quantity').prop('readonly', true);
			$clone.find('.franklin-checkbox').prop('checked', false);
			$clone.find('.total').val('');
			$clone.find('.quantity').val('');
            $tr.after($clone);
            console.log('herrere',$tr);
        });
	
	$(document).on('change',".franklin-checkbox",function(e) {
		//e.preventDefault();
		var parent = $(this).parents('.product_row');
		var ischecked= parent.find('.franklin-checkbox').is(':checked');
		if(!ischecked){
		    //$(this).val('off');
			parent.find('.franklin').hide();
			parent.find('.franklin-checkbox').val(2);
			parent.find('.franklin-checkbox-input').val(0);
			//parent.find('.franklin-checkbox').prop('checked',false);
			
			console.log('unchecked',parent.find('.franklin-checkbox').val());
		}else{
			parent.find('.franklin').show();
			parent.find('.franklin-checkbox').val(1);
			parent.find('.franklin-checkbox-input').val(1);
			//parent.find('.franklin-checkbox').prop('checked',true);
		}
	}); 
	
	$(document).on('keyup change','.quantity',function(e){
		console.log('quantity');
		getGrandTotal( $(this).parents('.product_row') );
	});

	function getGrandTotal( parent ){
		
		// var parent = current.parents('.product_row');
		var product = JSON.parse( parent.find('.product_json').val() );
		var quantity = parent.find('.quantity').val();
		var price   =   parent.find('.price').val();
		var discount   =   parent.find('.discount').val();
		//var franklin = parent.find('.franklin').val(); 
		console.log('product parsed',product);
		if( quantity !=='' && price !=='' ){

			if(parseInt(quantity) < parseInt(product.bulk_count)){
				var total_cost = parseFloat( quantity ) * parseFloat( product.single_item ) * parseFloat( product.per_item );
				var franklin = parseFloat( quantity ) * parseFloat( product.single_franklin );
				if( discount !=='' ){
					total_cost = total_cost - discount;
				}
			parent.find('.price').val(product.single_item);
			} else {
				var total_cost = parseFloat(quantity)* parseFloat(product.bulk_item) * parseFloat(product.per_item );
				var franklin = parseFloat(quantity)* parseFloat(product.bulk_franklin);
				parent.find('.price').val(product.bulk_item);
			}
			
			parent.find('.total').val( total_cost.toFixed(2) );
			parent.find('.franklin').val( franklin.toFixed(2) );
			var total = grandTotal();
			$('#order-grand-total').html( total.toFixed(2) );
			console.log(' total ',total);
		}
	}
	
	$(document).on('keyup','.price',function(e){
		e.preventDefault();
		var parent = $(this).parents('.product_row');
		parent.find('.quantity').trigger('change');
	});
	$(document).on('keyup change','.discount',function(e){
		e.preventDefault();
		var parent = $(this).parents('.product_row');
		parent.find('.quantity').trigger('change');
	});

	
	$(document).on('click','.ls_product_row',function(e){
		e.preventDefault();
		console.log('target',e.target);
		$.post(
                "get_product_data.php",
                {item_number: $(this).attr('data-item_number')},
        function (response) {
			 selected_product = response;
            //console.log(typeof response, response,selected_product);
			 $(".suggesstion-products").html('');
			 
        },
        'json');
	});
	
	
	
	$(document).on('keyup ','#customer_name',function(e){
		var name = $(this).val();
		console.log('name',name);
		if( name.length > 1){
			$.ajax({
				url: customer_ajax_url,
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
			    type: 'post',
			    dataType: 'json',
			    data: {
			    	name: $(this).val()
			    },
			    success: function(response){
			    	$('#suggesstion-dealers').html('');
			    	window.myres = response;
			    	var _ul = $('<ul />')
			    	.attr('id', 'dealer-list');
			    	if ( response.length > 0 ) {
			    		for (var i = 0; i <= response.length ; i++ ) {
			    			try{
			    				var _li = $('<li />')
					    		.addClass('item_dealer')
					    		.attr('data-customer_id', response[i].id )
					    		.html( response[i].name )
					    		.appendTo(_ul);
			    			} catch(e){

			    			}
			    			
			    		}
			    		_ul.appendTo('#suggesstion-dealers');

			    	}
			  		$('#suggesstion-dealers').show();


			    }
			});
			
		}else{
			 //$('#customer_name').val('');
			 $('#suggesstion-dealers').hide();
			 $('#address').val('');
			 $('#city').val('');
			 $('#province').val('');
			 $('#customer_id').val('');
			 $('#postal_code').val('');
			 $('#sin').val('');
			 $('#sin_off_file').show(); 
			 $('#sin_on_file').hide();

			 
		}
	});
	
	
	$(document).on('click ','.item_dealer',function(e){
		  e.preventDefault();

		var customer_id = $(this).attr('data-customer_id');
		//console.log('product_id',product_id);
		if(customer_id){
			$.ajax({
				url: customer_data_ajax_url,
				type: 'post',
				dataType: 'json',
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
				data: {
					customer_id: customer_id
				},
				success: function( response ){
					dealer = response[0];
					$('#suggesstion-dealers').hide();
					$('#customer_name').val(dealer.name);
					$('#address').val(dealer.address);
					$('#city').val(dealer.city);
					$('#province').val(dealer.province);
					if( dealer.sin != ''){
					   $('#sin').val(dealer.sin);
					   $('#sin_on_file').show();
					   $('#sin_off_file').hide();
					 }else{
						$('#sin').val('');
						$('#sin_off_file').show(); 
						$('#sin_on_file').hide();
						console.log('jere');
					 }
					$('#customer_id').val(dealer.id);
					$('#postal_code').val(dealer.postal_code);
					$('#msg').text('');
				}
			});
		
		}else{
			$('#suggesstion-dealers').html('');
		}
	});
	
	$(document).on('keyup ','#salesman_name',function(e){
		e.preventDefault();
		var name = $(this).val();
		console.log('name',name);
		if( name.length > 1){
			$.ajax({
				url: salesmen_ajax_url,
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
			    type: 'post',
				dataType: 'json',
				data: {
					name: name
				},
				success: function(response){
					$('#suggesstion-salesman').html('');
			    	window.myres = response;
			    	var _ul = $('<ul />')
			    	.attr('id', 'salesman-list');
			    	if ( response.length > 0 ) {
			    		for (var i = 0; i <= response.length ; i++ ) {
			    			try{
			    				var _li = $('<li />')
					    		.addClass('item_salesman')
					    		.attr('data-salesman_id', response[i].id )
					    		.html( response[i].name )
					    		.appendTo(_ul);
			    			} catch(e){

			    			}
			    			
			    		}
			    		_ul.appendTo('#suggesstion-salesman');

			    	}
			  		$('#suggesstion-salesman').show();
				}
			});
			
		}else{
			 $('#saleman_id').val('');
			 //$('#salesman_name').val();
			 $('#sales_rep').val('');
			 $('#rep_email').val('');
			 $('#sd_rep').val('');
		}
	});
	
	
	$(document).on('keyup ','#search_product',function(e){
		e.preventDefault();
		var name = $(this).val();
		console.log('name',name);
			$.post(
                "get_product_data.php",
                { search_product: $(this).val() },
        function (response) {
            console.log(typeof response, response);
             $('#suggesstion-products').html(response);
        },
        'html');
		
	});
	
	$(document).on('click ','.item_salesman',function(e){
		e.preventDefault();
		var name = $(this).text();
		console.log('name',name);
		if( name.length > 1){
			var salesman_id = $(this).attr('data-salesman_id');
			$.ajax({
				url: salesmen_data_ajax_url,
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
			    type: 'post',
				dataType: 'json',
				data: {
					salesman_id: salesman_id
				},
				success: function(response){
					console.log(response.length);
					if ( response.length > 0 ) {
			    		
						salesman = response[0];
		             	$('#suggesstion-salesman').html('');
					 	$('#suggesstion-salesman').hide();
					 	$('#salesman_id').val(salesman.id);
					 	$('#salesman_name').val(salesman.name);
					 	$('#rep_email').val(salesman.email);
					 	console.log(salesman.email);
			    	}
			  		
				}
			});
		}else{
			$('#suggesstion-dealers').html('');
			 
		}
		
	});
	
	$('.product_name').trigger('change');
	
	/* $(document).on('submit','#regForm',function(e){
		var quantity = $('.quantity').val();
		console.log('quantity',quantity);
		
		if(quantity ==''){
			var msg = "Please Choose Item Number and Quantity."
			$('#msg').text(msg);
			e.preventDefault();
		}else{
			console.log('form',$("#regForm"));
			$("#regForm").submit();
		}
		
	}); */
	
	
});