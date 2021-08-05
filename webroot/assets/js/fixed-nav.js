//$('a[href^="#"]').click(function (event) {
    //var id = $(this).attr("href");
   // var target = $(id).offset().top;
   // $('html, body').animate({
      //  scrollTop: target
    //}, 500);
   // event.preventDefault();
//});


$(".onlyNo").keyup(function(e){
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});

var offset = $('nav').offset().top;
$(window).scroll(function () {
    if ($(this).scrollTop() >= offset) {
        $('nav').addClass('isFixed');
        $('html').addClass('whiteSpace');
    } else {
        $('nav').removeClass('isFixed');
        $('html').removeClass('whiteSpace');
    }
});
$( ".gst-check" ).click(function() {
  //console.log("s");
  $(".gst-details").toggle("slow");
  $(".gst-section").toggle("slow");

  $(".total-amount").toggleClass( "withgst" );

  var gPrice=$(".gst-calc").val();
  var tPrice=$("#totalPrice").text();
  pPrice=parseInt(gPrice);
  tPrice=parseInt(tPrice);
  if ($(".total-amount").hasClass("withgst")) { // Non Gst Order
    console.log("NON GST Order");
    $("#gstin").removeAttr("required");
    $("#companyName").removeAttr("required");
    $("#address").removeAttr("required");
    $("#state").removeAttr("required");

    tPrice=tPrice - pPrice;
    $("#totalPrice").text(tPrice);
    $("#gross_total").val(tPrice);
  }else{ // GST Order
    console.log("GST ORDER");
    $("#gstin").attr("required","required");
    $("#companyName").attr("required","required");
    $("#address").attr("required","required");
    $("#state").attr("required","required");

    tPrice=tPrice + pPrice;
    $("#totalPrice").text(tPrice);
    $("#gross_total").val(tPrice);
  }
});

/////////Search Box///////////
$('#myInput').click( function(event){  
    event.stopPropagation();
    $("#myUL").fadeIn("fast");
});

$(document).click( function(){
    $('#myUL').hide();
});

function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
/////////Search Box///////////

/////////Product Slider///////////
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-angle-left'></i>",
    "<i class='fa fa-angle-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
})
/////////Product Slider///////////



/////////Sticky Top Navbar///////////
//window.onscroll = function() {myFunction()};

//var navbar = document.getElementById("sticky-top");
//var sticky = navbar.offsetTop;

//function myFunction() {
 // if (window.pageYOffset >= sticky) {
  //  navbar.classList.add("sticky")
 // } else {
  // navbar.classList.remove("sticky");
 //}
//}


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("main-header").style.background = "#fff";
    document.getElementById("sticky-top").style.top = "0";
    document.getElementById("logo").style.width = "90%";
    document.getElementById("top-nav").style.padding = "4px 25px";
  } else {
    document.getElementById("main-header").style.background = "#fff";
    document.getElementById("sticky-top").style.top = "45px";
    document.getElementById("logo").style.width = "100%";
    document.getElementById("top-nav").style.padding = "15px 25px";
  }
}

/////////Sticky Top Navbar///////////


/////////Banner Search///////////
/*var searchicon = document.querySelector(".searchicon"),
search = document.querySelector(".search");

/*searchicon.addEventListener("click", function(){
  if(search.classList.contains("toggle-off")){
    search.classList.remove("toggle-off");
  }
  else{
    search.classList.add("toggle-off");
  }
});*/
/////////Banner Search///////////

/////////Mega Menu///////////
$(document).ready(function(){
    $(".li-elements").click(function(){
      console.log('asa');;
    });
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,false).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,false).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
    $(".abc").click(function(){
      var modalId=$(this).attr('myModal');
      //alert(modalId);
      $('#'+modalId).attr("style", "display:block");
      
    });
});
// $('.btn-login').click(function(){  
//     swal({
//       // title: 'Success !',
//        icon: 'success',
//       text: 'Login Successfully !',
//       type: 'success'
//     });
// });
/////////Mega Menu///////////

/////////Modal on Hover///////////
$(function() {

  //$('[data-toggle="modal"]').hover(function() {
  //  var modalId = $(this).data('target');
  //  $(modalId).modal('show');

  //});
});
/////////Modal on Hover///////////

$("#callBackRequest").on('click',function(e){
  var emailInput = $("#emailInput").val();
  var phoneInput = $("#phoneInput").val();
  var _csrfToken =$('input[name="_csrfToken"]').val();
  if(emailInput=="" && phoneInput==""){
    $(".form-respone").html("Please Fill the Email and Phone Number!!");
    return ;
  }

  if(phoneInput==""){
    $(".form-respone").html("Please Fill the Phone Number!!");
    return ;
  }
  if(emailInput==""){
    $(".form-respone").html("Please Fill the Email!!");
    return ;
  }

  console.log(_csrfToken);
  jQuery.ajax({
      headers: {
          'X-CSRF-Token': _csrfToken
      },
      type: "post",
      url: 'https://easifyy.com/Users/callBackRequest',
      data: {
              emailInput:emailInput,
              phoneInput:phoneInput,
          },
      success: function (data, textStatus){
          console.log('finalData',data);
          $(".form-respone").html(data);
          //alert('Data Saved');
      },
  });
});

$("#newsLetterSubscribe").on('click',function(e){
  var emailInput = $("#newsletterEmail").val();
  var _csrfToken =$('input[name="_csrfToken"]').val();

  if(emailInput==""){
    $(".newsletter-form-respone").html("Please Enter the Email for Subscribe!!");
    return ;
  }

  console.log(_csrfToken);
  jQuery.ajax({
      headers: {
          'X-CSRF-Token': _csrfToken
      },
      type: "post",
      url: 'https://easifyy.com/Users/newsletterSubscribe',
      data: {
              emailInput:emailInput,
          },
      success: function (data, textStatus){
          console.log('finalData',data);
          $(".newsletter-form-respone").html(data);
          //alert('Data Saved');
      },
  });
});

$("#howItWorksNewsletter").on('click',function(e){
  var emailInput = $("#howItWorks_newsletter_email").val();
  var _csrfToken =$('input[name="_csrfToken"]').val();

  if(emailInput==""){
    $(".howItWorks_newsletter-form-respone").html("Please Enter the Email for Subscribe!!");
    return ;
  }

  console.log(_csrfToken);
  jQuery.ajax({
      headers: {
          'X-CSRF-Token': _csrfToken
      },
      type: "post",
      url: 'https://easifyy.com/Users/newsletterSubscribe',
      data: {
              emailInput:emailInput,
          },
      success: function (data, textStatus){
          console.log('finalData',data);
          $(".howItWorks_newsletter-form-respone").html(data);
          //alert('Data Saved');
      },
  });
});


$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});

/*document.getElementById("profile_img").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
         document.getElementById("user_image").src = e.target.result;
       
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
};*/

 $(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});

 $(".open_login").click(function(){
      
      $('#modalSignup').css('display','none');
      $('#modalLogin').show();
      
});
function ShowMenu(elem){
var dataId = $(elem).attr("data-id");
$('.dropdown-submenu').css('display','none');
// $('.dropdown-menu').css('height','380px');
// $('.dropdown-menu').css('min-height','450px');
$('.dropdown-submenu[data-id="'+ dataId +'"]').css('display', 'inline-block');
if($('.dropdown-submenu[data-id="'+ dataId +'"]').css('display','inline-block')){
 $('.dropdown-menu').css('height','380px');
 $('.dropdown-menu').css('min-height','450px'); 
}
else{
  $('.dropdown-submenu').css('display','none');
   $('.dropdown-menu').css('height','auto');
 $('.dropdown-menu').css('min-height','auto'); 
}



// $('.dropdown-menu[data-id="8232"]').css('min-height','450px');
// $('.dropdown-menu[data-id="8232"]').css('height','450px');
// $('.dropdown-submenu[data-id="'+ dataId +'"]').toggle();
//$('.dropdown-submenu[data-id="'+ dataId +'"]').toggle();
}

$('.efilling-menu').mouseover(function(){
 if($('.dropdown-submenu').css('display', 'none')){
 $('.dropdown-menu').css('height','auto');
 $('.dropdown-menu').css('min-height','auto'); 
  }
});
$('.income_dropdown').mouseout(function(){
 $('.dropdown-menu').css('height','auto');
 $('.dropdown-menu').css('min-height','auto'); 
  });
// $('.hideMenu').mouseover(function(){
 
//    $('.dropdown-submenu').css('display','none');
//   $('.dropdown-menu').css('height','auto');
//     $('.dropdown-menu').css('min-height','auto');

// });