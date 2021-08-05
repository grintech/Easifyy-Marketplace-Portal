<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org) 
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easifyy</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
    rel="stylesheet">
    
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('/assets/css/bootstrap.min.css'); ?>

    <?= $this->Html->css('/assets/css/font-awesome.css'); ?>
    <?= $this->Html->css('/assets/css/bootstrap.min.css'); ?>
    <?= $this->Html->css('/assets/css/owl.carousel.min.css'); ?>
    <?= $this->Html->css('/assets/style.css'); ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    <script>
        addEventListener("load", function () {
          setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
          window.scrollTo(0, 1);
        }
    </script>
</head>

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <?= $this->element('frontendheader'); ?>
    
    <div id="main">
        
        <div class="row">
            <div class="col s12">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="container-fluid">
            <?= $this->fetch('content') ?>
        </div>
        
    </div>
            
    <?= $this->element('frontendfooter'); ?>

        <?= $this->Html->script('/assets/js/jquery-2.2.3.min.js') ?>
        <?= $this->Html->script('/assets/js/bootstrap.min.js') ?>
        <?= $this->Html->script('/assets/js/owl.carousel.min.js') ?>
        <?= $this->Html->script('/assets/js/fixed-nav.js') ?>
        <?= $this->Html->script('/assets/js/jquery.magnific-popup.js') ?>
        <?= $this->Html->script('/assets/js/SmoothScroll.min.js') ?>
        <?= $this->Html->script('/assets/js/move-top.js') ?>
        <?= $this->Html->script('/assets/js/easing.js') ?>
        <?= $this->Html->script('/assets/js/inside.js') ?>

    <script>
        $(document).ready(function () {
            $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
            });

            if (localStorage.remember_me && localStorage.remember_me != '') {
                $('#remember_me').attr('checked', 'checked');
                $('#email').val(localStorage.email);
                $('#password').val(localStorage.password);
            } else {
                $('#remember_me').removeAttr('checked');
                $('#email').val('');
                $('#password').val('');
            }

            $('#remember_me').click(function() {

                if ($('#remember_me').is(':checked')) {
                    // save username and password
                    localStorage.email = $('#email').val();
                    localStorage.password = $('#password').val();
                    localStorage.remember_me = $('#remember_me').val();
                } else {
                    localStorage.email = '';
                    localStorage.password = '';
                    localStorage.remember_me = '';
                }
            });
        });
    </script>
    <style>
       
        .disply-flex {
            display: flex;
        }
        .span-text{
            color: #322edd;font-family: SofiaLight;font-size: 14px;
        }
        .hire-designer-button {
            background: 0 0;
            color: #000;
            border-top: 1px solid #e3e3e3;
            padding: 8px 10px;
            background: #d3baf1;
            text-align: left;
            color: #fff;
            font-size: 16px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            font-family: SofiaMedium;
            width: 100%;
        }
        .designer-name {
            font-size: 20px;
            font-family: EinaBold;
            font-weight: bold;
            color: #000;
            margin-top: 5px;
            margin-bottom: 0;
        }
        .designer-brief{
            font-size: 16px;
            font-family: SofiaLight;
            color: #000;
            margin-top: 8px;
            line-height: 1.4em;
        }
        .designer-profile-card{
            border: 1px solid #e3e3e3; 
            border-radius: 6px;
            margin-top: 10px; 
            margin-bottom: 20px; 
            height: 360px; 
            position: relative;
        }
        .profile-card-footer{
            text-align: center;
            position: absolute;
            bottom: 0;
            right: 0;
            left: 0;
        }
        .badge-super-pro-text{
            color: #087f69;
            font-family: SofiaRegular;
            font-size: 14px;
        }
        
        .image-gallery-slides {
            line-height: 0;
            overflow: hidden;
            position: relative;
            white-space: nowrap;
        }
        .image-gallery-image{
            height: 410px;
            line-height: 380px;
            overflow: hidden;
        }
        .btn-pay-installment {
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #ea367f;
            color: #fff;
            text-align: center;
            font-size: 16px;
            padding: 10px 20px;
            font-family: EinaBold;
            width: 100%;
            display: block;
        }
        .btn-share-expert-chat {
            background-color: #d3baf1;
            color: #fff;
            font-size: 16px;
            padding: 10px 20px;
            font-family: EinaBold;
            width: 100%;
            display: block;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .show_hide_list{
            color:blue;
        }
    </style>
    <script>
        $(document).ready(function() {
    $('#example').DataTable();
});
//         function ShowMenu(elem){
// var dataId = $(elem).attr("data-id");

// $('.dropdown-submenu').css('display','none');
// $('.dropdown-menu').css('height','380px');
// $('.dropdown-menu').css('min-height','450px');
// $('.dropdown-submenu[data-id="'+ dataId +'"]').css('display', 'inline-block');
// }
// $('.income_dropdown').mouseover(function(){
// $('.dropdown-submenu').show();
// $('.income_menu').toggle();

// $('.gst_menu').hide();
// $('.roc_menu').hide();
// $('.dropdown-menu').css('min-height','250px');
// $('.dropdown-menu').css('height','200px');
// });
// $('.gst_dropdown').mouseover(function(){
// $('.gst_menu').show();
// $('.income_menu').hide();
// $('.roc_menu').hide();
// $('.dropdown-menu').css('min-height','280px');
// $('.dropdown-menu').css('height','220px');

// });
// $('.roc_dropdown').mouseover(function(){
// $('.roc_menu').show();
// $('.income_menu').hide();
// $('.gst_menu').hide();
// $('.dropdown-menu').css('min-height','380px');
// $('.dropdown-menu').css('height','350px');

// });
 
// $('.income_dropdown').mouseout(function(){
// $('.dropdown-menu').css('height','auto');
// $('.dropdown-menu').css('min-height','auto');

// });
// $('.gst_dropdown').mouseout(function(){
// $('.dropdown-menu').css('height','auto');
// $('.dropdown-menu').css('min-height','auto');
// });
// $('.roc_dropdown').mouseout(function(){
// $('.dropdown-menu').css('height','auto');
// $('.dropdown-menu').css('min-height','auto');

// });

// $('.nav-link').mouseover(function(){
    
//     $('.gst_menu').hide();
//     $('.income_menu').hide();
//     $('.roc_menu').hide();
//     $('.dropdown-menu').css('height','auto');
//     $('.dropdown-menu').css('min-height','auto');

// });
$('.nav-link').mouseover(function(){
 
   $('.dropdown-submenu').css('display','none');
  $('.dropdown-menu').css('height','auto');
    $('.dropdown-menu').css('min-height','auto');

});
$('.hideMenu').mouseover(function(){
 
   $('.dropdown-submenu').css('display','none');
  $('.dropdown-menu').css('height','auto');
    $('.dropdown-menu').css('min-height','auto');

});



$('ul.term-list').each(function(){
  
  var LiN = $(this).find('li').length;
  
  if( LiN > 4){    
    $('li', this).eq(3).nextAll().hide().addClass('toggleable');
    $(this).append('<li class="more show_hide_list">More</li>');    
  }
  
});


$('ul.term-list').on('click','.more', function(){
  
  if( $(this).hasClass('less') ){    
    $(this).text('More').removeClass('less');    
  }else{
    $(this).text('Less').addClass('less'); 
  }
  
  $(this).siblings('li.toggleable').slideToggle();
    
}); 

    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/606ef397067c2605c0c073e9/1f2omf361';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    </body>
</html>


