$(document).ready(function(){
	$('.timepicker').timepicker({});

	$("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".category-list div").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	    });
	});


    /*var Tawk_API=Tawk_API||{}; 
    Tawk_API.visitor = {
        name : 'rohit sharma',
        email : 'rohit@email.com',
        hash : 'hash-value'
    };
    Tawk_API.onLoad = function(){
        console.log("hello from twak to api");
        Tawk_API.setAttributes({
        'name' : 'rohit sharma',
        'email': 'rohit@email.com',
        'hash' : 'hash-value'
        }, function (error) {});
        
        };

    Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6051fa22f7ce182709310a61/1f103i6kv';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();*/

    /*$('#v-pills-tab a').on('click', function (e) {
        e.preventDefault();
      $(this).tab('show')
    })*/

    $('#btn-activate-multiple-services').on('click',function (e){
        e.preventDefault();
        var productIds = [];
        var isChecked=false;
        $('.activate-service').each(function (index, obj) {
            if (this.checked === true) {
                isChecked = true;
                var myId=$(this).attr( "myProduct-id" );
                productIds.push(myId);
            }
        });
        if(isChecked== true){
            $.ajax({
                headers: {
                    'X-CSRF-Token': csrfCustomerToken 
                },
                url: myBaseUrl +'admin/merchant-products/select-service',
                type: "POST",
                data:{
                    products: productIds,
                    },
                success: function(data) {
                    console.log(data);
                    alert("Service Added Successfully");
                }
            });
        }else{
            alert("Please Select any Service to activate");
        }
        //console.log("hello Here in multiple-custom-services"+productIds);
    })
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
    
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
        if (e < onStar) {
            $(this).addClass('hover');
        }
        else {
            $(this).removeClass('hover');
        }
        });
        
    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
        $(this).removeClass('hover');
        });
    });

    $(".order-cancel-request-psp").click(function(e){
        $(".order-cancel-form").removeClass('hide');
    })

    $(".close-cancel-div").click(function(e){
        $(".order-cancel-form").addClass('hide');
    })
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
        }
        
        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        $("#ratingValue").val(ratingValue);
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
        
    });

    $( document ).on( "change", ".orderNoteReply", function() {
        var dataimg=$(this)[0].files[0];
        //console.log(dataimg);
        data = new FormData();
        data.append('file', $(this)[0].files[0]);
        $(this).next().next().attr("disabled", true);
        $.ajax({
            headers: {
                'X-CSRF-Token': csrfCustomerToken 
            },
            url: myBaseUrl +'/order/uploaddoc',
            //data: dataimg,
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false ,  // tell jQuery not to set contentType
            success: function(data) {
                console.log(data);
                $(".userReplyFile").val(data);
                $(this).next().next().attr("disabled", false);	
                $(this).next().next().removeAttr("disabled");
                $(".userReplyNote").removeAttr("disabled");
                $(this).parent().next().children().attr("disabled", true);
            }
        });
    });

    $( document ).on( "click", ".checkPayment", function() {
        $(".orderCompleteBtn").removeClass("hide");
    });

    $(document).on("click",'.userReplyNote',function(){
        var value = $(this).attr('id');
        $(this).attr("disabled", true);
        var datavalue = $(this).attr('data-id');
        var payment_reply =$('.userReply-'+datavalue).val();
        var link =$('#userReplyFile-'+datavalue).val();
        if(payment_reply!=""){
            setTimeout(function(){
                jQuery.ajax({
                    headers: {
                        'X-CSRF-Token': csrfCustomerToken
                    },
                    type: "POST",
                    url: myBaseUrl +'/order/userReply',
                    data: {
                        payment_reply: payment_reply,
                        id:datavalue,
                        link:link,
                        },
                    success: function (data, textStatus){
                        $(this).attr("disabled", false);	
                        $(this).removeAttr("disabled");
                        console.log('finalData',data);
                        alert('Reply sent successfully!');
                        location.reload();
                    },
                }); 
            }, 2000);
        }else{
            alert('Please enter reply to send !!!');
        }
    });

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);  
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

	/*Search in category*/
    jQuery('#search-category').keyup(function () {
        var searchText = jQuery('#search-category').val().toString().toLowerCase();
        console.log('searchText',searchText);
        var current = jQuery(this);
        jQuery('.category-listing .main-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.category-listing').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
        jQuery('.category-listing .sub-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.category-listing').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
    });
    /*Search in brand*/
    jQuery('#search-brand').keyup(function () {
        var searchText = jQuery('#search-brand').val().toString().toLowerCase();
         console.log('searchText brand',searchText);
        var current = jQuery(this);
        jQuery('.brand-list .sub-cat').each(function () {
            var current_li = jQuery(this);
            var current_li_html = current_li.attr('data-value').toString().toLowerCase();
            if (current_li_html.indexOf(searchText) >= 0) {
                jQuery('.brand-list').prepend(current_li.closest('li.parent-checkbox'));
            }
        });
    });
    $( "#CategoryType" ).change(function() {
        var myCl=$('select[name="categoryId"] :selected').attr('class');
        $("#subCategoryType").children('option').hide();
        $("#subCategoryType").children("option[class^=" + myCl + "]").show()
    });
    //myBaseUrl='http://localhost/marketplace/admin/';
    // Get city by state id
    console.log(myBaseUrl);

    $("#acceptCompletion").click(function(e){
        console.log('accept Completion');
        $(".orderStatus").val(1);
        $(".approved").val(1);
        $('.review-section').removeClass('hide');
        $('.rating-widget').removeClass('hide');
        $('.submit-div').removeClass('hide');
        $('.submit-buttons').addClass('hide');
    })

    $("#declineCompletion").click(function(e){
        console.log('decline Completion');
        $(".orderStatus").val(-1);
        $(".approved").val(-1);
        $('.review-section').removeClass('hide');
        $('.submit-div').removeClass('hide');
        $('.submit-buttons').addClass('hide');
    })

    jQuery('#category_id').change(function(){
        var cat_Id = jQuery("#category_id").val();
        if(cat_Id == 8266){
            jQuery('#category_name').removeClass("hide");
        }else{
            jQuery('#category_name').addClass("hide");
            jQuery('#category_name').val("");
        }
        jQuery("#category_id").val();
    });
    jQuery("#subCategoryType").change(function() {
        var csrfToken = "<?= json_encode($this->request->getParam('_csrfToken')) ?>";
        console.log('herel');
        jQuery("#city_id").html('');
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'merchant-products/selectProductByCategory',
            headers: { 'X-CSRF-Token': csrfToken },
            data: {
                id:1,
            },
            success: function (data, textStatus){
            console.log(data);
            },
        });
    });
    $('.show-hide').click(function(e){
        e.preventDefault();
        $(this).next().toggle(1200);
        if ($(this).children().text() == "add_circle")
            $(this).children().text("do_not_disturb_on")
        else
            $(this).children().text("add_circle");
    });
    $(".icon-image-preview").click(function(e){
        e.preventDefault();
        var myType=$(this).parent().prev().attr("myType");
        var istaxable=$(this).parent().prev().attr("istaxable");
        //console.log(myType +'---'+istaxable);
        var newIn = '<div class="row " >';
        newIn +='<input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">'  
        newIn +='<input name="price[]" value="" placeholder="Price" class="form-control col-md-5 px-2 mx-2" type="text">'
        newIn +='<input name="type[]" hidden value="'+ myType +'" placeholder="Price" class="form-control col-md-1 px-2" type="text">'
        newIn +='<input name="taxable[]" hidden value="'+ istaxable +'" placeholder="Price" class="" type="text"><i class="material-icons dp48 remove-row">highlight_off</i></div>';
        var newInput = $(newIn);
        $(this).parent().prev().append(newInput);
    });



    $(".add-texable-field").click(function(e){
        e.preventDefault;
        var newIn = '<div class="taxable-row row w-100">  <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter Heads Fee & Charges" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div><i class="material-icons dp48 remove-texable-row added_custom">highlight_off</i><input name="taxable[]" value="1" hidden type="text"></div>'  
        var newInput = $(newIn);
        $(".texable-data").append(newInput);

    });

    $('#texable-data').on( 'click', 'i.remove-texable-row', function () {  
        //$(this).parent().remove();
        $(this).parent().fadeOut("slow", function() { $(this).remove(); });
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
        setTimeout(function(){
            console.log('REMOVING FIELDS WAIT.. FOR UPDATE CALCULATIONS');
            $(".basic-tax-price").trigger( "focusout" );
            $(".std-tax-price").trigger( "focusout" );
            $(".pre-tax-price").trigger( "focusout" );
          }, 2000);
        //$(".total-taxable-basic").trigger( "change" );
        console.log('DUMMY');
    });
    $(".add-nontexable-field").click(function(e){
        e.preventDefault;
        var newIn = '<div class="non-taxable-row row w-100"> <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter Heads for Govt." class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div> <i class="material-icons dp48 remove-nontexable-row">highlight_off</i><input name="taxable[]" value="0" hidden type="text"></div>'  
        var newInput = $(newIn);
        $(".non-texable-data").append(newInput);

    });

    $('#non-texable-data').on( 'click', 'i.remove-nontexable-row', function () {  
        //$(this).parent().remove();
        //alert('TEST');
        $(this).parent().fadeOut("slow", function() { $(this).remove(); });
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
        if($('#non-texable-data').parent().find('.non-taxable-row').length == 1) {
            $(".total-nontaxable-basic").val(0);
            $(".total-nontaxable-std").val(0);
            $(".total-nontaxable-pre").val(0);
        }
        setTimeout(function(){
            console.log('REMOVING FIELDS WAIT.. FOR UPDATE CALCULATIONS');
            $(".basic-tax-price").trigger( "focusout" );
            $(".std-tax-price").trigger( "focusout" );
            $(".pre-tax-price").trigger( "focusout" );
        }, 2000);
    });

    $(".gst-add").click(function(e){
        e.preventDefault;
        $(".gst-div").toggleClass("hide");
        //basic Calc
        $(".basic-nontax-price").trigger( "focusout" );
        $(".total-taxable-basic").trigger( "change" );

        //Standard Plan
        if($(".total-taxable-std").val()>0){
            $(".std-nontax-price").trigger( "focusout" );
            $(".total-taxable-std").trigger( "change" );
        }
        //Premium Calc
        $(".pre-nontax-price").trigger( "focusout" );
        $(".total-taxable-pre").trigger( "change" );

        $("._is_taxable").val($("._is_taxable").val() == '1' ? '0' : '1');

    });

    $("#non-texable-toggle").click(function(e){
        e.preventDefault;
        $(".non-texable-div").toggleClass("hide");
        $(".non-taxable-heading").text($(".non-taxable-heading").text() == 'Any Amount For Govt. Payments' ? 'Amount For Govt. Payments' : 'Any Amount For Govt. Payments');
        $('.total-taxable-basic').trigger("change");
        $('.total-taxable-std').trigger("change");
        $('.total-taxable-pre').trigger("change");
        
        
    });
    $('#user-availability').click(function(e){
        e.preventDefault;
        var userAvailable=0;
        var csrfToken = "<?= json_encode($this->request->getParam('_csrfToken')) ?>";
        //console.log("user-availability-toggle");
        if($(this).prop("checked") == true){
            userAvailable=1;
            console.log("user-availability-toggle-checked" +csrfCustomerToken );
        }else{
            userAvailable=0;
            console.log("user-availability-toggle-unchecked"+csrfCustomerToken );
        }
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'admin/merchants/useravailabilty',
            headers: { 'X-CSRF-Token': csrfCustomerToken },
            data: {
                userAvailable:userAvailable,
            },
            success: function (data, textStatus){
                console.log(data);
            },
        });
    });

    $(".add-faq").click(function(e){
        // e.preventDefault();
        // var newIn = '<div class="md-form row w-100 border pt-1 pb-3 rounded my-1">';
        // newIn +=        '<label class="col-md-2 p-1">Question</label>';
        // newIn +=        '<input name="questions[]" value="" placeholder="" class="col-md-10 mb-1" type="text"> '; 
        // newIn +=        '<label class="col-md-2 p-1 ">Answer</label>';
        // newIn +=        '<textarea name="answers[]" value="" placeholder="" class="form-control col-md-10 px-1 mb-1" type="text"></textarea>';  
        // newIn +=    '   <i class="material-icons dp48 row remove-faq py-2">highlight_off</i></div>';
        // $(this).parent().prev().append(newIn);
    });

    $(".onlyNo").keyup(function(e){
        if (/\D/g.test(this.value))
        {
          // Filter non-digits from input value.
          this.value = this.value.replace(/\D/g, '');
        }
    });
    $('#service-Pricing').on('keyup','.onlyNo',function(){
        if (/\D/g.test(this.value))
        {
          // Filter non-digits from input value.
          this.value = this.value.replace(/\D/g, '');
        }    
    });

    $("._basic_booking_price").focusout(function(){
        if(parseInt($(".basic_gst_total").val()) < parseInt($(this).val())){
            alert("Standard Booking Amount can't be more than Grand total!!!");
            $(this).val('');
        }  
    })

    $('._standard_booking_price').focusout(function(){
        if(parseInt($(".std_gst_total").val())< parseInt($(this).val())){
            alert("Pro Booking Amount can't be more than Grand total!!!");
            $(this).val('');
        }  
    })

    $('._premium_booking_price').focusout(function(){
        if(parseInt($(".pre_gst_total").val()) < parseInt($(this).val())){
            alert("Premium Booking Amount can't be more than Grand total!!!");
            $(this).val('');
        }
    })
    /*$(".remove-faq").click(function(e){
        e.preventDefault();
        $(this).parent().hide("slow");
    });*/
    $('#faq-section').on( 'click', 'i.remove-faq', function () {  
        //$(this).parent().remove();
        $(this).parent().fadeOut("slow", function() { $(this).remove(); });
    });

    $('#product_form').on( 'click', 'i.remove-row', function () {  
        //$(this).parent().remove();
        $(this).parent().fadeOut("fast", function() { $(this).remove(); });
    });

    /*$('.remove-row').click(function(e){
        e.preventDefault();
        $(this).parent().remove();
    });*/
    
    $('.texable-data').on( 'focusin', '.basic-tax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            $(this).val("");
            alert('Please enter a heading first');
            $(this).blur();
        }
    });
    /*$('.texable-data').on( 'focusout', '.basic-tax-price', function () {  
        console.log('focus out');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            $(this).val("");
        }
    });*/
    $('.texable-data').on( 'focusin', '.std-tax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            alert('Please enter a heading first');
            $(this).blur();
        }
    });
    $('.texable-data').on( 'focusin', '.pre-tax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            alert('Please enter a heading first');
            $(this).blur();
        }
    });
    $('.texable-data').on( 'focusout', '.basic-tax-price', function () {  
        console.log('jQuery Running Here');
        var basicTot=0;
        var tmpVal=0;
        $('.basic-tax-price').each(function() {
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        console.log("basicTot--"+basicTot);
        $(".total-taxable-basic").val(basicTot);
        $(".basic-nontax-price").trigger( "focusout" );
        $(".total-taxable-basic").trigger( "change" );
    });

    $('.texable-data').on( 'focusout', '.std-tax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.std-tax-price').each(function() {
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-taxable-std").val(basicTot);
        $(".std-nontax-price").trigger( "focusout" );
        $(".total-taxable-std").trigger( "change" );
    });

    $('.texable-data').on( 'focusout', '.pre-tax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.pre-tax-price').each(function() {
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-taxable-pre").val(basicTot);
        $(".pre-nontax-price").trigger( "focusout" );
        $(".total-taxable-pre").trigger( "change" );
    });
    //------------------------none texable div---------------
    $('.non-texable-data').on( 'focusin', '.basic-nontax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            alert('Please enter a heading first');
            $(this).blur();
        }
    });
    $('.non-texable-data').on( 'focusin', '.std-nontax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            alert('Please enter a heading first');
            $(this).blur();
        }
    });
    $('.non-texable-data').on( 'focusin', '.pre-nontax-price', function () {  
        console.log('focus in');
        var heading=''
        heading = $(this).parent().parent().find('input[type=text]').filter(':input:visible:first').val();
        if(heading==''){
            alert('Please enter a heading first');
            $(this).blur();
        }
    });

    $('.non-texable-data').on( 'focusout', '.basic-nontax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.basic-nontax-price').each(function() {
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-nontaxable-basic").val(basicTot);
        $(".total-taxable-basic").trigger( "change" );
    });

    $('.non-texable-data').on( 'focusout', '.std-nontax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.std-nontax-price').each(function() {
            tmpVal=$( this ).val();
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-nontaxable-std").val(basicTot);
        $(".total-taxable-std").trigger( "change" );
    });

    $('.non-texable-data').on( 'focusout', '.pre-nontax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.pre-nontax-price').each(function() {
            tmpVal=parseInt($( this ).val());
            if(tmpVal == '' ||  Number.isInteger(tmpVal) == false){
                tmpVal=0;
            }
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-nontaxable-pre").val(basicTot);
        $(".total-taxable-pre").trigger( "change" );
    });

    /* calculations for total basic Price */
    $( ".total-taxable-basic" ).change(function() {
        var tmptaxable=0; var tmpnontaxable=0; var tot=0; var basicGst=0;
        var commission=0;var b_commssion_oprator="";var b_commssion_add=0;

        console.log('calculations for total basic Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        if($(".total-nontaxable-basic").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-basic").val();
        }
        // if($('#non-texable-toggle').is(":checked")){
        //     tmpnontaxable=$(".total-nontaxable-basic").val();
            
        // }else {
        //     tmpnontaxable=0;
        // }
        
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        basicGst= tmptaxable * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            basicGst=0;
        }
        $( ".gst_basic" ).val(basicGst);
        $(".basic_gst_total").val(tot + basicGst);
        $(".total_basic_amt").val(tot);
        $("._basic_plan_price").val(tot);
        
        setTimeout(function(){
            $("._basic_booking_price").val('0');
            $("#_basic_plan_time").val('0');
            $("._standard_booking_price").val('0');
            $("._premium_booking_price").val('0');
            $("#_standard_plan_time").val('0');
            $("#_premium_plan_time").val('0');
        }, 2000);
        
        commission=parseInt($('#_basic_commission').val());
        b_commssion_oprator=$('#b_commssion_oprator').val();
        b_commssion_add=parseInt($('#b_commssion_add').val());
        console.log("b_commssion_add----" + b_commssion_add);

        var url = window.location.href; 
        console.log(url);
        console.log(isNaN(commission));
        var res =url.split("/");
        if(res[5]=='custom-service' || res[5]=='view' || res[5]=='edit' ||  isNaN(commission)){
            //commission=70;
            //b_commssion_oprator='-';
            console.log('in the custom Product');
        }
        console.log(commission);
        var commissionAmt=0;
        if(commission!=0){
            console.log('Condition if running');
            if(b_commssion_oprator==0){
                b_commssion_oprator='-';
            }
            commissionAmt= tmptaxable * (commission/100);
            commissionAmt=eval(commissionAmt + b_commssion_oprator + b_commssion_add);
            console.log('b_commssion_oprator',b_commssion_oprator);
            
        } else {
            console.log('Condition Else running');
            //alert("Please Select a Service!!!")
            basicGst_= tmptaxable * (30/100);
            commissionAmt= parseInt (tmptaxable) - parseInt (basicGst_) - parseInt (10);
            
        }
        if($('.total-taxable-basic').val()==0) {
            var commissionAmt=0.00;
        } 
        $(".total_basic_fee").val(commissionAmt.toFixed(2));
        $(".total_basic_tcs").val((tot+basicGst)/100+(tot+basicGst)/100);
        


        var _duty_charges= parseInt(tot) - parseInt(tmptaxable);

        // Payable gst
        var payablegst_amount = parseInt(commissionAmt.toFixed(2))-parseInt((tot+basicGst)/100+(tot+basicGst)/100);
        console.log('payablegst',payablegst);
        var payablegst= payablegst_amount * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            payablegst =0;
        }
        $(".total_payable_gst").val(payablegst.toFixed(2));
        var total_basic=(_duty_charges + payablegst_amount+payablegst);
        console.log('09-07-2021',total_basic);
        $(".total_basic_payable").val(total_basic.toFixed(2));
    });

    /* calculations for total standard Price */
    $( ".total-taxable-std" ).change(function() {
        var tmptaxable=0; var tmpnontaxable=0; var tot=0; var stdGst=0;
        var commission=0;var s_commssion_oprator="";var s_commssion_add=0;

        console.log('calculations for total std Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        
        if($(".total-nontaxable-std").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-std").val();
        }

        // if($('#non-texable-toggle').is(":checked")){
        //     tmpnontaxable=$(".total-nontaxable-std").val();
        // } else {
        //     tmpnontaxable=0;
        // }
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        stdGst= tmptaxable * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            stdGst=0;
        }
        $( ".gst_std" ).val(stdGst);
        $(".std_gst_total").val(tot + stdGst);
        $(".total_std_amt").val(tot);
        $("._standard_plan_price").val(tot);

        commission=parseInt($('#_standard_commission').val());
        s_commssion_oprator=$('#s_commssion_oprator').val();
        s_commssion_add=parseInt($('#s_commssion_add').val());
        
        var url = window.location.href; 
        var res =url.split("/");
        if(res[5]=='custom-service' || res[5]=='view' || res[5]=='edit' || isNaN(commission)){
            // commission=30;
            // s_commssion_oprator='-';
        }
        var commissionAmt=0;
        
        if(commission!=0){
            if(s_commssion_oprator==0){
                s_commssion_oprator='-';
            }
            commissionAmt= tmptaxable * (commission/100);
            commissionAmt=eval(commissionAmt + s_commssion_oprator + s_commssion_add);
            console.log("dev commissionAmt----" + commissionAmt);
            if($('.std-tax-price').val()==0) {
                var commissionAmt=0.00;
            }
            
            $(".std-tax-price").each(function() {
                var element = $(this);
                if (element.val()=="NA" || element.val()==0 || element.val() == "") {
                    var commissionAmt=0.00;
                }
             });
            
        } else {
            basicGst_= tmptaxable * (30/100);
            commissionAmt= parseInt (tmptaxable) - parseInt (basicGst_) - parseInt (10);
        }
        if($('.total-taxable-std').val()==0) {
            var commissionAmt=0.00;
        } 
        console.log("dev commissionAmt----" + commissionAmt);
        $(".total_std_fee").val(commissionAmt);

        $(".total_std_tcs").val((tot+stdGst)/100+(tot+stdGst)/100);
        
       
        
        
        var std_total =(tot + stdGst)-(commissionAmt+(tot/100))
        
        var _duty_charges= parseInt(tot) - parseInt(tmptaxable);

        // Payable gst
        var payablegst_amount = parseInt(commissionAmt.toFixed(2))-parseInt((tot+stdGst)/100+(tot+stdGst)/100);
        console.log('payablegst',payablegst);
        var payablegst= payablegst_amount * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            payablegst =0;
        }
        $(".total_std_payable_gst").val(payablegst.toFixed(2));
        var std_total=(_duty_charges + payablegst_amount+payablegst);
        $(".total_std_payable").val(std_total.toFixed(2));

    });

    /* calculations for total Premium Price */
    $( ".total-taxable-pre" ).change(function() {
        var tmptaxable=0; var tmpnontaxable=0; var tot=0;var preGst=0;
        var commission=0;var p_commssion_oprator="";var p_commssion_add=0;

        console.log('calculations for total pre Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        if($(".total-nontaxable-pre").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-pre").val();
        }
        // if($('#non-texable-toggle').is(":checked")){
        //     tmpnontaxable=$(".total-nontaxable-pre").val();
        // } else {
        //     tmpnontaxable=0;
        // }

        
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        preGst= tmptaxable * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            preGst=0;
        }
        $( ".gst_pre" ).val(preGst);
        $(".pre_gst_total").val(tot + preGst);
        $(".total_pre_amt").val(tot);
        $("._premium_plan_price").val(tot);

        commission=parseInt($('#_premium_commission').val());
        p_commssion_oprator=$('#p_commssion_oprator').val();
        p_commssion_add=parseInt($('#p_commssion_add').val());

        var commissionAmt=0;
        var url = window.location.href; 
        var res =url.split("/");
        if(res[5]=='custom-service' || res[5]=='view' || res[5] == 'edit' || isNaN(commission)){
            // commission=30;
            // p_commssion_oprator='-';
        }
        if(commission!=0 && commission!=""){
            if(p_commssion_oprator==0){
                p_commssion_oprator='-';
            }
            commissionAmt= tmptaxable * (commission/100);
            commissionAmt=eval(commissionAmt + p_commssion_oprator + p_commssion_add);
            console.log("commissionAmt----" + commissionAmt);
            if($('.pre-tax-price').val()==0) {
                var commissionAmt=0.00;
            } 
        } else {
            basicGst_= tmptaxable * (30/100);
            commissionAmt= parseInt (tmptaxable) - parseInt (basicGst_) - parseInt (10);
        }

        if($('.total-taxable-pre').val()==0) {
            var commissionAmt=0.00;
        } 

        $(".total_pre_fee").val(commissionAmt.toFixed(2));

        $(".total_pre_tcs").val((tot+preGst)/100+(tot+preGst)/100);

        var _duty_charges= parseInt(tot) - parseInt(tmptaxable);
        var payablegst_amount = parseInt(commissionAmt.toFixed(2))-parseInt((tot+preGst)/100+(tot+preGst)/100);
        console.log('payablegst',payablegst);
        var payablegst= payablegst_amount * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            payablegst =0;
        }
        
        $(".total_pre_payable_gst").val(payablegst.toFixed(2));
        var pre_total=(_duty_charges + payablegst_amount+payablegst);

        //var pre_total=(tot + preGst)-(commissionAmt+(tot/100))
        $(".total_pre_payable").val(pre_total.toFixed(2));
    });
    
    commission=parseInt($('#_basic_commission').val());
    if(commission!=0){
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
    }
    $(".go-to-dashborad").click(function(){
        window.location.href = "https://easifyy.com/admin/users/dashboard";
    })

    
});

$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){ 
        $(".basic-tax-price").trigger( "focusout" );
    $(".std-tax-price").trigger( "focusout" );
    $(".pre-tax-price").trigger( "focusout" );
    setTimeout(function(){
        console.log('REMOVING FIELDS WAIT.. FOR UPDATE CALCULATIONS');
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
      }, 2000);
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        var mydesc=$("#ProductDescription").text();
        if(mydesc!=""){
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        }else{
            alert("Please Select a Service to go to next Step");
        }
    });
    
    $(".previous").click(function(){
    
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        
        //show the previous fieldset
        previous_fs.show();
    
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;
            
            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
            },
        duration: 600
        });
    });
    
    $(".service-inc-next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        console.log($("#_basic_price_desc").val());
        if($("#_basic_price_desc").val()!=''){
            $("#CustomServiceBar li").eq($("fieldset").index(next_fs)).addClass("active");
            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 600
            });
        }else{
            alert("Atleast add  Standard Plan Inclusions");
        } 
    })
    $("#product_save").click(function(){
        $("#submitloader").css("display","inline-block");
        console.log("Hello , we are here on product save btn !!!");
        $(this).prop('disabled', true);
        var csrfToken = $('input[name ="_csrfToken"]').val()  ;
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'admin/merchant-products/activate-service',
            headers: { 'X-CSRF-Token': csrfToken },
            data: $('#activate-service').serialize(),
            success: function (data, textStatus){
                console.log(JSON.parse(data));
                var myArr=JSON.parse(data);
                $(this).prop('disabled', false);
                $('#productId').val(myArr[0]);
                $('.submit-for-live').attr("href",myBaseUrl +'admin/merchant-products/submit-product/'+myArr[0]);
                $("#preview-Service").attr("href","../../admin/merchant-products/view/"+myArr[0])
                $( "#grad1 fieldset:nth-of-type(4)" ).css({"display": "none", "opacity": "0","position": "relative"});
                $( "#grad1 fieldset:nth-of-type(5)" ).css({"opacity": "1","display": "block"});
                $("#submitloader").css("display","none");
            },
        });
    })
    $(".service-pricing-next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        console.log($(".total-taxable-basic").val());
        
        // For activate service page
        if ((parseFloat($(".total-taxable-basic").val()) == 0) && (parseFloat($(".total-taxable-std").val()) == 0) && (parseFloat($(".total-taxable-pre").val()) == 0)) {
            alert("Add Professoinal fee for atleast one Plan");
            return false
        }

        // For custom service page
        if ($(".total-taxable-basic").val() == 0 && $(".total-taxable-std").val() == 0 && $(".total-taxable-pre").val() == 0) {
            alert("Add Professoinal fee for atleast one Plan");
            return false
        }

        // For Active Service Page        
        if (parseFloat($(".total-taxable-basic").val()) != 0) {
            if ((parseFloat($("#_basic_plan_time").val()) == 0)) {
                alert("Add Delivery Time for Standard Plan");
                return false
            }
        }
        
        if ((parseFloat($(".total-taxable-std").val()) != 0) && $(".total-taxable-std").val() != 0) {
            if ((parseFloat($("#_standard_plan_time").val()) == 0)) {
                alert("Add Delivery Time for Pro Plan");
                return false
            }
        }

        if ((parseFloat($(".total-taxable-pre").val()) != 0) && $(".total-taxable-pre").val() != 0) {
            if ((parseFloat($("#_premium_plan_time").val()) == 0)) {
                alert("Add Delivery Time for Premium Plan");
                return false
            }
        }

        // For Custom Service Page
        if ($(".total-taxable-basic").val() != 0) {
            if ($("#_basic_plan_time").val() == 0) {
                alert("Add Delivery Time for Standard Plan");
                return false
            }
        }
        
        if ($(".total-taxable-std").val() != 0) {
            if ($("#_standard_plan_time").val() == 0) {
                alert("Add Delivery Time for Pro Plan 1");
                return false
            }
        }

        if ($(".total-taxable-pre").val() != 0) {
            if ($("#_premium_plan_time").val() == 0) {
                alert("Add Delivery Time for Premium Plan");
                return false
            }
        }

        $("#CustomServiceBar li").eq($("fieldset").index(next_fs)).addClass("active");
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
           
        
    })

    $(".profile-next").click(function(){ 
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        $("#CustomServiceBar li").eq($("fieldset").index(next_fs)).addClass("active");
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                // for making fielset appear animation
                opacity = 1 - now;
                
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
        
    });

    $(".custom-service-next").click(function(){ 
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
        var mytitle=$("#service-title").val();
        var mytitleDesc=$('#ProductTitle').val();
        var myDesc=$('#service_description').val();
        var myServiceInc =$('#service_coverd').val();
        var myServiceTarget =$('#service_target').val();
        var myServiceProcess =$('#service_process').val();

        if(mytitle!=""){
            if(mytitleDesc!=''){
                if(myDesc!=''){
                    if(myServiceInc!=''){
                        if(myServiceTarget!=''){
                            if(myServiceProcess!=''){
                                $("#CustomServiceBar li").eq($("fieldset").index(next_fs)).addClass("active");
                                //show the next fieldset
                                next_fs.show();
                                //hide the current fieldset with style
                                current_fs.animate({opacity: 0}, {
                                    step: function(now) {
                                        // for making fielset appear animation
                                        opacity = 1 - now;
                                        
                                        current_fs.css({
                                            'display': 'none',
                                            'position': 'relative'
                                        });
                                        next_fs.css({'opacity': opacity});
                                    },
                                    duration: 600
                                });
                            }else{
                                alert("Please enter a Service Process to go to  next Step");     
                            }
                        }else{
                            alert("Please enter a Service Who Should Buy to go to  next Step");     
                        }
                    }else{
                        alert("Please enter a Service Inclusions to go to  next Step");     
                    }
                }else{
                    alert("Please enter a Description to go to  next Step");     
                }
            }else{
                alert("Please enter a Service title description to go to  next Step");     
            }
        }else{
            alert("Please enter a Service title to go to  next Step");
        }
    });


    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    //$(".submit").click(function(){
    //    return false;
    //})
    $("#profile-settings-btn").click(function(){
        //var formData= $("#profile-settings")
        if($("#address_line_1").val()!=''){
            if($("#zip_code").val()!=''){
                if($("#pan_number").val()!=''){
                    //if($("#gst_number").val()!=''){
                        //if($("#license_number").val()!=''){
                        //    if($("#institute_name").val()!=''){
                                jQuery.ajax({
                                    dataType: "html",
                                    type: "POST",
                                    evalScripts: true,
                                    url: myBaseUrl +'admin/merchants/store-settings',
                                    data: $('#profile-settings').serialize(),
                                    success: function (data, textStatus){
                                        $("#progressbar li").eq(1).addClass("active");
                                        $( "#grad1 fieldset:nth-of-type(1)" ).css({"display": "none", "opacity": "0","position": "relative"});
                                        $( "#grad1 fieldset:nth-of-type(2)" ).css({"opacity": "1","display": "block"});
                                    },
                                });
                        //    }else{
                        //        alert("Name of Institute can't be empty");
                        //    }
                        //}else{
                        //    alert("Practising Reg./Licence No. can't be empty");
                        //}
                    //}else{
                    //    alert("GST No. can't be empty");
                    //}
                }else{
                    alert("PAN No. can't be empty");
                }
            }else{
                alert("PIN Code can't be empty");
            }
        }else{
            alert("Address line 1 Code can't be empty");
        }
    })

    $("#bank-settings-btn").click(function(){
        accNoCon=$("#account-number-confirm").val();
        accNo=$("#account-number").val();
        if(accNo!=''){
            if (accNo==accNoCon){
                if($('#account-holder').val()!=''){
                    if($('#bank-name').val()!=''){
                        if($('#bank-branch').val()!=''){
                            if($('#ifsc-code').val()!=''){
                                jQuery.ajax({
                                    dataType: "html",
                                    type: "POST",
                                    evalScripts: true,
                                    url: myBaseUrl +'admin/merchants/bank-details',
                                    data: $('#bank-settings').serialize(),
                                    success: function (data, textStatus){
                                        console.log('Success !!!!!');
                                        $("#progressbar li").eq(2).addClass("active");
                                        $( "#grad1 fieldset:nth-of-type(1)" ).css({"display": "none", "opacity": "0","position": "relative"});
                                        $( "#grad1 fieldset:nth-of-type(2)" ).css({"display": "none", "opacity": "0","position": "relative"});
                                        $( "#grad1 fieldset:nth-of-type(3)" ).css({"opacity": "1","display": "block"});
                                    },
                                });
                            }else{
                                alert("Bank ifsc code can't be empty !!!");
                                $("#ifsc-code").focus(); 
                            }
                        }else{
                            alert("Bank Branch Name can't be empty !!!");
                            $("#bank-branch").focus(); 
                        }
                    }else{
                        alert("Bank Name can't be empty !!!");
                        $("#bank-name").focus(); 
                    }
                }else{
                    alert("Account holder Name can't be empty !!!");
                    $("#account-holder").focus();                    
                }
            }else{
                alert("account number Must be same");
                $("#account-number-confirm").focus();
            }
        }else{
            alert("account number can't be empty!!");
            $("#account-number").focus();
        }
    })
    $("#kyc-details-btn").click(function(){
        var imgVal = $('input[name="filegovt_Id"]').val();
        if(imgVal=='') {
            alert("empty input file");
            return false;
        }
        
        /*jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            contentType: false,
            processData: false,
            url: myBaseUrl +'admin/merchant-kycs/add',
            data: $('#kyc-details').serialize(),
            success: function (data, textStatus){
            console.log("data Saved Successfully");
            },
        });*/
        //$('#kyc-details').submit();
    })
    $("#account-number-confirm").focusout(function() {
        //console.log("a");
        var accNo=""; var accNoCon="";
        accNo=$("#account-number-confirm").val();
        accNoCon=$("#account-number").val();
        if (accNo!=accNoCon){
            alert("account number Must be same");
        }
    })
    $("#sop-agree-btn").click(function(){
        var mysopCheck=$('#sop');
        var myVal=$('#sop').val();
        if(myVal==1){
            jQuery.ajax({
                dataType: "html",
                type: "POST",
                evalScripts: true,
                url: myBaseUrl +'admin/merchants/sop-agree',
                data: $('#sop-agree').serialize(),
                success: function (data, textStatus){
                    //current_fs = $(this).parent();
                    //current_fs.attr("class");
                    //next_fs = $(this).parent().next();
                    //console.log(current_fs.attr("class")+"---"+next_fs +"+"+ current_fs+"+"+ $("fieldset").index(next_fs));
                    //Add Class Active
                    $("#progressbar li").eq(4).addClass("active");
                    //show the next fieldset
                    $( "#grad1 fieldset:nth-of-type(4)" ).css({"display": "none", "opacity": "0","position": "relative"});
                    $( "#grad1 fieldset:nth-of-type(5)" ).css({"opacity": "1","display": "block"});

                },
            });
        }else{
            alert("Please agree with SOP and Guidline to continue")
        }
    })

    $("#custom-product-save").click(function(){
        console.log("hello in the custom save");
        $(this).prop('disabled', true);
        var csrfToken = $('input[name ="_csrfToken"]').val()  ;
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'admin/merchant-products/custom-service',
            headers: { 'X-CSRF-Token': csrfToken },
            data: $('#custom-product').serialize(),
            success: function (data, textStatus){
                //myArr[0]=$data;
                $('#productId').val(data);
                setTimeout(function(){
                    $('#productId').val(data);
                }, 2000);
                $("#preview-Service").attr("href","../../admin/merchant-products/view/"+data)
                $("#CustomServiceBar li").eq(4).addClass("active");
                //show the next fieldset
                $( "#grad1 fieldset:nth-of-type(4)" ).css({"display": "none", "opacity": "0","position": "relative"});
                $( "#grad1 fieldset:nth-of-type(5)" ).css({"opacity": "1","display": "block"});
            },
        });
    })
    
    $("#custom-product-submit").click(function(){
        //alert(myBaseUrl);
        //$("#product_save").trigger( "click" );
        var csrfToken = $('input[name ="_csrfToken"]').val()  
        var myId=$('#productId').val();
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'admin/merchant-products/submit-product/',
            headers: { 'X-CSRF-Token': csrfToken },
            data: {
                id:myId,
            },
            success: function (data, textStatus){
                console.log(data);
                //JSON.parse(data);
                window.location.href = "https://easifyy.com/admin/merchant-products";
                $("#CustomServiceBar li").eq(5).addClass("active");
                //show the next fieldset
                $( "#grad1 fieldset:nth-of-type(5)" ).css({"display": "none", "opacity": "0","position": "relative"});
                $( "#grad1 fieldset:nth-of-type(6)" ).css({"opacity": "1","display": "block"});
            },
        });
    })


    $(".delete-product-image").click(function(){
        var csrfToken = $('input[name ="_csrfToken"]').val()  
        var myId=$(this).attr("data-id");
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'base/delete-product-image',
            headers: { 'X-CSRF-Token': csrfToken },
            data: {
                gallery_id:myId,
            },
            success: function (data, textStatus){
                console.log(data);
                $("#image"+myId).remove();
                //JSON.parse(data);
                //window.location.href = "https://easifyy.com/admin/merchant-products";
                // $("#CustomServiceBar li").eq(5).addClass("active");
                // //show the next fieldset
                // $( "#grad1 fieldset:nth-of-type(5)" ).css({"display": "none", "opacity": "0","position": "relative"});
                // $( "#grad1 fieldset:nth-of-type(6)" ).css({"opacity": "1","display": "block"});
            },
        });
    })

    var url = window.location.href; 
    if(url.indexOf("kyc-doc") != -1){
        $( "#progressbar li:nth-child(1)" ).removeClass( "active" );
        $( "#progressbar li:nth-child(1)" ).addClass( "active" );
        $( "#progressbar li:nth-child(2)" ).addClass( "active" );
        $( "#progressbar li:nth-child(3)" ).addClass( "active" );
        $( "#grad1 fieldset:nth-of-type(0)" ).css({"display": "none", "opacity": "0","position": "relative"});
        $( "#grad1 fieldset:nth-of-type(1)" ).css({"display": "none", "opacity": "0","position": "relative"});
        $( "#grad1 fieldset:nth-of-type(3)" ).css({"opacity": "1","display": "block"});
        //$( "#grad1 fieldset:nth-of-type(2)" ).css({"background-color": "yellow", "font-size": "200%"});
        //$( "#grad1 fieldset:nth-of-type(1)" ).css({"background-color": "green", "font-size": "200%"});
        //$( "#grad1 fieldset:nth-of-type(0)" ).css({"background-color": "blue", "font-size": "200%"});

    }
    accNoCon=$("#account-number-confirm").val();
    accNo=$("#account-number").val();
    if(accNo!=""){
        $("#account-number-confirm").val(accNo)
    }
    $('#service-title').focusout(function(){
        //console.log('--'+$('#service-title').val());
        $('.serviceName').html($('#service-title').val())
    })
    var url = window.location.href; 
    var res =url.split("/");
    if(res[5]=='view' || res[5]=='edit'){
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
    }

    $('.custom-service-btn').click(function(){
        //console.log("custom-service-btn");
        $('.actived-service').addClass('hide');
        $('.custom-service').removeClass('hide');
    });
    $('.actived-service-btn').click(function(){
        //console.log("actived-service-btn");      
        $('.custom-service').addClass('hide');
        $('.actived-service').removeClass('hide');
    });
    $('.all-service-btn').click(function(){
        $('.custom-service').removeClass('hide');
        $('.actived-service').removeClass('hide');
    });

    /*Non Gst Invoice Send */
    $("#generateinvoicetoUser").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/admin/orders/sendInvoicetoUserPDF',
                data: {
                      status: value,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    $('.spinner-wrap').css("display","none");
                    //initialize all modals
                    $('.modal').modal({
                        dismissible: true
                    });
                    //call the specific div (modal)
                    $('#exampleModal').modal('open');
                    var s1 = data;
                    var s2 = s1.substring(1);
                    $('.pdf-Modal').attr("src",s2);
                    $('.pdf-download').attr("href",s2)

                    $('.spinner-wrap').css("display","none");
                },
            }); 
        }, 2000);     
    });
    $('.pdf-download').click(function(){
        $("#sendInvoicetoUser").removeClass("hide");
    });
    $("#sendInvoicetoUser").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/admin/orders/sendInvoicetoUserNonGST',
                data: {
                      status: value,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    alert('Invoice Sent to Successfully ');
                },
            }); 
        }, 2000);     
    });
    /*Non Gst Invoice Send Ends Here */

    $("#generateinvoicetoUserWithGst").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/admin/orders/sendInvoicetoUserGstPDF',
                data: {
                      status: value,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    $('.spinner-wrap').css("display","none");
                    //initialize all modals
                    $('.modal').modal({
                        dismissible: true
                    });
                    //call the specific div (modal)
                    $('#exampleModalGst').modal('open');
                    var s1 = data;
                    var s2 = s1.substring(1);
                    $('.pdf-Modal-gst').attr("src",s2);
                    $('.pdf-download-gst').attr("href",s2)

                    $('.spinner-wrap').css("display","none");
                },
            }); 
        }, 2000);     
    });
    $('.pdf-download-gst').click(function(){
        $("#sendInvoicetoUserGst").removeClass("hide");
    });
    $("#sendInvoicetoUserGst").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/admin/orders/sendInvoicetoUserGst',
                data: {
                      status: value,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    //var downloadLink = data.replace("1", "");
                   // $(".download-invoice").append(downloadLink);
                    alert('Invoice Sent to Successfully ');
                },
            }); 
        }, 2000);     
    });
});

