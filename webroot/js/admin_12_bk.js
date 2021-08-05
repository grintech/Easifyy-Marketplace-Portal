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
        var newIn = ' <div class="row " >';
        newIn +='<input name="heading[]" value="" placeholder="heading" class="form-control col-md-5 px-2 mx-2" type="text">'  
        newIn +='<input name="price[]" value="" placeholder="Price" class="form-control col-md-5 px-2 mx-2" type="text">'
        newIn +='<input name="type[]" hidden value="'+ myType +'" placeholder="Price" class="form-control col-md-1 px-2" type="text">'
        newIn +='<input name="taxable[]" hidden value="'+ istaxable +'" placeholder="Price" class="" type="text"><i class="material-icons dp48 remove-row">highlight_off</i></div>';
        var newInput = $(newIn);
        $(this).parent().prev().append(newInput);
    });

    $(".add-texable-field").click(function(e){
        e.preventDefault;
        var newIn = ' <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  </div>';
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-tax-price" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-tax-price" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-tax-price" required="required" type="text"> </div>'  
        var newInput = $(newIn);
        $(".texable-data").append(newInput);

    });
    $(".add-nontexable-field").click(function(e){
        e.preventDefault;
        var newIn = ' <div class="col-md-3"><input name="heading[]" value="" placeholder="Enter heading" class="form-control col-md-12" required="required" type="text">  </div>';
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 basic-nontax-price" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 std-nontax-price" required="required" type="text"> </div>'  
        newIn +='<div class="col-md-3 px-1"><input name="price[]" value="" placeholder="Enter Amount" class="form-control col-md-12 pre-nontax-price" required="required" type="text"> </div>'  
        var newInput = $(newIn);
        $(".non-texable-data").append(newInput);

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
        var tmptaxable=0; var tmpnontaxable=0; var tot=0; var basicGst=0;var commission=0;
        console.log('calculations for total basic Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        if($(".total-nontaxable-basic").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-basic").val();
        }
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        basicGst= tmptaxable * (18/100);
        $( ".gst_basic" ).val(basicGst);
        $(".basic_gst_total").val(tot + basicGst);
        $(".total_basic_amt").val(tot);
        $("._basic_plan_price").val(tot);

        commission=parseInt($('#_basic_commission').val());
        console.log(commission);
        var commissionAmt=0;
        if(commission!=0){
            commissionAmt= tmptaxable * (commission/100);
        }else{
            alert("Please Select a Service!!!")
        }
        $(".total_basic_fee").val(commissionAmt);

        $(".total_basic_tcs").val(tot/100);
        
        $(".total_basic_payable").val((tot + basicGst)-(commissionAmt+(tot/100)));
    });

    /* calculations for total standard Price */
    $( ".total-taxable-std" ).change(function() {
        var tmptaxable=0; var tmpnontaxable=0; var tot=0; var stdGst=0;var commission=0;
        console.log('calculations for total std Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        if($(".total-nontaxable-std").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-std").val();
        }
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        stdGst= tmptaxable * (18/100);
        $( ".gst_std" ).val(stdGst);
        $(".std_gst_total").val(tot + stdGst);
        $(".total_std_amt").val(tot);
        $("._standard_plan_price").val(tot);

        commission=parseInt($('#_standard_commission').val());
        var commissionAmt=0;
        if(commission!=0 && commission!=""){
            commissionAmt= tmptaxable * (commission/100);
        }
        $(".total_std_fee").val(commissionAmt);

        $(".total_std_tcs").val(tot/100);
        
        $(".total_std_payable").val((tot + stdGst)-(commissionAmt+(tot/100)));

    });

    /* calculations for total Premium Price */
    $( ".total-taxable-pre" ).change(function() {
        var tmptaxable=0; var tmpnontaxable=0; var tot=0;var preGst=0;var commission=0;
        console.log('calculations for total pre Price');
        if($( this ).val()==''){tmptaxable=0;}else {tmptaxable=$( this ).val();}
        if($(".total-nontaxable-pre").val()==''){
            tmpnontaxable=0;
        }else {
            tmpnontaxable=$(".total-nontaxable-pre").val();
        }
        tot= parseInt (tmptaxable)+ parseInt (tmpnontaxable);
        preGst= tmptaxable * (18/100);
        $( ".gst_pre" ).val(preGst);
        $(".pre_gst_total").val(tot + preGst);
        $(".total_pre_amt").val(tot);
        $("._premium_plan_price").val(tot);

        commission=parseInt($('#_premium_commission').val());
        var commissionAmt=0;
        if(commission!=0 && commission!=""){
            commissionAmt = tmptaxable * (commission/100);
        }

        $(".total_pre_fee").val(commissionAmt);

        $(".total_pre_tcs").val(tot/100);
        
        $(".total_pre_payable").val((tot + preGst)-(commissionAmt+(tot/100)));
    });
});

