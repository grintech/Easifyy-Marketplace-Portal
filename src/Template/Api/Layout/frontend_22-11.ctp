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
    <title>MarketPlace</title>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
    rel="stylesheet">
    
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
    rel="stylesheet">
    
<!--     <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
   <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Roboto+Slab:100,300,400,700" rel="stylesheet"> -->
    
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('/assets/css/bootstrap.min.css'); ?>

    <?= $this->Html->css('/assets/css/font-awesome.css'); ?>
    <?= $this->Html->css('/assets/css/bootstrap.min.css'); ?>
    <?= $this->Html->css('/assets/css/owl.carousel.min.css'); ?>
    <?= $this->Html->css('/assets/style.css'); ?>
    <?= $this->Html->css('/assets/css/smart_wizard.min.css'); ?>
    <?= $this->Html->css('/assets/css/dataTables.bootstrap4.min.css'); ?>
    <?= $this->Html->css('/css/dropzone.css'); ?>
    <?= $this->Html->css('https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css'); ?>

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
            <div class="col-sm-12">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="container-fluid" style="padding:0!important;">
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
        <?= $this->Html->script('/assets/js/jquery.smartWizard.min.js') ?>
        <?= $this->Html->script('/js/dropzone.js'); ?>
        <?= $this->Html->script('/assets/js/jquery.dataTables.min.js') ?>
       <?= $this->Html->script('/assets/js/dataTables.bootstrap4.min.js') ?>
       <?= $this->Html->script('https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js') ?>
       <?= $this->Html->script('https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js') ?>
        <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.js" type="text/javascript"></script>

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

        });
        $("#sign_up_seller").validate({
      rules: {
        name: {
            required: true        

        },
        phone:{
            required:true
        },
        email:{
            required:true,
            email: true
        },
        password: {
            required: true,
            minlength:5
        },
        con_password:{
             required: true,
            minlength:5
        },
      },
      messages: {
        name: "The Name field is mandatory.",
        phone:"The Telephone field is mandatory.",
        email:"The Email field is mandatory.",
        password:"The Password field is mandatory.", 
        con_password:"The Re-Password field is mandatory."   
      },
      errorElement: 'span',
        errorPlacement: function(error, element) {
            
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);

        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });


        var units = {"1":"Kg","2":"GMS","5":"ML","6":"LTR","15":"PCS"};
      var csrfCustomerToken = "b0836a76de5bf7c41521a1a1a345955f01ea53e49563a250e2c255ee0fc80b72d64f0fff8435bbe41f2dd07f373205edeba08428f785c18715e0a24afa4e2bf8";
      var image_dropZone_url = '/hopperstock/dev/marketplace/base/upload-image';
      var store_image_dropZone_url = '/hopperstock/dev/marketplace/base/upload-image-store';

       // Dropzone.autoDiscover = false;

    Dropzone.options.myAwesomeDropzone = {
        url: image_dropZone_url,
        maxFiles: 1, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        acceptedFiles: "image/jpeg,image/png",
        accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
              done("Naha, you don't.");
            }
            else { done(); }
        },
        init: function() {
            this.on("success", function(file, response) { 
                 console.log('response Featured ',response);
                jQuery('#product-image').val( JSON.parse( response ) );
                // console.log(file, response);
                // console.log('product-image test');
            });

        },
    };
    $(document).ready(function() {
    $('#example').DataTable();
});

    </script>
    <style>
.disply-flex {
    display: flex;
}
    </style>
    </body>
</html>


