$(document).ready(function(){
	
	var product ={};
	var dealer ={};
	var salesman = {};
	var selected_product={};
	var products =[];
	var dealers =[];
	var salesmen = [];

	/* get all customers */
	if (localStorage.getItem("dealers") === null) {
  
	$.ajax({
            type: 'get',
            url: all_customers_ajax_url,
            headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
            
            success: function(response) 
            {
                if (response) 
                {
                   dealers= response;
                   localStorage.setItem('dealers', JSON.stringify(dealers));
                  
                }
            },
            error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
	}else{
		dealers =  JSON.parse(localStorage.getItem('dealers'));
	}

	/* get all salesmen */
	if (localStorage.getItem("salesmen") === null) {
	$.ajax({
            type: 'get',
            url: all_salesmen_ajax_url,
            headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
            
            success: function(response) 
            {
                if (response) 
                {
                   salesmen= response;
                   localStorage.setItem('salesmen', JSON.stringify(salesmen));
                   //console.log('salesmen',salesmen);
                }
            },
            error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
	}else{
		salesmen =  JSON.parse(localStorage.getItem('salesmen'));
	}

	/* get all products */
	if (localStorage.getItem("products") === null) {
	$.ajax({
            type: 'get',
            url: all_products_ajax_url,
            headers: {
		        'X-CSRF-Token': csrfCustomerToken
		    },
            
            success: function(response) 
            {
                if (response) 
                {
                   products= response;
                    localStorage.setItem('products', JSON.stringify(products));
                   //console.log('products',products);
                }
            },
            error: function(e) 
            {
                alert("An error occurred: " + e.responseText.message);
                console.log(e);
            }
        });
	}else{
		products =  JSON.parse(localStorage.getItem('products'));
	}
	 /*
	 console.log('dealers',dealers);
	 console.log('salesmen',salesmen);
	 console.log('products',products);
	 $.each(salesmen, function(i, item) {
     console.log('key: ',i,'value : ',item);
     });
     */



	function grandTotal(){
		var total = 0;
		$('.total').each(function(){
			if($(this).val() != "" )
				total += parseFloat( $(this).val() );
		});
		return total;
	}
	function grandFranklin(){
		var total = 0;
		
		$('.franklin').each(function(){
			var parent = $(this).parents('.product_row');
		    var ischecked= parent.find('.franklin-checkbox').is(':checked');
			if(ischecked){
				//console.log('ischecked',ischecked);
				if($(this).val() != "" ){
					total += parseFloat( $(this).val() );
				}
			}
		});
		return total;
	}

	function grandPoints(){
		var total = 0;
		$('.promo').each(function(){
			if($(this).val() != "" )
				total += parseFloat( $(this).val() );
		});
		return total;
	}
	
	function totalDiscount(){
		var total = 0;
		$('.discount').each(function(){
			if($(this).val() != "" )
				total += parseFloat( $(this).val() );
		});
		return total;
	}
	
	$(document).on('change','.product_name',function(e){
		e.preventDefault();
		var current = $(this);
		//console.log( current.val() );
		if( current.val() == "" ) return;
		var parent = $(this).parents('.product_row');
		 //console.log('products',products);
		var  product_name =current.val();
		var response = products.filter(function (item) {
				  //console.log(item.product_name,product_name);	
			      if( item.product_name === product_name){ return 1; }
			 });
		/* filtering duplicate item names */
		var result = [];
		$.each(response, function (i, e) {
		    var matchingItems = $.grep(result, function (item) {
		       return item.item_name === e.item_name;
		    });
		    if (matchingItems.length === 0){
		        result.push(e);
		    }
		});
	      
      	var response = result;
	     window.myres = response;
	    // console.log('response',response);	
    	if ( response.length > 0 ) {
		parent.find('.item_name').children().remove();

		//add empty
		var option = $('<option />')
			.val( "" )
			.html( 'Select Item' )
			.appendTo( parent.find('.item_name') );
		$.each(response, function(i, item) {
            var option = $('<option />')
			.val( item.item_name )
			.attr('data-item-id', item.id )
			.html( item.item_name )
			.appendTo( parent.find('.item_name') );
        });			
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
	});
	
	$(document).on('change','.item_name',function(e){
		e.preventDefault();
		var current = $(this);
		var parent = current.parents('.product_row');
		var item_name = current.val();
		var response = products.filter(function (item) {
				 // console.log(item.item_name,item_name);	
			      if( item.item_name === item_name){ return 1; }
				});
		/* filtering duplicate  item numbers */
		var result = [];
		$.each(response, function (i, e) {
		    var matchingItems = $.grep(result, function (item) {
		       return item.item_number === e.item_number;
		    });
		    if (matchingItems.length === 0){
		        result.push(e);
		    }
		});
	      
      	var response =result;
	    	window.myres = response;
	        // console.log('response',response);	
	    	if ( response.length > 0 ) {
	    	parent.find('.item_number').html('');
    		//add empty
    		var option = $('<option />')
				.val( "" )
				.html( 'Select Item Number' )
				.appendTo( parent.find('.item_number') );

			$.each(response, function(i, item) {
                var option = $('<option />')
				.val( item.item_number )
				.attr('data-item-id', item.id )
				.html( item.item_number )
				.appendTo( parent.find('.item_number') );
            });
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
	});
	
	$(document).on('change','.item_number',function(e){
		e.preventDefault();
		var current = $(this);
		var parent = current.parents('.product_row');
		var product_id = current.find(':selected').attr('data-item-id');
		var response = products.filter(function (item) {
				  //console.log(item.id,product_id);	
			      if( item.id === parseInt(product_id) ){ return 1; }
				});
	      
      	//var response =filteredValue;
	    window.myres = response;
	    //console.log('response',response);
		if(response){
			if (response.length > 0 ) {
	    		product = response[0]; 
	    		parent.find('.product_json').val( JSON.stringify(product) );
				var desc = product.product_name +' '+ product.item_name+' '+ product.item_number+' '+ product.color_name ;
				parent.find('.item_type').val(product.item_type);
	            parent.find('.product_id').val(product.id);
				parent.find('.quantity').prop('readonly', false);
				parent.find('.price').val(product.per_item);
				parent.find('.franklin').val(product.single_franklin);
				parent.find('.franklin-checkbox').prop('checked', true);
				parent.find('.franklin-checkbox').trigger('change');
				parent.find('.total').val('');
				parent.find('.discount').val('');
				parent.find('.quantity').val(1);
				parent.attr('data-filled','filled');
				parent.find('.desc').val(desc);
				if((product.product_name ==='Underlay-Edm') || (product.product_name ==='Underlay-Depot') ||(product.product_name ==='Underlay-Cgy') ){
				parent.find('.cash-checkbox').show();	
				}else{
					parent.find('.cash-checkbox').hide();
				}
				// parent.find(".quantity").trigger("change");
				getGrandTotal( parent );
				$('#msg').text('');
	    	}
		}	    	
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
           // console.log('herrere',$tr);
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
			//console.log('unchecked',parent.find('.franklin-checkbox').val());
			parent.find('.quantity').trigger('change');
		}else{
			parent.find('.franklin').show();
			parent.find('.franklin-checkbox').val(1);
			parent.find('.franklin-checkbox-input').val(1);
			parent.find('.quantity').trigger('change');
			//parent.find('.franklin-checkbox').prop('checked',true);
		}
	}); 
	
	$(document).on('keyup change','.quantity',function(e){
		//console.log('quantity');
		getGrandTotal( $(this).parents('.product_row') );
	});
	
	
	function getGrandTotal( parent ){
		
		// var parent = current.parents('.product_row');
		//var parent = $(this).parents('.product_row');
		 //console.log('product_json',parent.find('.product_json').val());
		if(parent.find('.product_json').val() !=''){
			
			var product = JSON.parse( parent.find('.product_json').val() );
			var quantity = parent.find('.quantity').val();
			var price   =   parent.find('.price').val();
			var discount   =   parent.find('.discount').val();
			//var franklin = parent.find('.franklin').val(); 
			//console.log('product parsed',product);
			if( quantity !=='' && price !=='' ){
				if((product.product_name ==='Underlay-Edm') || (product.product_name ==='Underlay-Depot') ||(product.product_name ==='Underlay-Cgy') ){
					var ischecked= parent.find('.cash-checkbox').is(':checked');
					if( ischecked ){
						var total_cost = parseFloat(quantity) * parseFloat(product.single_item)* parseFloat( product.per_item );
						var franklin = parseFloat(quantity)* parseFloat(product.single_franklin);
						if(discount !==''){
							var total_cost = total_cost - discount;
						}
						parent.find('.price').val(product.single_item);
					}else{				
						parent.find('.price').val(product.bulk_item);
						var total_cost = parseFloat(quantity)* parseFloat(product.bulk_item)* parseFloat( product.per_item );
						var franklin = parseFloat(quantity)* parseFloat(product.bulk_franklin);
						if(discount !==''){
							var total_cost = total_cost - discount;
						}
					}
				}else if(product.product_name ==='Adhesive'){
						if( parseInt(quantity) < parseInt( product.bulk_count ) ){
							var total_cost = parseFloat(quantity) * parseFloat(product.single_item);
							var franklin = parseFloat(quantity)* parseFloat(product.single_franklin);
							if(discount !==''){
								var total_cost = total_cost - discount;
							}
							parent.find('.price').val(product.single_item);
						}else{
							
							parent.find('.price').val(product.bulk_item);
							var total_cost = parseFloat(quantity)* parseFloat(product.bulk_item);
							var franklin = parseFloat(quantity)* parseFloat(product.bulk_franklin);
							if(discount !==''){
								var total_cost = total_cost - discount;
							}
						}
				}else if(parseInt(quantity) < parseInt(product.bulk_count)){
					var total_cost = parseFloat( quantity ) * parseFloat( product.single_item ) * parseFloat( product.per_item );
					var franklin = parseFloat( quantity ) * parseFloat( product.single_franklin );
					if( discount !=='' ){
						total_cost = total_cost - discount;
					}
					parent.find('.price').val(product.single_item);
				} else {
					var total_cost = parseFloat(quantity)* parseFloat(product.bulk_item) * parseFloat(product.per_item );
					var franklin = parseFloat(quantity)* parseFloat(product.bulk_franklin);
					if(discount !==''){
						var total_cost = total_cost - discount;
					}
					parent.find('.price').val(product.bulk_item);
				}
				
				parent.find('.total').val( total_cost.toFixed(2) );
				parent.find('.franklin').val( franklin );
				var total = grandTotal();
				var total_franklin = grandFranklin();
				var total_points = grandPoints();
				var grand_discount = totalDiscount();
				var gross_total = total + grand_discount;
				$('#order-grand-total').html( total.toFixed(2) );
				$('#order-gross-total').html( gross_total.toFixed(2) );
				$('#order-franklin-total').html( total_franklin );
				$('#order-points-total').html( total_points.toFixed(2) );
				//console.log(' total ',total);
				//console.log(' total_franklin ',total_franklin);
				//console.log(' total_points ',total_points);
			}
		}
	}
	
	$(document).on('keyup change','.promo',function(e){
		e.preventDefault();
	    var parent = $(this).parents('.product_row');
		parent.find('.quantity').trigger('change');
	});
	$(document).on('keyup change','.discount',function(e){
		e.preventDefault();
		var parent = $(this).parents('.product_row');
		parent.find('.quantity').trigger('change');
	});
	
	$(document).on('change','.cash-checkbox',function(e){
		console.log('event triggered');
		var parent = $(this).parents('.product_row');
		if(parent.find('.product_json').val() !=''){
			var product = JSON.parse( parent.find('.product_json').val() );
			if((product.product_name ==='Underlay-Edm') || (product.product_name ==='Underlay-Depot') ||(product.product_name ==='Underlay-Cgy') ){
				getGrandTotal( parent );
			}
		}
	});


	$(document).on('keyup ','#customer_name',function(e){
		var name = $(this).val();	
		console.log('name',name);
		if( name.length > 1){
			var response = dealers.filter(function (item) {
			      if( item.name.toLowerCase().indexOf( name.toLowerCase() ) > -1 )
				  { return 1; }
			});
	      
          	//var response =filteredValue;
	    	window.myres = response;
	    	if ( response.length > 0 ) {

	    		 $('#suggesstion-dealers').html('');
	    		var _ul = $('<ul />')
	    	    .attr('id', 'dealer-list');
	    		$.each(response, function(i, item) {
	                //console.log('item',item);
	                var _li = $('<li />')
			    		.addClass('item_dealer')
			    		.attr('data-customer_id', item.id )
			    		.html( '<strong>'+item.customerid +': </strong>'+ item.name )
			    		.appendTo(_ul);
	              });
	    		_ul.appendTo('#suggesstion-dealers');
	    		$('#suggesstion-dealers').show();
	    	}			
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
			 $('#address').prop('readonly', false);
			 $('#city').prop('readonly', false);
			 $('#province').prop('readonly', false);
			 $('#customer_id').prop('readonly', false);
			 $('#postal_code').prop('readonly', false); 
		}
	});
	
	
	$(document).on('click ','.item_dealer',function(e){
		e.preventDefault();
		var customer_id = $(this).attr('data-customer_id');
		if(customer_id){
		var response = dealers.filter(function (item) {
			    // console.log(item.id,customer_id);
			      if( item.id === parseInt(customer_id ))
				    { return 1; }
			});
	       // console.log('response',response[0]);
	        if(response){
	        	dealer = response[0];
				$('#suggesstion-dealers').hide();
				$('#customer_name').val(dealer.name);
				$('#address').val(dealer.address);
				$('#city').val(dealer.city);
				$('#province').val(dealer.province);
				$('#customer_id').val(dealer.id);
				$('#postal_code').val(dealer.postal_code);
				$('#address').prop('readonly', true);
				$('#city').prop('readonly', true);
				$('#province').prop('readonly', true);
				$('#customer_id').prop('readonly', true);
				$('#postal_code').prop('readonly', true);
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
				
				$('#msg').text('');
	        }
		    
		}else{
			$('#suggesstion-dealers').html('');
			$('#address').prop('readonly', false);
			$('#city').prop('readonly', false);
			$('#province').prop('readonly', false);
			$('#customer_id').prop('readonly', false);
			$('#postal_code').prop('readonly', false);
		}
	});
	
	$(document).on('keyup ','#salesman_name',function(e){
		e.preventDefault();
		var name = $(this).val();
		//console.log('name',name);
		if( name.length > 1){
			var response = salesmen.filter(function (item) {
			      if( item.name.toLowerCase().indexOf( name.toLowerCase() ) > -1 )
				  {   return 1; }
			});
			//console.log('response',response);
			if(response){
				$('#suggesstion-salesman').html('');
		    	window.myres = response;
		    	var _ul = $('<ul />')
		    	.attr('id', 'salesman-list');
		    	if ( response.length > 0 ) {
		    		$.each(response, function(i, item) { 
	                    var _li = $('<li />')
				    		.addClass('item_salesman')
				    		.attr('data-salesman_id', item.id )
				    		.html( item.name )
				    		.appendTo(_ul);
	                  });
		    		_ul.appendTo('#suggesstion-salesman');
		    	}
		  		$('#suggesstion-salesman').show();
			}
		}else{
			 $('#suggesstion-salesman').hide();
			 $('#saleman_id').val('');
			 //$('#salesman_name').val();
			 $('#sales_rep').val('');
			 $('#rep_email').val('');
			 $('#sd_rep').val('');
			 $('#rep_email').prop('readonly', false);
		}
	});
	
	
	$(document).on('click ','.item_salesman',function(e){
		e.preventDefault();
		var name = $(this).text();
		console.log('name',name);
		if( name.length > 1){
			var salesman_id = $(this).attr('data-salesman_id');
			var response = salesmen.filter(function (item) {
			     //console.log(item.id,salesman_id);
			      if( item.id === parseInt(salesman_id ))
				    { return 1; }
				});
			//console.log('response',response);
			if(response){
				if(response.length > 0 ) {
						salesman = response[0];
		             	$('#suggesstion-salesman').html('');
					 	$('#suggesstion-salesman').hide();
					 	$('#salesman_id').val(salesman.id);
					 	$('#salesman_name').val(salesman.name);
					 	$('#rep_email').val(salesman.email);
					 	$('#rep_email').prop('readonly', true);
					 	//console.log(salesman.email);
			    	}
			}	
		}else{
			$('#suggesstion-dealers').html('');
			$('#rep_email').prop('readonly', false);
			 
		}
		
	});
	
	var signature_image = "";
	if ( $('.order_id').length > 0 ) {

		var order_id = $('.order_id').val();
		if ( order_id != "" && parseInt(order_id) > 0) {
			signature_image = BASE_URL+'webroot/img/Signs/primco-sign-'+order_id+'.jpg';
		}
	}
	document.addEventListener('DOMContentLoaded',function(){
	  /*Your chartist initialization code here*/
	  console.log('DOMContentLoaded');
	});

	var wrapper = document.getElementById("signature-pad");
	if(wrapper){
		var clearButton = wrapper.querySelector("[data-action=clear]");
		window.orientation = resizeCanvas;
		var canvas = wrapper.querySelector("canvas");
		var signaturePad = new SignaturePad(canvas, {
		  // It's Necessary to use an opaque color when saving image as JPEG;
		  // this option can be omitted if only saving as PNG or SVG
		  backgroundColor: 'rgb(255, 255, 255)',
		  minWidth: 1
		});
		console.log(signature_image);
	     console.log('here',BASE_URL);
		if ( signature_image != "" ) {
			signaturePad.fromDataURL( signature_image );	
		}

		clearButton.addEventListener("click", function (event) {
		  signaturePad.clear();
		});

	    var windowWidth = $(window).width();

		$(window).resize(function(){
			if ($(window).width() != windowWidth) {
				window.onresize = resizeCanvas;
				resizeCanvas();
			}
		});
		window.orientation = resizeCanvas;
		resizeCanvas();
	}

	// Adjust canvas coordinate space taking into account pixel ratio,
	// to make it look crisp on mobile devices.
	// This also causes canvas to be cleared.
	function resizeCanvas() {
	  // When zoomed out to less than 100%, for some very strange reason,
	  // some browsers report devicePixelRatio as less than 1
	  // and only part of the canvas is cleared then.
	  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

	  // This part causes the canvas to be cleared
	  canvas.width = canvas.offsetWidth * ratio;
	  canvas.height = canvas.offsetHeight * ratio;
	  canvas.getContext("2d").scale(ratio, ratio);

	  // This library does not listen for canvas changes, so after the canvas is automatically
	  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
	  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
	  // that the state of this library is consistent with visual state of the canvas, you
	  // have to clear it manually.
	  //signaturePad.clear();
	}

	// On mobile devices it might make more sense to listen to orientation change,
	// rather than window resize events.
	function download(dataURL, filename) {
	  if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
		window.open(dataURL);
	  } else {
		var blob = dataURLToBlob(dataURL);
		var url = window.URL.createObjectURL(blob);

		var a = document.createElement("a");
		a.style = "display: none";
		a.href = url;
		a.download = filename;

		document.body.appendChild(a);
		a.click();

		window.URL.revokeObjectURL(url);
	  }
	}

	// One could simply use Canvas#toBlob method instead, but it's just to show
	// that it can be done using result of SignaturePad#toDataURL.
	function dataURLToBlob(dataURL) {
	  // Code taken from https://github.com/ebidel/filer.js
	  var parts = dataURL.split(';base64,');
	  var contentType = parts[0].split(":")[1];
	  var raw = window.atob(parts[1]);
	  var rawLength = raw.length;
	  var uInt8Array = new Uint8Array(rawLength);

	  for (var i = 0; i < rawLength; ++i) {
		uInt8Array[i] = raw.charCodeAt(i);
	  }

	  return new Blob([uInt8Array], { type: contentType });
	}

	$(document).on('click','#submit-form',function(e){
		// e.preventDefault();
		 console.log('here');
		 var order_id = $('.order_id').val();
		 console.log('order_id',order_id);
		
		if (0) {
			alert("Please provide a signature first.");
		} else {
			var dataURL = signaturePad.toDataURL();
	        var file = dataURLtoBlob(dataURL);
	        var filename = 'primco-sign-'+ order_id +'.jpg';
			var formData = new FormData();
	        formData.append('files',file,filename);
	        formData.append('order_id',order_id);
	      
			$.ajax({
				url: sign_ajax_url,
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
			    type: 'post',
			    async:true,
			    crossDomain:true,
			    mimeType:'multipart/form-data',
			    contentType: false,
			    processData: false,
				dataType: 'json',
				data : formData,
	          
			    success: function( response ){
			    	$('#regForm').submit();
			    	//localStorage.clear();
			    },
			    beforeSend: function(){
			    	console.log('sign_ajax_url')
			    },
			    error: function(a,b,c){
			    	console.log('Error: '+c);
			    }
				    
			});
		}
		return false;
		
	}); 

	function delete_browse_history(){
		window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
      	  console.log('history', window.location.href );
          window.history.pushState(null, "", window.location.href);
      };
	}
	
	function dataURLtoBlob(dataURL){
        var binary = atob(dataURL.split(',')[1]);
        var array = [];
        var i = 0;
        while( i < binary.length){
          array.push (binary.charCodeAt(i));
          i++
        }
       return new Blob([ new Uint8Array(array) ],{ type: 'image/png'})
      };
	
	function dataURLtoFile(dataurl, filename) {
	    var arr  = dataurl.split(',');
	    var mime = arr[0].match(/:(.*?);/)[1];
	    var bstr = atob(arr[1]);
	    var n    = bstr.length;
	    var u8arr = new Uint8Array(n);
	    while(n--){
	        u8arr[n] = bstr.charCodeAt(n);
	    }
	    return new File([u8arr], filename, {type:mime});
	}

	$(document).on('change',".is_installed",function(e) {
		//e.preventDefault();
		var parent = $(this).parents('.product_row');
		var ischecked= parent.find('.is_installed').is(':checked');
			console.log('checked value',parent.find(".is_installed").val());
		var checked_value =parent.find(".is_installed").val();
		if(checked_value ==='no'){
		   	console.log('not checked');
			parent.find('.installed_area').prop('readonly', true);
			parent.find('.installed_date').prop('readonly', true);
			parent.find('.installed_area').val('');
			parent.find('.installed_date').val('');
			parent.find('.installed_date').datepicker( "destroy" );
		}else{
		    console.log('checked');
			parent.find('.installed_area').prop('readonly', false);
			parent.find('.installed_date').prop('readonly', false);
			parent.find('.installed_date').datepicker({ dateFormat: "yy-mm-dd" });
		}
	}); 

	$(document).on('click ','.statement_add',function(e){
		e.preventDefault();
		$('<div class="statement_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="statement_name[]" class="form-control" maxlength="150" id="statement-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="statement_email[]" class="form-control" maxlength="150" id="statement-email" value=""></div></div></div>').appendTo('.statement_main');
	});

   $(document).on('click ','.invoice_add',function(e){
		e.preventDefault();
           $('<div class="invoice_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="invoice_name[]" class="form-control" maxlength="150" id="invoice-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="invoice_email[]" class="form-control" maxlength="150" id="invoice-email" value=""></div></div></div>').appendTo('.invoice_main');   
    });
	
	

    $(document).on('click ','.price_pages_add',function(e){
		e.preventDefault();
           $('<div class="price_pages_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="price_pages_name[]" class="form-control" maxlength="150" id="price-pages-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="price_pages_email[]" class="form-control" maxlength="150" id="price-pages-email" value=""></div></div></div>').appendTo('.price_pages_main');
    });

    $(document).on('click ','.order_confirmation_add',function(e){
		e.preventDefault();
            $('<div class="order_confirmation_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="order_confirmation_name[]" class="form-control" maxlength="150" id="order-confirmation-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="order_confirmation_email[]" class="form-control" maxlength="150" id="order-confirmation-email" value=""></div></div></div>').appendTo('.order_confirmation_main');
    });

    $(document).on('click ','.bank_order_add',function(e){
		e.preventDefault();
            $('<div class="bank_order_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="bank_order_name[]" class="form-control" maxlength="150" id="bank-order-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="bank_order_email[]" class="form-control" maxlength="150" id="bank-order-email" value=""></div></div></div>').appendTo('.bank_order_main');
    });

    $(document).on('click ','.purchasing_agents_add',function(e){
		e.preventDefault();
            $('<div class="purchasing_agents_list statement_list_pos"><div class="row"><div class="col-md-6 mt-3"><input type="text" name="purchasing_agents_name[]" class="form-control" maxlength="150" id="purchasing-agents-name" value=""></div><div class="col-md-6 mt-3"><input type="text" name="purchasing_agents_email[]" class="form-control" maxlength="150" id="purchasing-agents-email" value=""></div></div></div>').appendTo('.purchasing_agents_main');
    });

    $(document).on('click ','.user_options_add',function(e){
		e.preventDefault();
            var $div   = $('.user_options_list').last();
            var $clone = $div.clone();
            $clone.appendTo('.user_options_main');
           // console.log('herrere',$tr);
    });

	
	var wrapper = document.getElementById("authorized_signature-pad");
	if(wrapper){
		var clearButton = wrapper.querySelector("[data-action=clear]");
		window.orientation = resizeCanvas;
		var canvas = wrapper.querySelector("canvas");
		var authorized_signature_pad = new SignaturePad(canvas, {
		  // It's Necessary to use an opaque color when saving image as JPEG;
		  // this option can be omitted if only saving as PNG or SVG
		  backgroundColor: 'rgb(255, 255, 255)',
		  minWidth: 1
		});
		var signature_image = "";
	if ( $('#order_id').length > 0 ) {

		var order_id = $('#order_id').val();

		if ( order_id != "" && parseInt(order_id) > 0) {
		   var filename = 'authorized_signature_'+ order_id +'.jpg';
			signature_image = BASE_URL+'webroot/img/Signs/' +filename;
		}
	}
		console.log(signature_image);
	    console.log(BASE_URL);
		if ( signature_image != "" ) {
			authorized_signature_pad.fromDataURL( signature_image );	
		}

		clearButton.addEventListener("click", function (event) {
		  authorized_signature_pad.clear();
		});

	    var windowWidth = $(window).width();

		$(window).resize(function(){
			if ($(window).width() != windowWidth) {
				window.onresize = resizeCanvas;
				resizeCanvas();
			}
		});
		window.orientation = resizeCanvas;
		resizeCanvas();
	}

	//submission_date
	$('#dated').datepicker({ dateFormat: "yy-mm-dd" });
	$('#submission_date').datepicker({ dateFormat: "yy-mm-dd" });

	
	$(document).on('click','#user_submit',function(e){
		if (0) {
			alert("Please provide a signature first.");
		} else {
			var dataURL = authorized_signature_pad.toDataURL();
			var order_id = $('#order_id').val();
	        var file = dataURLtoBlob(dataURL);
			var filename = 'primco-sign-credit-application-'+ order_id +'.jpg';
			var formData = new FormData();
			console.log('order_id', order_id);
			
	        formData.append('files',file,filename);
	        formData.append('order_id',order_id);
	      
			$.ajax({
				url: sign_ajax_url,
				headers: {
			        'X-CSRF-Token': csrfCustomerToken
			    },
			    type: 'post',
			    async:true,
			    crossDomain:true,
			    mimeType:'multipart/form-data',
			    contentType: false,
			    processData: false,
				dataType: 'json',
				data : formData,
	         
			    success: function( response ){
					console.log('sign_ajax_url', response);
			    	$('#authorized_signature').val(response.file_name);
			    	$('#user_form').submit();
			    	//localStorage.clear();
			    },
			    beforeSend: function(){
			    	console.log('sign_ajax_url')
			    },
			    error: function(a,b,c){
			    	console.log('Error: '+c);
			    }
				    
			});
		}
		return false;
		
	}); 

	if( $('#is_group').length > 0 ){
		 if($('#is_group').val() == 0){
			$('#group_option').hide();
		 }else{
			$('#group_option').show();
		 } 
	}
	
	$(document).on('change keyup', '#is_group', function(e) {
	    if($('#is_group').val() == 0){
	     	$('#group_option').hide();
	     }else{
	     	$('#group_option').show();
	     } 
  
	}); 

	$('#date_installed').datepicker({ dateFormat: "dd-mm-yy" });
});