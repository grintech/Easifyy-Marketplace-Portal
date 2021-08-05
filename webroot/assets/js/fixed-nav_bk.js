//$('a[href^="#"]').click(function (event) {
    //var id = $(this).attr("href");
   // var target = $(id).offset().top;
   // $('html, body').animate({
      //  scrollTop: target
    //}, 500);
   // event.preventDefault();
//});

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
var searchicon = document.querySelector(".searchicon"),
search = document.querySelector(".search");

searchicon.addEventListener("click", function(){
  if(search.classList.contains("toggle-off")){
    search.classList.remove("toggle-off");
  }
  else{
    search.classList.add("toggle-off");
  }
});
/////////Banner Search///////////

/////////Mega Menu///////////
$(document).ready(function(){
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
});

/////////Mega Menu///////////

/////////Modal on Hover///////////
$(function() {

  //$('[data-toggle="modal"]').hover(function() {
  //  var modalId = $(this).data('target');
  //  $(modalId).modal('show');

  //});
});

/////////Modal on Hover///////////

$(document).ready(function(){

$('#smartwizard').smartWizard({
selected: 0,
theme: 'dots',
autoAdjustHeight:true,
transitionEffect:'fadeIn',
showStepURLhash: false,

});

});