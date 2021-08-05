$(document).ready(function(){
	$('.timepicker').timepicker({});

	$("#myInput").on("keyup", function() {
	    var value = $(this).val().toLowerCase();
	    $(".category-list div").filter(function() {
	      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
	    });
	});


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
        var newIn = '<div class="taxable-row row w-100">  <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price input-sm-height bg-voilet" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-tax-price input-sm-height bg-voilet" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price input-sm-height bg-voilet" required="required" type="text"> </div><i class="material-icons dp48 remove-texable-row">highlight_off</i><input name="taxable[]" value="1" hidden type="text"></div>'  
        var newInput = $(newIn);
        $(".texable-data").append(newInput);

    });

    $('#texable-data').on( 'click', 'i.remove-texable-row', function () {  
        //$(this).parent().remove();
        $(this).parent().fadeOut("slow", function() { $(this).remove(); });
    });
    $(".add-nontexable-field").click(function(e){
        e.preventDefault;
        var newIn = '<div class="non-taxable-row row w-100"> <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet" required="required" type="text"> </div> <i class="material-icons dp48 remove-nontexable-row">highlight_off</i><input name="taxable[]" value="0" hidden type="text"></div>'  
        var newInput = $(newIn);
        $(".non-texable-data").append(newInput);

    });

    $('#non-texable-data').on( 'click', 'i.remove-nontexable-row', function () {  
        //$(this).parent().remove();
        $(this).parent().fadeOut("slow", function() { $(this).remove(); });
    });

    $(".gst-add").click(function(e){
        e.preventDefault;
        $(".gst-div").toggleClass("hide");
        //basic Calc
        $(".basic-nontax-price").trigger( "focusout" );
        $(".total-taxable-basic").trigger( "change" );

        //Standard Plan
        $(".std-nontax-price").trigger( "focusout" );
        $(".total-taxable-std").trigger( "change" );

        //Premium Calc
        $(".pre-nontax-price").trigger( "focusout" );
        $(".total-taxable-pre").trigger( "change" );
    });

    $(".add-faq").click(function(e){
        e.preventDefault();
        var newIn = '<div class="md-form row w-100 border p-2 rounded my-1">';
        newIn +=        '<label class="col-md-2 p-3">Question</label>';
        newIn +=        '<input name="questions[]" value="" placeholder="question" class="form-control col-md-10" type="text"> '; 
        newIn +=        '<label class="col-md-2 p-3 ">Answer</label>';
        newIn +=        '<textarea name="answers[]" value="" placeholder="answer" class="form-control col-md-10 px-1" type="text"></textarea>';  
        newIn +=    '   <i class="material-icons dp48 row remove-faq py-2">highlight_off</i></div>';
        $(this).parent().prev().append(newIn);
    });

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
    
    $('.texable-data').on( 'focusout', '.basic-tax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.basic-tax-price').each(function() {
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-taxable-basic").val(basicTot);
        $(".basic-nontax-price").trigger( "focusout" );
        $(".total-taxable-basic").trigger( "change" );
    });

    $('.texable-data').on( 'focusout', '.std-tax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.std-tax-price').each(function() {
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
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
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-taxable-pre").val(basicTot);
        $(".pre-nontax-price").trigger( "focusout" );
        $(".total-taxable-pre").trigger( "change" );
    });
    
    $('.non-texable-data').on( 'focusout', '.basic-nontax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.basic-nontax-price').each(function() {
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
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
            if($( this ).val()==''){tmpVal=0;}
            basicTot= basicTot + parseInt (tmpVal);
          });
        $(".total-nontaxable-std").val(basicTot);
        $(".total-taxable-std").trigger( "change" );
    });

    $('.non-texable-data').on( 'focusout', '.pre-nontax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.pre-nontax-price').each(function() {
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
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
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        basicGst= tmptaxable * (18/100);
        if ($(".gst-div").hasClass("hide")) {
            basicGst=0;
        }
        $( ".gst_basic" ).val(basicGst);
        $(".basic_gst_total").val(tot + basicGst);
        $(".total_basic_amt").val(tot);
        $("._basic_plan_price").val(tot);

        commission=parseInt($('#_basic_commission').val());
        b_commssion_oprator=$('#b_commssion_oprator').val();
        b_commssion_add=parseInt($('#b_commssion_add').val());

        console.log(commission);
        var commissionAmt=0;
        if(commission!=0){
            commissionAmt= tmptaxable * (commission/100);
            console.log("b_commssion_oprator----->"+b_commssion_oprator);
            commissionAmt=eval(commissionAmt + b_commssion_oprator + b_commssion_add);
            console.log("commissionAmt----" + commissionAmt);
        }else{
            alert("Please Select a Service!!!")
        }
        $(".total_basic_fee").val(commissionAmt);

        $(".total_basic_tcs").val(tot/100);
        
        $(".total_basic_payable").val((tot + basicGst)-(commissionAmt+(tot/100)));
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

        var commissionAmt=0;
        if(commission!=0 && commission!=""){
            commissionAmt= tmptaxable * (commission/100);
            commissionAmt=eval(commissionAmt + s_commssion_oprator + s_commssion_add);
            console.log("commissionAmt----" + commissionAmt);
        }
        $(".total_std_fee").val(commissionAmt);

        $(".total_std_tcs").val(tot/100);
        
        $(".total_std_payable").val((tot + stdGst)-(commissionAmt+(tot/100)));

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
        if(commission!=0 && commission!=""){
            commissionAmt= tmptaxable * (commission/100);
            commissionAmt=eval(commissionAmt + p_commssion_oprator + p_commssion_add);
            console.log("commissionAmt----" + commissionAmt);
        }

        $(".total_pre_fee").val(commissionAmt);

        $(".total_pre_tcs").val(tot/100);
        
        $(".total_pre_payable").val((tot + preGst)-(commissionAmt+(tot/100)));
    });
    
    commission=parseInt($('#_basic_commission').val());
    if(commission!=0){
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
    }

});

$(document).ready(function(){

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    
    $(".next").click(function(){ 
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
    
    $(".profile-next").click(function(){ 
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        //Add Class Active
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
        
    });

    $('.radio-group .radio').click(function(){
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    
    $(".submit").click(function(){
        return false;
    })
    
});

