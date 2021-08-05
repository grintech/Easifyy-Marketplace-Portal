/*================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 5.0
  Author: PIXINVENT
  Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================*/
var myBaseUrl='https://easifyy.com/';
$(function() {
   "use strict";

   // Init collapsible
   $(".collapsible").collapsible({
      accordion: true,
      onOpenStart: function() {
         // Removed open class first and add open at collapsible active
         $(".collapsible > li.open").removeClass("open");
         setTimeout(function() {
            $("#slide-out > li.active > a")
               .parent()
               .addClass("open");
         }, 10);
      }
   });

   // Add open class on init
   $("#slide-out > li.active > a")
      .parent()
      .addClass("open");

   // Open active menu for multi level
   if ($("li.active .collapsible-sub .collapsible").find("a.active").length > 0) {
      $("li.active .collapsible-sub .collapsible")
         .find("a.active")
         .closest("div.collapsible-body")
         .show();
      $("li.active .collapsible-sub .collapsible")
         .find("a.active")
         .closest("div.collapsible-body")
         .closest("li")
         .addClass("active");
   }

   // Auto Scroll menu to the active item
   var position;
   if (
      $(".sidenav-main li a.active")
         .parent("li.active")
         .parent("ul.collapsible-sub").length > 0
   ) {
      position = $(".sidenav-main li a.active")
         .parent("li.active")
         .parent("ul.collapsible-sub")
         .position();
   } else {
      position = $(".sidenav-main li a.active")
         .parent("li.active")
         .position();
   }
   setTimeout(function() {
      if (position !== undefined) {
         $(".sidenav-main ul")
            .stop()
            .animate({ scrollTop: position.top - 300 }, 300);
      }
   }, 300);

   // Collapsible navigation menu
   $(".nav-collapsible .navbar-toggler").click(function() {
      // Toggle navigation expan and collapse on radio click
      if ($(".sidenav-main").hasClass("nav-expanded") && !$(".sidenav-main").hasClass("nav-lock")) {
         $(".sidenav-main").toggleClass("nav-expanded");
         $("#main").toggleClass("main-full");
      } else {
         $("#main").toggleClass("main-full");
      }
      // Set navigation lock / unlock with radio icon
      if (
         $(this)
            .children()
            .text() == "radio_button_unchecked"
      ) {
         $(this)
            .children()
            .text("radio_button_checked");
         $(".sidenav-main").addClass("nav-lock");
         $(".navbar .nav-collapsible").addClass("sideNav-lock");
      } else {
         $(this)
            .children()
            .text("radio_button_unchecked");
         $(".sidenav-main").removeClass("nav-lock");
         $(".navbar .nav-collapsible").removeClass("sideNav-lock");
      }
   });

   // Expand navigation on mouseenter event
   $(".sidenav-main.nav-collapsible, .navbar .brand-sidebar").mouseenter(function() {
      if (!$(".sidenav-main.nav-collapsible").hasClass("nav-lock")) {
         $(".sidenav-main.nav-collapsible, .navbar .nav-collapsible")
            .addClass("nav-expanded")
            .removeClass("nav-collapsed");
         $("#slide-out > li.close > a")
            .parent()
            .addClass("open")
            .removeClass("close");

         setTimeout(function() {
            // Open only if collapsible have the children
            if ($(".collapsible .open").children().length > 1) {
               $(".collapsible").collapsible("open", $(".collapsible .open").index());
            }
         }, 100);
      }
   });

   // Collapse navigation on mouseleave event
   $(".sidenav-main.nav-collapsible, .navbar .brand-sidebar").mouseleave(function() {
      if (!$(".sidenav-main.nav-collapsible").hasClass("nav-lock")) {
         var openLength = $(".collapsible .open").children().length;
         $(".sidenav-main.nav-collapsible, .navbar .nav-collapsible")
            .addClass("nav-collapsed")
            .removeClass("nav-expanded");
         $("#slide-out > li.open > a")
            .parent()
            .addClass("close")
            .removeClass("open");
         setTimeout(function() {
            // Open only if collapsible have the children
            if (openLength > 1) {
               $(".collapsible").collapsible("close", $(".collapsible .close").index());
            }
         }, 100);
      }
   });

   // Search class for focus
   $(".header-search-input")
      .focus(function() {
         $(this)
            .parent("div")
            .addClass("header-search-wrapper-focus");
      })
      .blur(function() {
         $(this)
            .parent("div")
            .removeClass("header-search-wrapper-focus");
      });

   //Search box form small screen
   $(".search-button").click(function(e) {
      if ($(".search-sm").is(":hidden")) {
         $(".search-sm").show();
         $(".search-box-sm").focus();
      } else {
         $(".search-sm").hide();
         $(".search-box-sm").val("");
      }
   });
   $(".search-sm-close").click(function(e) {
      $(".search-sm").hide();
      $(".search-box-sm").val("");
   });

   //Breadcrumbs with image
   if ($("#breadcrumbs-wrapper").attr("data-image")) {
      var imageUrl = $("#breadcrumbs-wrapper").attr("data-image");
      $("#breadcrumbs-wrapper").addClass("breadcrumbs-bg-image");
      $("#breadcrumbs-wrapper").css("background-image", "url(" + imageUrl + ")");
   }

   // Check first if any of the task is checked
   $("#task-card input:checkbox").each(function() {
      checkbox_check(this);
   });

   // Task check box
   $("#task-card input:checkbox").change(function() {
      checkbox_check(this);
   });

   // Check Uncheck function
   function checkbox_check(el) {
      if (!$(el).is(":checked")) {
         $(el)
            .next()
            .css("text-decoration", "none"); // or addClass
      } else {
         $(el)
            .next()
            .css("text-decoration", "line-through"); //or addClass
      }
   }

   //Init tabs
   $(".tabs").tabs();

   // Swipeable Tabs Demo Init
   if ($("#tabs-swipe-demo").length) {
      $("#tabs-swipe-demo").tabs({
         swipeable: true
      });
   }

   // Plugin initialization

   $("select").formSelect();
   //myBaseUrl='http://localhost/marketplace/';
   console.log(myBaseUrl);
   var state_select_box = $('#states').formSelect();
   state_select_box.on('change',function() {
        console.log('test');
        $.ajax({
            url: myBaseUrl + 'base/getcities/' + jQuery(this).val(),
            cache: false,
            type: 'get',
             headers: {
                'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
                $('#city-id').html(data);
                $('#city-id').formSelect();
            }
        });
    });

   /*var state_select_box = $('#city-id').formSelect();
   state_select_box.on('change',function() {
      //console.log('City Id : '+jQuery(this).val());
      $.ajax({
            url: myBaseUrl + 'base/getStateId/' + jQuery(this).val(),
            cache: false,
            type: 'get',
            headers: {
               'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
               //$('#city-id').html(data);
               //$('#city-id').formSelect();
               console.log('State Id : '+ data);
               $('#' + data).prop('selected', true);
            }
      });
   });*/

   var cate_select_box = $('#category_id').formSelect();
   cate_select_box.on('change',function() {
      $.ajax({
            url: myBaseUrl + 'base/getSubCate/' + jQuery(this).val(),
            cache: false,
            type: 'get',
            headers: {
               'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
               $('#Subcategory_id').html(data);
               $('#Subcategory_id').formSelect();
            }
      });
   });

   var subcate_select_box = $('#Subcategory_id').formSelect();
   subcate_select_box.on('change',function() {
      $.ajax({
            url: myBaseUrl + 'base/getServices/' + jQuery(this).val(),
            cache: false,
            type: 'get',
            headers: {
               'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
               $('#title').html(data);
               $('#title').formSelect();
            }
      });
   });

   var title_select_box = $('#title').formSelect();
   title_select_box.on('change',function() {
      $.ajax({
            url: myBaseUrl + 'base/getDescription/' + jQuery(this).val(),
            cache: false,
            type: 'get',
            headers: {
               'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
               //console.log(data);
               var incSrc="";var incPoint="";
               var obj = jQuery.parseJSON(data);
               if(obj.status=="already-activated"){
                  alert("Please select a different Service , this Service is already Activated");
                  $("#activate-service-next").attr( "disabled", "disabled" );
                  return ;
               }
               $('#ProductDescription').html(obj.description);
               $("#activate-service-next").removeAttr("disabled");
               var srInclusions=obj.service_coverd;
               if(srInclusions != null){
                  var srInc_arr = srInclusions.split("\n"); 
                  $.each( srInc_arr, function( key, value ) {
                     //console.log(value);
                     incPoint=value.trim();
                     if(incPoint!=""){
                        incSrc=incSrc +"<li>"+incPoint+"</li>";
                     }
                  });
               }
               
               $('#Inclusions').html(incSrc);
               $('.serviceName').html(obj.title)
               $('#ProductInclusions').html(obj.service_coverd);
               $('#_basic_price_desc').html(obj._basic_price_desc);
               $('#_standard_price_desc').html(obj._standard_price_desc);
               $('#_premium_price_desc').html(obj._premium_price_desc);

               $('#_basic_commission').val(obj._basic_commission);
               $('#_standard_commission').val(obj._standard_commission);
               $('#_premium_commission').val(obj._premium_commission);
               
               //Commission Opertor
               console.log(obj.b_commssion_oprator);
               $('#b_commssion_oprator').val(obj.b_commssion_oprator);
               $('#s_commssion_oprator').val(obj.s_commssion_oprator);
               $('#p_commssion_oprator').val(obj.p_commssion_oprator);

               //Comission operant
               $('#b_commssion_add').val(obj.b_commssion_add);
               $('#s_commssion_add').val(obj.s_commssion_add);
               $('#p_commssion_add').val(obj.p_commssion_add);

               //console.log(obj._basic_commission);
               //add booking amount and time
               $('._basic_booking_price').val(obj._basic_booking_price);
               $('._standard_booking_price').val(obj._standard_booking_price);
               $('._premium_booking_price').val(obj._premium_booking_price);
               $('#_basic_plan_time').val(obj._basic_plan_time);
               $('#_standard_plan_time').val(obj._standard_plan_time);
               $('#_premium_plan_time').val(obj._premium_plan_time);

               var gst_show = obj.gst_show;
               if(gst_show==0){
                  $(".gst-18-div").addClass('hide');
               }else{
                  $(".gst-18-div").removeClass('hide');
               }

               var bsdesc=obj._basic_price_desc;
               var stdesc=obj._standard_price_desc;
               var prdesc=obj._premium_price_desc;
               var prdesc_arr = prdesc.split("\n"); 
               var stdesc_arr = stdesc.split("\n"); 
               var bsdesc_arr = bsdesc.split("\n"); 

               //console.log(obj.product_plans);
               var planName="";var planClassName="";
               var taxablePlan = [];
               var nonTaxablePlan = [];
               $.each( obj.product_plans, function( key, value ) {
                 
                  planName=value['heading'];
                  planClassName = planName.replace(/\s+/g, '-').toLowerCase();

                  var price=value['price'];
                  var type=value['type'];
                  if(value['taxable']==1){ 
                     //console.log(value);
                     console.log('taxable ' + key + ' ' + planName + '---' + price +'--' + type );
                     if(taxablePlan.includes(planName)==false){
                        taxablePlan.push(planName);
                        var basicPrice="";var stdPrice=""; var prePrice="";
                        var basicValue="";var stdValue=""; var preValue="";
                        var basicPlaceholder="Enter Amount";var stdPlaceholder="Enter Amount";var prePlaceholder="Enter Amount";
                        switch(type){
                           case 1:
                              console.log(1);
                              stdPrice="readonly";stdValue="NA";stdPlaceholder="NA";
                              prePrice="readonly";preValue="NA";prePlaceholder="NA";
                              break;
                           case 2:
                              console.log(2);
                              basicPrice="readonly";basicValue="NA";basicPlaceholder="NA";
                              prePrice="readonly";preValue="NA";prePlaceholder="NA";
                              break;
                           case 3:
                              console.log(3);
                              basicPrice="readonly";basicValue="NA";basicPlaceholder="NA";
                              stdPrice="readonly";stdValue="NA";stdPlaceholder="NA";
                              break;
                        }
                        var newIn = '<div class="taxable-row row w-100 '+ planClassName +'">  <div class="col-md-3"><input name="heading[]" value="'+ planName +'" placeholder="Enter Heads Fee & Charges" class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
                        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" '+ basicPrice +' value="'+basicValue+'" placeholder="'+basicPlaceholder+'" class="form-control col-md-12 basic-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
                        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" '+ stdPrice +' value="'+stdValue+'" placeholder="'+stdPlaceholder+'" class="form-control col-md-12 std-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
                        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" '+ prePrice +' value="'+preValue+'" placeholder="'+prePlaceholder+'" class="form-control col-md-12 pre-tax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div><i class="material-icons dp48 remove-texable-row">highlight_off</i><input name="taxable[]" value="1" hidden type="text"></div>'  
                        var newInput = $(newIn);
                        $(".texable-data").append(newInput);
                     }else{
                        if(type==1){
                           console.log("."+planClassName + " .basic-tax-price -- In the else " );
                           $(".texable-data" + " ." + planClassName + " .basic-tax-price").attr("readonly", false);
                           $(".texable-data" + " ." + planClassName + " .basic-tax-price").removeAttr("readonly");
                           $(".texable-data" + " ." + planClassName + " .basic-tax-price").val('');
                           $(".texable-data" + " ." + planClassName + " .basic-tax-price").attr("placeholder", "Enter Amount");	
                        }else if(type==2){
                           console.log("."+planClassName + " .std-tax-price -- In the else "  );
                           $(".texable-data" + " ." + planClassName + " .std-tax-price").attr("readonly", false);
                           $(".texable-data" + " ." + planClassName + " .std-tax-price").removeAttr("readonly");
                           $(".texable-data" + " ." + planClassName + " .std-tax-price").val('');
                           $(".texable-data" + " ." + planClassName + " .std-tax-price").attr("placeholder", "Enter Amount");	
                        }else if(type==3){
                           console.log("."+planName + " .pre-tax-price -- In the else " );
                           $(".texable-data" + " ."+ planClassName + " .pre-tax-price").attr("readonly", false);
                           $(".texable-data" + " ."+ planClassName + " .pre-tax-price").removeAttr("readonly");
                           $(".texable-data" + " ."+ planClassName + " .pre-tax-price").val('');	
                           $(".texable-data" + " ."+ planClassName + " .pre-tax-price").attr("placeholder", "Enter Amount");	
                        }
                     }
                  }else{
                     planName=value['heading'];
                     planClassName = planName.replace(/\s+/g, '-').toLowerCase();
                     console.log('non taxable ' +key + ' ' + planName);
                     if(nonTaxablePlan.includes(planName)==false){
                        nonTaxablePlan.push(planName);

                        var basicPrice="";var stdPrice=""; var prePrice="";
                        var basicValue="";var stdValue=""; var preValue="";
                        var basicPlaceholder="Enter Amount";var stdPlaceholder="Enter Amount";var prePlaceholder="Enter Amount";

                        switch(type){
                           case 1:
                              console.log(1);
                              stdPrice="readonly";stdValue="NA";stdPlaceholder="NA";
                              prePrice="readonly";preValue="NA";prePlaceholder="NA";
                              break;
                           case 2:
                              console.log(2);
                              basicPrice="readonly";basicValue="NA";basicPlaceholder="NA";
                              prePrice="readonly";preValue="NA";prePlaceholder="NA";
                              break;
                           case 3:
                              console.log(3);
                              basicPrice="readonly";basicValue="NA";basicPlaceholder="NA";
                              stdPrice="readonly";stdValue="NA";stdPlaceholder="NA";
                              break;
                        }

                        var newIn = '<div class="non-taxable-row row w-100 '+ planClassName +'"> <div class="col-md-3"><input name="heading[]" value="'+ planName +'" placeholder="Enter Heads for Govt." class="form-control col-md-12 input-sm-height bg-voilet" required="required" type="text">  </div>';
                        newIn +='<div class="col-md-2 px-2 mx-5"><input name="basic_price[]" '+ basicPrice +' value="'+basicValue+'" placeholder="'+basicPlaceholder+'"  class="form-control col-md-12 basic-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
                        newIn +='<div class="col-md-2 px-2 mx-5"><input name="std_price[]" '+ stdPrice +' value="'+stdValue+'" placeholder="'+stdPlaceholder+'"  class="form-control col-md-12 std-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div>'  
                        newIn +='<div class="col-md-2 px-2 mx-4"><input name="pre_price[]" '+ prePrice +' value="'+preValue+'"  placeholder="'+prePlaceholder+'"  class="form-control col-md-12 pre-nontax-price input-sm-height bg-voilet onlyNo" required="required" type="text"> </div> <i class="material-icons dp48 remove-nontexable-row">highlight_off</i><input name="taxable[]" value="0" hidden type="text"></div>'  
                        var newInput = $(newIn);
                        $(".non-texable-data").append(newInput);
                     }else{
                        if(type==3){
                           //console.log("."+planName + " .pre-tax-price");
                           $(".non-texable-data" + " ."+ planClassName + " .pre-nontax-price").removeAttr("readonly");
                           $(".non-texable-data" + " ."+ planClassName + " .pre-nontax-price").val('');	
                           $(".non-texable-data" + " ."+ planClassName + " .pre-nontax-price").attr("placeholder", "Enter Amount");
                        }else if(type==2){
                           $(".non-texable-data" + " ." + planClassName + " .std-nontax-price").removeAttr("readonly");
                           $(".non-texable-data" + " ." + planClassName + " .std-nontax-price").val('');	
                           $(".non-texable-data" + " ." + planClassName + " .std-nontax-price").attr("placeholder", "Enter Amount");
                        }else if(type==1){
                           $(".non-texable-data" + " ." + planClassName + " .basic-nontax-price").removeAttr("readonly");
                           $(".non-texable-data" + " ." + planClassName + " .basic-nontax-price").val('');	
                           $(".non-texable-data" + " ." + planClassName + " .basic-nontax-price").attr("placeholder", "Enter Amount");	
                        }
                     }
                  }
               });

               console.log(taxablePlan);
               console.log(nonTaxablePlan);
               var incTbl="";
               var basicVal="";
               var stdVal="";
               $.each( prdesc_arr, function( key, value ) {
                  basicVal='';stdVal=''
                  var bbBasicClass=" border-bottom ";
                  var bbStdClass=" border-bottom ";
                  basicVal=bsdesc_arr[key];
                  stdVal=stdesc_arr[key];
                  if (basicVal == undefined || basicVal.trim()==''){basicVal='';bbBasicClass='' };
                  if (stdVal == undefined || stdVal.trim() == ''){stdVal='';bbStdClass=''}
                  //console.log(basicVal);
                  //console.log(stdVal);
                  incTbl=incTbl+'<div class="row"><div class="col-sm '+ bbBasicClass +' py-1 ">'+basicVal+'</div><div class="col-sm '+ bbStdClass +'py-1">'+stdVal+'</div><div class="col-sm border-bottom py-1">'+value+'</div></div>';
               });
               $('#incTable').empty();
               $('#incTable').append(incTbl);
               
            }
      });
   });

   /*var title_select_box = $('#title').formSelect();
   title_select_box.on('change',function() {
      console.log('asa');
      $.ajax({
            url: myBaseUrl + 'base/getDescription/' + jQuery(this).val(),
            cache: false,
            type: 'get',
            headers: {
               'X-CSRF-Token': csrfCustomerToken
            },
            dataType: 'HTML',
            success: function(data) {
               //console.log(data);
               var obj = jQuery.parseJSON(data);
               $('#ProductDescription').html(obj.description);
               $("input[name='_basic_price']").val(obj._basic_price);
               $('#_basic_price_desc').html(obj._basic_price_desc);
               $("input[name='_basic_plan_time']").val(obj._basic_plan_time);
               $("input[name='_standard_price']").val(obj._standard_price);
               $('#_standard_price_desc').html(obj._standard_price_desc);
               $("input[name='_standard_plan_time']").val(obj._standard_plan_time);
               $("input[name='_premium_price']").val(obj._premium_price);
               $('#_premium_price_desc').html(obj._premium_price_desc);
               $("input[name='_premium_plan_time']").val(obj._premium_plan_time);
            }
      });
   });*/


   // Set checkbox on forms.html to indeterminate
   var indeterminateCheckbox = document.getElementById("indeterminate-checkbox");
   if (indeterminateCheckbox !== null) indeterminateCheckbox.indeterminate = true;

   // Materialize Slider
   $(".slider").slider({
      full_width: true
   });

   // Commom, Translation & Horizontal Dropdown
   $(".dropdown-trigger").dropdown();

   // Commom, Translation
   $(".dropdown-button").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: true,
      gutter: 0,
      coverTrigger: true,
      alignment: "left"
      // stopPropagation: false
   });

   // Notification, Profile, Translation, Settings Dropdown & Horizontal Dropdown
   $(".notification-button, .profile-button, .translation-button, .dropdown-settings, .dropdown-menu").dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false,
      hover: false,
      gutter: 0,
      coverTrigger: false,
      alignment: "right"
      // stopPropagation: false
   });

   // Fab
   $(".fixed-action-btn").floatingActionButton();
   $(".fixed-action-btn.horizontal").floatingActionButton({
      direction: "left"
   });
   $(".fixed-action-btn.click-to-toggle").floatingActionButton({
      direction: "left",
      hoverEnabled: false
   });
   $(".fixed-action-btn.toolbar").floatingActionButton({
      toolbarEnabled: true
   });

   // Materialize Tabs
   $(".tab-demo")
      .show()
      .tabs();
   $(".tab-demo-active")
      .show()
      .tabs();

   // Materialize scrollSpy
   $(".scrollspy").scrollSpy();

   // Materialize tooltip
   $(".tooltipped").tooltip({
      delay: 50
   });

   //Main Left Sidebar Menu // sidebar-collapse
   $(".sidenav").sidenav({
      edge: "left" // Choose the horizontal origin
   });

   //Main Right Sidebar
   $(".slide-out-right-sidenav").sidenav({
      edge: "right"
   });

   //Main Right Sidebar Chat
   $(".slide-out-right-sidenav-chat").sidenav({
      edge: "right"
   });

   // Perfect Scrollbar
   $("select")
      .not(".disabled")
      .select();
   var leftnav = $(".page-topbar").height();
   var leftnavHeight = window.innerHeight - leftnav;
   var righttnav = $("#slide-out-right").height();

   if ($("#slide-out.leftside-navigation").length > 0) {
      if (!$("#slide-out.leftside-navigation").hasClass("native-scroll")) {
         var ps_leftside_nav = new PerfectScrollbar(".leftside-navigation", {
            wheelSpeed: 2,
            wheelPropagation: false,
            minScrollbarLength: 20
         });
      }
   }
   if ($(".slide-out-right-body").length > 0) {
      var ps_slideout_right = new PerfectScrollbar(".slide-out-right-body, .chat-body .collection", {
         suppressScrollX: true
      });
   }
   if ($(".chat-body .collection").length > 0) {
      var ps_slideout_chat = new PerfectScrollbar(".chat-body .collection", {
         suppressScrollX: true
      });
   }

   // Char scroll till bottom of the char content area
   var chatScrollAuto = $("#right-sidebar-nav #slide-out-chat .chat-body .collection");
   if (chatScrollAuto.length > 0){
      chatScrollAuto[0].scrollTop = chatScrollAuto[0].scrollHeight;
   }

   // Fullscreen
   function toggleFullScreen() {
      if (
         (document.fullScreenElement && document.fullScreenElement !== null) ||
         (!document.mozFullScreen && !document.webkitIsFullScreen)
      ) {
         if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
         } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
         } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
         }else if (document.documentElement.msRequestFullscreen) {
            if (document.msFullscreenElement) {
               document.msExitFullscreen();
            } else {
             document.documentElement.msRequestFullscreen(); 
            }
         }
      } else {
         if (document.cancelFullScreen) {
            document.cancelFullScreen();
         } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
         } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
         }
      }
   }

   $(".toggle-fullscreen").click(function() {
      toggleFullScreen();
   });

   // Detect touch screen and enable scrollbar if necessary
   function is_touch_device() {
      try {
         document.createEvent("TouchEvent");
         return true;
      } catch (e) {
         return false;
      }
   }
   if (is_touch_device()) {
      $("#nav-mobile").css({
         overflow: "auto"
      });
   }

resizetable();


});

$(window).on("resize", function() {
   resizetable();
});

function resizetable() {
   if($(window).width() < 976){
      if($('.vertical-layout.vertical-gradient-menu .sidenav-dark .brand-logo').length > 0){
         $('.vertical-layout.vertical-gradient-menu .sidenav-dark .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo-color.png');
      }
      if($('.vertical-layout.vertical-dark-menu .sidenav-dark .brand-logo').length > 0){
         $('.vertical-layout.vertical-dark-menu .sidenav-dark .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo-color.png');
      }
      if($('.vertical-layout.vertical-modern-menu .sidenav-light .brand-logo').length > 0){
         $('.vertical-layout.vertical-modern-menu .sidenav-light .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo.png');
      }
   }
   else{
      if($('.vertical-layout.vertical-gradient-menu .sidenav-dark .brand-logo').length > 0){
         $('.vertical-layout.vertical-gradient-menu .sidenav-dark .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo.png');
      }
      if($('.vertical-layout.vertical-dark-menu .sidenav-dark .brand-logo').length > 0){
         $('.vertical-layout.vertical-dark-menu .sidenav-dark .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo.png');
      }
      if($('.vertical-layout.vertical-modern-menu .sidenav-light .brand-logo').length > 0){
         $('.vertical-layout.vertical-modern-menu .sidenav-light .brand-logo img').attr('src','../../../app-assets/images/logo/materialize-logo-color.png');
      }
   }
}
resizetable();

// Add message to chat
function slide_out_chat() {
   var message = $(".search").val();
   if (message != "") {
      var html =
         '<li class="collection-item display-flex avatar justify-content-end pl-5 pb-0" data-target="slide-out-chat"><div class="user-content speech-bubble-right">' +
         '<p class="medium-small">' +
         message +
         "</p>" +
         "</div></li>";
      $("#right-sidebar-nav #slide-out-chat .chat-body .collection").append(html);
      $(".search").val("");
      var charScroll = $("#right-sidebar-nav #slide-out-chat .chat-body .collection");
      if (charScroll.length > 0){
         charScroll[0].scrollTop = charScroll[0].scrollHeight;
      }
   }
}

