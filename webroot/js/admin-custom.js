$(document).ready(function(){
console.log('Application Running !!!');
   accNo=$("#account-number").val();
    if(accNo!=""){
        $("#account-number-confirm").val(accNo)
    }

    $(".back-button").click(function(){
        console.log('backlog');
        window.history.back();
    });

    $(".savehomebanner").click(function(){
        var heading = $("#bannerHeading").val();
        var description = $("#bannerDescription").val();
        var imgurl =   $("#bannerfileImages").val();  

        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/saveBanner',
            data: {
                   heading: heading,
                   description:description,
                   imgurl:imgurl,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                location.reload();
            },
        }); 
    });

    $("#bannerfile").change(function(){
        var fd = new FormData();
        var files = $('#bannerfile')[0].files;
        var _csrfToken = csrfCustomerToken;
        // Check file selected or not
        $(".savehomebanner").attr("disabled","True");
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0 && response !="extension error"){
                    $(".savehomebanner").attr("disabled","false");
                    $(".savehomebanner").removeAttr("disabled");
                    if($("#bannerfileImages").val()!=""){

                        var preImg=$("#bannerfileImages").val();
                        $("#bannerfileImages").attr("value",preImg + "|" +response);
                    }else{
                        $("#bannerfileImages").attr("value",response);
                    } 
                    var img= '<div class ="col-md-3" ><span class="row justify-content-center"><i class="fa fa-close removebannerFile" imgURl="'+response+'"></i></span><img src="'+response+'" id="sub-heading-2-img" width="100" height="100"></div>'

                    $(".banner-preview").append(img); // Display image element
                 }else{
                    alert('file not Supported');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });
    $( document ).on("click" ,'.removeMainBannerFile',function(){
        var mySrc = $(this).attr('imgURl');
        console.log(mySrc);
        var str=$("#bannerfileImages").val();
        console.log(str);
        var res = str.replace(mySrc, "");
        console.log(res);
        $("#bannerfileImages").val(res);
        $(this).parent().parent().remove();
    });

    $(".saveworkdone").click(function(){
        var MainHeading = $("#workdoneMainHeading").val();
        var SubHeading = $("#workdoneSubHeading").val();
        //var description =   $('#workdonedescription').val();
        var imgurl =   $('#getworkdonefileImages').val();

        var workheadsubonehead = $('#workheadsubonehead').val();
        var workheadsubonedesc = $('#workheadsubonedesc').val();

        var workheadsubtwohead = $('#workheadsubtwohead').val();
        var workheadsubtwodesc = $('#workheadsubtwodesc').val();

        var workheadsubthreehead = $('#workheadsubthreehead').val();
        var workheadsubthreedesc = $('#workheadsubthreedesc').val();

        var workheadsubfourhead = $('#workheadsubfourhead').val();
        var workheadsubfourdesc = $('#workheadsubfourdesc').val();


        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/saveworkdone',
            data: {
                   MainHeading: MainHeading,
                   SubHeading:SubHeading,
                   // description:description,
                   workheadsubonehead:workheadsubonehead,
                   workheadsubonedesc:workheadsubonedesc,
                   workheadsubtwohead:workheadsubtwohead,
                   workheadsubtwodesc:workheadsubtwodesc,
                   workheadsubthreehead:workheadsubthreehead,
                   workheadsubthreedesc:workheadsubthreedesc,
                   workheadsubfourhead:workheadsubfourhead,
                   workheadsubfourdesc:workheadsubfourdesc,



                   imgsUrl:imgurl,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                //location.reload();
            },
        }); 
    });

    $(".sub-heading-file-upload").change(function(){
        var fd = new FormData();
        var myClassName= $(this).attr("previewImg"); 
        var files = $(this)[0].files;
        var _csrfToken = csrfCustomerToken;
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#"+myClassName).attr("src",response); 
                    $('.'+myClassName).val(response)
                    $(".affilate-preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });

    $(".howItWorksData").click(function(){
        var mainHeading = $("#mainHeading").val();
        var subHeading1 = $("#subHeading1").val();
        var subContainerHeading1 =   $('#subContainerHeading1').val();
        var subContainerDescription1 =   $('#subContainerDescription1').val();
        var subHeading2 =   $('#subHeading2').val();
        var subContainerHeading2 = $("#subContainerHeading2").val();
        var subContainerDescription2 = $("#subContainerDescription2").val();
        var subheading2img =   $('.sub-heading-2-img').val();
        var subHeading3 =   $('#subHeading3').val();
        var subContainerHeading3 = $("#subContainerHeading3").val();
        var subContainerDescription3 = $("#subContainerDescription3").val();
        var subheading3img =   $('.sub-heading-3-img').val();
        var subHeading4 =   $('#subHeading4').val();
        var subContainerHeading4 = $("#subContainerHeading4").val();
        var subContainerDescription4 = $("#subContainerDescription4").val();
        var subheading4img =   $('.sub-heading-4-img').val();

        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/howItWorksData',
            data: {
                    mainHeading: mainHeading,
                    subHeading1:subHeading1,
                    subContainerHeading1:subContainerHeading1,
                    subContainerDescription1:subContainerDescription1,
                    subHeading2:subHeading2,
                    subContainerHeading2:subContainerHeading2,
                    subContainerDescription2:subContainerDescription2,
                    subheading2img:subheading2img,
                    subHeading3:subHeading3,
                    subContainerHeading3:subContainerHeading3,
                    subContainerDescription3:subContainerDescription3,
                    subheading3img:subheading3img,
                    subHeading4:subHeading4,
                    subContainerHeading4:subContainerHeading4,
                    subContainerDescription4:subContainerDescription4,
                    subheading4img:subheading4img,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                //location.reload();
            },
        }); 
    });

    $("#affilatefile").change(function(){
        var fd = new FormData();
        var files = $('#affilatefile')[0].files;
        var _csrfToken = csrfCustomerToken;
        $(".affiliateData").attr("disabled","True");
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                $(".affiliateData").attr("disabled","false");
                $(".affiliateData").removeAttr("disabled");
                 if(response != 0){
                    $("#affliateImg").attr("src",response); 
                    $('.file-name').val(response)
                    $(".affilate-preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });

    $(".affiliateData").click(function(){
        var MainHeading = $("#affilateHeading").val();
        var SubHeading = $("#affilateTagLine").val();
        var description =   $('#affilateButtonLabel').val();
        var imgurl =   $('.file-name').val();

        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/affiliateData',
            data: {
                   MainHeading: MainHeading,
                   SubHeading:SubHeading,
                   description:description,
                   imgurl:imgurl,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                //location.reload();
            },
        }); 
    });

    $(".savetalent").click(function(){
        var talentHeading = $("#talentHeading").val();
        var talentButtonLabel = $("#talentButtonLabel").val();
        var talentButtonLink = $("#talentButtonLink").val();
        var imgurl =   $("#talentimg").attr("src");  

        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/saveTalent',
            data: {
                   talentHeading: talentHeading,
                   talentButtonLabel:talentButtonLabel,
                   talentButtonLink:talentButtonLink,
                   imgurl:imgurl,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                location.reload();
            },
        }); 
    });

    $(".savehomesections").click(function(){
        var description = CKEDITOR.instances['editor1'].getData();
        console.log('description',description);
        var _csrfToken = csrfCustomerToken;
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            type: "POST",
            url: myBaseUrl +'/superadmin/Users/savehomesections',
            data: {
                   description:description,
                },
            success: function (data, textStatus){
                console.log('finalData',data);
                alert('Data Saved');
                location.reload();
            },
        }); 
    });

    
    $("#file").change(function(){
        var fd = new FormData();
        var files = $('#file')[0].files;
        var _csrfToken = csrfCustomerToken;
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });
    

    $("#talentfile").change(function(){
        var fd = new FormData();
        var files = $('#talentfile')[0].files;
        $(".savetalent").attr("disabled","True");

        var _csrfToken = csrfCustomerToken;
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                  
                $(".savetalent").attr("disabled","false");
                $(".savetalent").removeAttr("disabled");
                
                 if(response != 0){

                    $("#talentimg").attr("src",response); 
                    $(".talentpreview img").show(); // Display image element
                 }else{
                    alert('file not uploaded');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });
    $( document ).on("click" ,'.removebannerFile',function(){
        console.log('in uploadProjectDoc');
        var mySrc = $(this).attr('imgURl');
        console.log(mySrc);
        var str=$("#getworkdonefileImages").val();
        console.log(str);
        var res = str.replace(mySrc, "");
        console.log(res);
        $("#getworkdonefileImages").val(res);
        $(this).parent().parent().remove();
    });
    $("#workdonefile").change(function(){
        var fd = new FormData();
        var files = $('#workdonefile')[0].files;
        $(".saveworkdone").attr("disabled","True");
        var _csrfToken = csrfCustomerToken;
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
            $.ajax({
               headers: {
                'X-CSRF-Token': _csrfToken
                },
              url: myBaseUrl +'/superadmin/Users/saveBannerImage',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                $(".saveworkdone").attr("disabled","false");
                $(".saveworkdone").removeAttr("disabled");
                 if(response != 0 && response !="extension error"){
                    if($("#getworkdonefileImages").val()!=""){
                        var preImg=$("#getworkdonefileImages").val();
                        $("#getworkdonefileImages").attr("value",preImg + "|" +response);
                    }else{
                        $("#getworkdonefileImages").attr("value",response);
                    } 
                    var img= '<div class ="col-md-3" ><span class="row justify-content-center"><i class="fa fa-close removebannerFile" imgURl="'+response+'"></i></span><img src="'+response+'" id="sub-heading-2-img" width="100" height="100"></div>'

                    $(".workdone-preview").append(img); // Display image element
                 }else{
                    alert('file not Supported');
                 }
              },
           });
        } else {
           alert("Please select a file.");
        }
    });

    $(".leverstatus").click(function(){
    	var id = $(this).attr('data-id');
    	var mid = $(this).attr('data-mid');
    	var status='1';
    	setTimeout(function(){
  			var _csrfToken =$('#_csrfToken').val();
  			console.log('_csrfToken',_csrfToken);
  			if($("#merchant-status-"+id).prop('checked') == true){
			    status = 1;
			} else {
				status = 0;
			}
			console.log('data',status);
			jQuery.ajax({
				headers: {
			        'X-CSRF-Token': _csrfToken
			    },
                type: "POST",
                url: myBaseUrl +'superadmin/merchants/disableMerchant',
                data: {
                      status: status,
                      mid:mid,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    if(data=='Saved') {
                    	if(status == 0) {
                    		$('#badge-'+id).removeClass('badge-success');
                    		$('#badge-'+id).addClass('badge-danger');
                    		$('#badge-'+id).text('InActive');
                    	} else {
                    		$('#badge-'+id).addClass('badge-success');
                    		$('#badge-'+id).removeClass('badge-danger');
                    		$('#badge-'+id).text('Active');
                    	}
                    } else {
                    	alert('Error!!! Pleas try again');
                    }	
                },
            });	
		}, 2000);
    		
    });

    $(".leveruser").click(function(){
    	var id = $(this).attr('data-id');
    	var mid = $(this).attr('data-mid');
    	var status='1';
    	setTimeout(function(){
  			var _csrfToken =$('#_csrfToken').val();
  			console.log('_csrfToken',_csrfToken);
  			if($("#merchant-userstatus-"+id).prop('checked') == true){
			    status = 1;
			} else {
				status = 0;
			}
			console.log('data',status);
			jQuery.ajax({
				headers: {
			        'X-CSRF-Token': _csrfToken
			    },
                type: "POST",
                url: myBaseUrl +'superadmin/merchants/disableuserMerchant',
                data: {
                      status: status,
                      mid:mid,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    if(data=='Saved') {
                    	if(status == 0) {
                    		$('#ubadge-'+id).removeClass('badge-success');
                    		$('#ubadge-'+id).addClass('badge-danger');
                    		$('#ubadge-'+id).text('InActive');
                    	} else {
                    		$('#ubadge-'+id).addClass('badge-success');
                    		$('#ubadge-'+id).removeClass('badge-danger');
                    		$('#ubadge-'+id).text('Active');
                    	}
                    } else {
                    	alert('Error!!! Pleas try again');
                    }	
                },
            });	
		}, 2000);
    		
    });

    $(".showNotification").click(function(){

        if($(".notificationDiv").hasClass('show')){
            $(".notificationDiv").removeClass('show');
        }else{
            $(".notificationDiv").addClass('show');
        }
    });
    $(".pspradio").click(function(){
        var value = $(this).val();
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/superadmin/orders/disablePSP',
                data: {
                      status: value,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    alert('Settings Updated');
                    location.reload();
                },
            }); 
        }, 2000);
            
    });


    $(".release-payment").click(function(){
        var value = $(this).attr('id');
        var datavalue = $(this).attr('data-id');
        // alert(datavalue);
        $("#submitloader"+datavalue).css("display", "inline-block");
        var paymentReply =$('.PaymentReply-'+datavalue).val();
        setTimeout(function(){
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': csrfCustomerToken
                },
                type: "POST",
                url: myBaseUrl +'/superadmin/orders/paymentsPSP',
                data: {
                      status: value,
                      id:datavalue,
                      paymentReply:paymentReply,
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    alert('Confirmation Sent to PSP');
                    $("#submitloader"+datavalue).css("display", "none");
                    location.reload();
                },
            }); 
        }, 2000);
    });

    // Superadmin generates PDF to Customer
    $("#generateinvoicetocustomer").click(function(){
        //alert('Superadmin to Customer');
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        var transactionFee = $("#transactionFee").val();
        var serviceFee = $("#serviceFee").val();
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/superadmin/orders/sendInvoicePDFCustomer',
                data: {
                      status: value,
                      transactionFee:transactionFee,
                      serviceFee:serviceFee
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
                    $('#sendInvoice').attr("data-type","customer");
                    //$('#exampleModal').modal('show'); 
                    var s1 = data;
                    var s2 = s1.substring(1);
                    //$('.pdf-Modal').attr("src","https://easifyy.com/pdf/"+s2);
                    $('.pdf-Modal').attr("src","/pdf/"+s2);
                    $('.pdf-download').attr("href","https://easifyy.com/pdf/"+s2)
                    //alert('Invoice Sent to PSP and your admin email');
                    //location.reload();
                },
            }); 
        }, 2000);
    });

    // Superadmin generates pdf to PSP
    $("#generateinvoice").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        var transactionFee = $("#transactionFee").val();
        var serviceFee = $("#serviceFee").val();
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/superadmin/orders/sendInvoicePDF',
                data: {
                      status: value,
                      transactionFee:transactionFee,
                      serviceFee:serviceFee
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
                    $('#sendInvoice').attr("data-type","psp");
                    //$('#exampleModal').modal('show'); 
                    var s1 = data;
                    var s2 = s1.substring(1);
                    $('.pdf-Modal').attr("src","https://easifyy.com/pdf/"+s2);
                    $('.pdf-download').attr("href","https://easifyy.com/pdf/"+s2)
                    //alert('Invoice Sent to PSP and your admin email');
                    //location.reload();
                },
            }); 
        }, 2000);
            
    });
    $(".pdf-download").click(function(){
        console.log("pdf-download");
        $("#sendInvoice").removeClass("hide");
    });
    $("#sendInvoice").click(function(){
        $('.spinner-wrap').css("display","block");
        //var value $(this).attr("value");
        var value = $(this).attr('data-value');
        var sendtype = $(this).attr('data-type');
        if(sendtype=='psp') {
            console.log('psp type');
            var callfunction= 'sendInvoicePDFtoPSP';
        } else {
            console.log('customer type');
            var callfunction= 'sendInvoicePDFtoCustomer';
        }
        var transactionFee = $("#transactionFee").val();
        var serviceFee = $("#serviceFee").val();
        //alert(value);
        setTimeout(function(){
            var _csrfToken =$('#_csrfToken').val();
                jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                type: "POST",
                url: myBaseUrl +'/superadmin/orders/'+callfunction,
                data: {
                      status: value,
                      transactionFee:transactionFee,
                      serviceFee:serviceFee
                    },
                success: function (data, textStatus){
                    console.log('finalData',data);
                    alert('Invoice Sent to PSP and your admin email');
                    location.reload();
                },
            }); 
        }, 2000);
            
    });

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
        // var imgVal = $("input[name=govt_Id]").val()
        // if(imgVal=='') {
        //     alert("Please Upload Govt. ID");
        //     return false;
        // }
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
    

    $( document ).on( "change", ".uploadProjectDoc", function() {
        console.log('in uploadProjectDoc');
        var dataimg=$(this)[0].files;
        //console.log(dataimg);
        var _csrfToken = $('input[name ="_csrfToken"]').val();   //$('#_csrfToken').val();
        //console.log(_csrfToken);
        data = new FormData();
        
        $.each(dataimg, function(i, obj) {
            //console.log(obj);
            data.append('file['+i+']', obj);
        });

        //data.append('file', $(this)[0].files[0]);

        $.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            url: myBaseUrl +'admin/orders/uploadprojectdocs',
            //data: dataimg,
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false ,  // tell jQuery not to set contentType
            success: function(data) {
                console.log(data);
                //$("#project_files").val(data);
                var preData=$("#project_files").val();
                if(preData!=""){
                    var obj1 = data;
                    //preData = obj.concat(obj1);
                    $("#project_files").val(preData+"|"+data);
                    console.log('postdata'+preData);
                }else{
                    $("#project_files").val(data);
                }
                /*console.log('predata'+preData);
                preData = preData.concat(data);
                var preData=$("#project_files").val(preData);
                console.log('postdata'+preData);*/
                //var obj = jQuery.parseJSON(data );
                var fieldcount = parseInt($('.field-count').val())+1;
                $('.field-count').val(fieldcount);
                var el="";
                var res = data.split("|");
                $.each(res, function( index, value ) {
                    console.log('1');
                    console.log(el);
                    fieldcount=fieldcount+1
                    // if(el==""){
                        // fieldcount=fieldcount+1
                        // el= "<div class='col-md-6 file-div-"+fieldcount+"'><iframe border='0' class='iframe-"+fieldcount+"' file-name='"+value+"' src='https://easifyy.com/order_docs/"+value +"'></iframe><span class='row justify-content-center'><i class='fa fa-close removeFile' file-id='"+fieldcount+"'></i></span></div>";
                    // }else{
                    //     el=el + "<iframe src='https://easifyy.com/order_docs/"+value +"'></iframe>";
                    // }

                    if(el=="") {
                        el = "<div class='content' id='content_"+fieldcount+"' ><img src='https://easifyy.com/order_docs/"+value +"' width='100' id='"+value+"' height='100'><span style='cursor:pointer;' class='delete' id='delete_"+fieldcount+"'>Delete</span></div>";
                    } else {
                        el=el + "<div class='content' id='content_"+fieldcount+"' ><img src='https://easifyy.com/order_docs/"+value +"' width='100' id='"+value+"' height='100'><span style='cursor:pointer;' class='delete' id='delete_"+fieldcount+"'>Delete</span></div>";
                    }
                });   
                $(".docs-preview").append(el);      
            }
        });
    });

    // Remove file
    $( document ).on( "click", ".delete", function() {
    
        var id = this.id;
        var split_id = id.split('_');
        var num = split_id[1];
        var _csrfToken = $('input[name ="_csrfToken"]').val();   //$('#_csrfToken').val();
        
        // Get image source
        var imgElement_src = $( '#content_'+num+' img' ).attr("id");
        var deleteFile = confirm("Do you really want to Delete?");

        if (deleteFile == true) {
            // AJAX request
            $.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                url: myBaseUrl +'admin/orders/removeprojectdocs',
                type: "POST",
                data: {path: imgElement_src},
                success: function(data) {
                    $('#content_'+num).remove();          
                }
            });
            
        } 
    }); 

    $( document ).on( "change", ".uploadNotesDoc", function() {
        var dataimg=$(this)[0].files[0];
        //console.log(dataimg);
        var _csrfToken =$('#_csrfToken').val();
        $(this).parent().next().children().attr("disabled", true);
        data = new FormData();
        data.append('file', $(this)[0].files[0]);

        $.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            url: myBaseUrl +'admin/orders/uploaddoc',
            //data: dataimg,
            type: "POST",
            data: data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false ,  // tell jQuery not to set contentType
            success: function(data) {
                //console.log(data);
                $(this).parent().next().children().attr("disabled", false);	
                $(this).parent().next().children().removeAttr("disabled");
                $(".save-notes").removeAttr("disabled");
                $("#_doc_name").val(data);

            }
        });
    });

    $( document ).on( "click", ".save-notes", function() {
        $(this).attr("disabled", true);
        var status = $(this).closest("div.field_wrappers").find("#status").val();
        var comment = $(this).closest("div.field_wrappers").find("textarea#comment").val();
        if(comment === ''){ 
            alert('Please add Reply');
            $(this).attr("disabled", false);	
        } else {
            var _csrfToken =$('#_csrfToken').val();
            var _user_id =$("#_user_id").val();
            var _order_id =$("#_order_id").val();
            var _doc_name =$("#_doc_name").val();
            
            jQuery.ajax({
                headers: {
                    'X-CSRF-Token': _csrfToken
                },
                dataType: "html",
                type: "POST",
                evalScripts: true,
                url: myBaseUrl +'admin/orders/ordernotes',
                data: {
                        status: status,
                        comment: comment,
                        order_id:_order_id,
                        user_id:_user_id,
                        doc_name:_doc_name,
                    },
                success: function (data, textStatus){
                    $(this).attr("disabled", false);	
                    $(this).removeAttr("disabled");
                    if(textStatus=='success') {
                            $(this).closest("div.field_wrappers").find("#status").val('');
                            $(this).closest("div.field_wrappers").find("textarea#comment").val('');
                            $(".alert-success").css({"display": "block"}); 
                            setTimeout(function(){
                            $(".alert-success").css({"display": "none"}); 
                            location.reload();
                            }, 2000);
                    } else {
                            $(".alert-danger").css({"display": "block"}); 
                            setTimeout(function(){
                            $(".alert-danger").css({"display": "none"}); 
                            }, 2000);
                    }
                },
            });
        }
    });

    //Save payment reuest on admin notes page
    $( document ).on( "click", ".btn-request-payment", function() {
        var dataid = $(this).attr('data-id');
        $('.spinner-wrap').css("display","block");
        var prefix = $("#prefix").val();
        var amount = $("#amount").val();
        var _csrfToken =$('#_csrfToken').val();
        var _user_id =$("#_user_id").val();
        var _order_id =$("#_order_id").val();
        
        jQuery.ajax({
            headers: {
                'X-CSRF-Token': _csrfToken
            },
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'admin/orders/superadminnotes',
            data: {
                      prefix: prefix,
                      amount: amount,
                      order_id:_order_id,
                      user_id:_user_id,
                      dataid:dataid
                   },
            success: function (data, textStatus){
               if(textStatus=='success') {
                    $(".alert-success").css({"display": "block"}); 
                    setTimeout(function(){
                      $(".alert-success").css({"display": "none"}); 
                      location.reload();
                    }, 2000);
               } else {
                    $(".alert-danger").css({"display": "block"}); 
                    setTimeout(function(){
                      $(".alert-danger").css({"display": "none"}); 
                    }, 2000);
               }
               $('.spinner-wrap').css("display","none");
            },
        });
    });


    //Triger checkbox on admin order notes fields
    $( document ).on( "click", ".form-check-input", function() {
          var id = $(this).attr('data-note');
          if ($(this).is(":checked")) {
              $(".request-payment-"+id).show();
          } else {
              $(".request-payment-"+id).hide();
          }
    });

    //Adding multiple fields in Admin order notes pages
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        var fieldcount = parseInt($('.field-count').val())+1; //New input field html r
        var fieldHTML = '<form name="userNotes" id="userNotes" enctype="multipart/form-data" ><div class="field_wrappers"> <div class="row main-row"> <div class="col-md-12"> <h4 class="stp">STEP '+fieldcount+'</h4> <input type="hidden" name="notecount" id="notecount-'+fieldcount+'" class="notecount" > </div></div><div class="row"> <div class="input-field col s4"><input id="status" name="status" type="text" class="" value="STEP '+fieldcount+'" readonly> </div><div class="col s4 card-t-area input-field"> <textarea id="comment" name="comment" placeholder="Write your requirements to Customer" cols="30" rows="10"></textarea> </div><div class="col s4 attache-file input-field"> <label><i class="fa fa-paperclip" aria-hidden="true"></i></label> <input type="file" name="notesFile" class="notesFile uploadNotesDoc"> </div><div class="col 4 card-t-area input-field"> <a class="btn btn-view-profile save-notes">Submit</a><input type="hidden" value="1" class="field-count"> </div></div></div></form>'; //New input field html
        $(wrapper).append(fieldHTML); //Add field html
        $('.field-count').val(fieldcount);
        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
    });

    $('.remove_button').click(function(){
        var totalcount = parseInt($('.total-count').val()); 
        var fieldcount = parseInt($('.field-count').val()); //New input field html r
        if(fieldcount > totalcount) {
            $(".field_wrappers").last().remove();
            var fieldcount = parseInt($('.field-count').val())-1; //New input field html r
            $('.field-count').val(fieldcount);
            $("html, body").animate({ scrollTop: $(document).height() }, 1000);    
        }
    });

	if( jQuery( "#report-start-date" ).length > 0 ) jQuery( "#report-start-date" ).datepicker({ dateFormat: "yy-mm-dd", placeholder: 'Start date' });
    if( jQuery( "#report-end-date" ).length > 0 ) jQuery( "#report-end-date" ).datepicker({ dateFormat: "yy-mm-dd" });
    //Upload Multiple Images
    jQuery("#uplaod_images").click(function() {
        var gallery =jQuery("#product-gallery").val();
        jQuery.ajax({
            dataType: "html",
            type: "POST",
            evalScripts: true,
            url: myBaseUrl +'Users/upload_merchant_gallary',
            data: {
                      gallery: gallery,
                   },
            success: function (data, textStatus){
               location.reload();
            },
        });
    });
    //Remove Gallary Images

    jQuery('.modal').modal();

    jQuery(".edit-gallary").click(function() {
        var id = $(this).attr('id');
        if (confirm("Are you sure for deleting the image!")) {
            jQuery.ajax({
                dataType:   "html",
                type: "POST",
                evalScripts: true,
                url: myBaseUrl +'Users/delete_gallary_image',
                data: {
                          id: id,
                       },
                success: function (data, textStatus){
                   location.reload();
                },
            });
        }
        
    });
    
    jQuery(".category-listing li.parent-checkbox").each(function(){
        var current = jQuery(this);
        if( current.attr('data-order') ) {
            jQuery(".category-listing").prepend(current);
        }
    });

    jQuery('.sub-cat').click(function(){
        var current = jQuery(this);
        if( current.is(":checked") ) {
            current.closest('.parent-checkbox').find('.main-cat').prop("checked", true);
        }
    });

    /*$(".hide-card").click(function(e){
        e.preventDefault();
        $(this).parent().next().hide("slow");
        $(this).prev().show("slow");
        $(this).hide("slow");
    });

    $(".show-card").click(function(e){
        e.preventDefault();
        $(this).parent().next().show("slow");
        $(this).next().show("slow");
        $(this).hide("slow");
    });*/

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

    $(".add-faq").click(function(e){
        e.preventDefault();
        var newIn = '<div class="md-form row w-100 border p-2 rounded my-1">';
        newIn +=        '<label class="col-md-2 p-1">Reviewer Name</label>';
        newIn +=        '<input name="questions[]" value="" placeholder="question" class="form-control col-md-10" type="text"> '; 
        newIn +=        '<label class="col-md-2 p-3 ">Answer</label>';
        newIn +=        '<textarea name="answers[]" value="" placeholder="answer" class="form-control col-md-10 px-1" type="text"></textarea>';  
        newIn +=    '   <i class="material-icons dp48 row remove-faq py-2">highlight_off</i></div>';
        $(this).parent().prev().append(newIn);
    });

    $(".add-review").click(function(e){
        e.preventDefault();
        var newIn = '<div class="md-form row w-100 border p-2 rounded my-1">';
        newIn +=        '<label class="col-md-2 p-3">Reviewer Name</label>';
        newIn +=        '<input name="reviewer_name[]" value="" placeholder="Reviewer Name" class="form-control col-md-9 " type="text"> '; 
        newIn +=        '<label class="col-md-2 p-1 px-1">Review Text </label>';
        newIn +=        '<textarea name="review_text[]" value="" placeholder="Review Text" class="form-control col-md-9 px-1" type="text"></textarea>';  
        newIn +=    '   <label class="col-md-2 p-1 px-1" for="Stars">Review Star (between 1 and 5):</label>';
        newIn +=    '   <input class="form-control col-md-9 px-1" type="number" id="rating" name="rating[]" min="1" max="5" value="">';
        newIn +=    '   <i class="material-icons dp48 row remove-review py-2">highlight_off</i></div>';
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

    $('#review-section').on( 'click', 'i.remove-review', function () {  
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

    /*$('#_basic_price_desc').focus(function(){
        var pPrice=0;
        //console.log('dd');
        //$(this).css("background-color", "#2e2e2e");
        //console.log($("input[name='price[]']").val());
        $(".basic-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        console.log(pPrice);
        var bPlanPrice=parseInt($("#_basic_plan_price").val());
        console.log(bPlanPrice);
        if(bPlanPrice!=pPrice){
            console.log("Please check Inputs!!!!!!!!");
        }
    });*/
    $(".basic-plan-calc input[name='price[]']:last").focusout(function(){
        var pPrice=0;
        //console.log('dd');
        //$(this).css("background-color", "#2e2e2e");
        //console.log($("input[name='price[]']").val());
        $(".basic-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        //console.log(pPrice);
        var bPlanPrice=parseInt($("#_basic_plan_price").val());
        //console.log(bPlanPrice);
        var pPrice=parseInt(pPrice);
        if(bPlanPrice < pPrice){
            alert("Plan is less than total amount entered by " + (pPrice - bPlanPrice));
        }else if(bPlanPrice > pPrice){
            alert("total amount is less than Plan Price entered by " + (bPlanPrice - pPrice));
        }else if(bPlanPrice != pPrice){
            alert("Please check Inputs again !!");
        }
        
    });
    /* Calulations for Basic Plan*/
    $('#_basic_price_desc').focus( function () {  
        var pPrice=0;
        $(".basic-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_basic_plan_price").val(pPrice);
    });
    $('#_basic_plan_price').focus( function () {  
        var pPrice=0;
        $(".basic-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_basic_plan_price").val(pPrice);
    });

    //Calculations for booking amount can't be greater than plan Amount 
    $("._basic_booking_price").focusout(function(){
        //console.log($('._basic_price').val() +'----'+ $(this).val())
        if(parseInt($('._basic_plan_price').val()) < parseInt($(this).val())){
            alert("Booking Amount can't be greater than Plan Amount!");
            $(this).val("");
        }
    });
    $("._standard_booking_price").focusout(function(){
        //console.log($('._basic_price').val() +'----'+ $(this).val())
        if(parseInt($('#_standard_plan_price').val()) < parseInt($(this).val())){
            alert("Booking Amount can't be greater than Plan Amount!");
            $(this).val("");
        }
    });
    $("._premium_booking_price").focusout(function(){
        //console.log($('._basic_price').val() +'----'+ $(this).val())
        if(parseInt($('#_premium_plan_price').val()) < parseInt($(this).val())){
            alert("Booking Amount can't be greater than Plan Amount!");
            $(this).val("");
        }
    });
    //Calculations end for booking amount can't be greater than plan Amount 


    /* Calulations for standard Plan*/
    $('#_standard_plan_price').focus( function () {  
        var pPrice=0;
        $(".std-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_standard_plan_price").val(pPrice);
    });
    $('#_standard_price_desc').focus( function () {  
        var pPrice=0;
        $(".std-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_standard_plan_price").val(pPrice);
    });

    /* Calulations for Premium Plan*/
    $('#_premium_plan_price').focus( function () {  
        var pPrice=0;
        $(".pre-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_premium_plan_price").val(pPrice);
    });
    $('#_premium_price_desc').focus( function () {  
        var pPrice=0;
        $(".pre-plan-calc input[name='price[]'").each(function() {
            if(!isNaN(parseInt(this.value))) {
                pPrice=pPrice + parseInt(this.value);
            }
        });
        var pPrice=parseInt(pPrice);
        $("#_premium_plan_price").val(pPrice);
    });

    $('.texable-data').on( 'focusout', '.basic-tax-price', function () {  
        var basicTot=0;
        var tmpVal=0;
        $('.basic-tax-price').each(function() {
            tmpVal=$( this ).val();
            if($( this ).val()==''){tmpVal=0;}
            basicTot= basicTot + parseInt (tmpVal);
            console.log("in basic-tax-price focusout ");
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
        console.log("commission amount : "+commission);
        var commissionAmt=0;
        if(commission!=0){
            commissionAmt= tmptaxable * (commission/100);
        }else{
            //alert("Please Select a Service!!!")
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

    commission=parseInt($('#_basic_commission').val());
    if(commission!=0){
        $(".basic-tax-price").trigger( "focusout" );
        $(".std-tax-price").trigger( "focusout" );
        $(".pre-tax-price").trigger( "focusout" );
    }
    $('.doc-modal').click(function(e){
        e.preventDefault();
        console.log("s");
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
    });


    /*var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        document.getElementById("myModal").style.display = "none";
    }*/

    $(".selectMerchant").click(function(e){
        var id = $(this).attr('name');
        var merchants = [];
        
        if($(".inviteforServicePSP").val()!=""){
            var merchants=$(".inviteforServicePSP").val();
            merchants = JSON.parse(merchants);
        }

        var index = merchants.indexOf(id);
        if (index > -1) {
            merchants.splice(index, 1);
        }else{
            merchants.push(id);
        }
        $(".inviteforServicePSP").val(JSON.stringify(merchants));
    });

    $(".selectAllMerchant").click(function(e){
        var merchants = [];
        if($(this).is(":checked")){
            //console.log( merchants );
            $(".selectMerchant" ).each(function( index ) {
                var id = $(this).attr('name');
                merchants.push(id) ;
            });
            $('.selectMerchant').prop('checked', true);
            $(".inviteforServicePSP").val(JSON.stringify(merchants));
        }else{
            $('.selectMerchant').prop('checked', false);
            $(".inviteforServicePSP").val("");
        }
    });
    // send Inivitation to PSP Against Particular Order
    $(".sendInvitetoPSP").click(function(e){
        e.preventDefault();
        var orderId=$(".orderId").val();
        var merchants=$(".inviteforServicePSP").val();
        console.log('merchants',merchants);
        if(merchants== '') {
            alert('Please Select at least one PSP');
        } else {
            $(".spinner-border").css("visibility","visible");
            jQuery.ajax({
                type: "POST",
                url: myBaseUrl +'superadmin/Orders/send-invites',
                headers: {
                    'X-CSRF-Token': csrfCustomerToken
                },
                data: {
                    orderId: orderId,
                    merchants: merchants
                },
                success: function (data, textStatus){
                    $(".spinner-border").css("visibility","hidden");
                    alert('Invitation Send Successfully');
                    location.reload();
                },
            });
        }

    });
});

