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
    <title>
      Easifyy | Admin Panel
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('theme/vendors.min.css') ?>
    <?= $this->Html->css('theme/materialize.css') ?>
    <?= $this->Html->css('theme/style.css') ?>
    <?= $this->Html->css('theme/dashboard.css') ?>
    <?= $this->Html->css('theme/custom.css') ?>
    <?= $this->Html->css('dropzone.css') ?>
    <?= $this->Html->css('product.css') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-1.12.4.js') ?>
    <?= $this->Html->script('dropzone.js') ?>
    <?= $this->Html->script('admin-custom.js') ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php
    $id =$this->request->getSession()->read('Auth.User.id');;
    $products = $this->Site->getMerchantProducts($id);
    // echo '<pre>';
    // print_r($products);
    // echo '</pre>';

     ?>
     <script> 
    var product_with_price = <?=json_encode($products) ?>; 
    <?php if( isset($products) && !empty($products) ) { ?>
        product_with_price = {<?php foreach ($products as $key => $value) {
            echo '"'.$value['id'].'":{"id":"'.$value['id'].'","bar_code":"'.$value['_bar_code'].'","title":"'.$value['title'].'","_price":"'.$value['_price'].'","sale_price":"'.$value['_sale_price'].'","igst":"'.$value['_igst'].'","cgst":"'.$value['_cgst'].'","sgst":"'.$value['_sgst'].'","price":"'.$value['_price'].'"},'; } ?>};
    <?php } ?>
   // console.log('product_with_price',product_with_price);
    var product_listing = <?php echo json_encode($products); ?>;
    var myBaseUrl = '<?php echo BASE_URL; ?>';

    </script>
    <script> var basePath = "<?=Router::url('/', true);?>";</script>
    <style>
        .dz-max-files-reached {
            pointer-events: none;
            cursor: default;
        }
    </style>
    <script type="text/javascript">
    var csrfCustomerToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    var image_dropZone_url = '<?= Router::url([ 'controller' => 'Base', 'action' => 'uploadImage', 'prefix' => false]) ?>';
    var store_image_dropZone_url = '<?= Router::url([ 'controller' => 'Merchants', 'action' => 'uploadImageStore', 'prefix' => 'admin']) ?>';

    // Dropzone.autoDiscover = false;

    //console.log(image_dropZone_url);
    Dropzone.options.myAwesomeDropzone = {
        addRemoveLinks: true,
        url: image_dropZone_url,
        uploadMultiple: false,
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
                //console.log(file, response);
                //console.log('product-image test');
                $(".dz-remove").html("<div><span class='fa fa-trash text-danger' style='font-size: 1.5em'></span></div>");
            });

        },
    };

    Dropzone.options.myGalleryDropzone = {
        addRemoveLinks: true,
        url: image_dropZone_url,
        maxFiles: 10, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        acceptedFiles: "image/jpeg,image/png",
        init: function() {
            this.on("success", function(file, response) { 
                console.log('response Gallery',response);
                
                var urls = "";
                if( jQuery('#product-gallery').val() == "" ) {
                    urls = JSON.parse( response ); 
                } else {
                    urls = jQuery('#product-gallery').val() +','+ JSON.parse( response ); 
                }
                jQuery('#product-gallery').val( urls );
                $(".dz-remove").html("<div><span class='fa fa-trash text-danger' style='font-size: 1.5em'></span></div>");
            });
        }
    };
    
    Dropzone.options.myStoreDropzone = {
        url: store_image_dropZone_url,
        maxFiles: 1, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        init: function() {
            this.on("success", function(file, response) { 
                jQuery('#store-image').val( JSON.parse( response ) );
                console.log(file, response);
                console.log('store-image');
            });
        }
    }; 
    Dropzone.options.myCategoryDropzone = {
        url: image_dropZone_url,
        maxFiles: 1, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        init: function() {
            this.on("success", function(file, response) { 
                jQuery('#upload_category_image').val( JSON.parse( response ) );
                console.log(file, response);
                console.log('store-image');
            });
        }
    }; 

    

    Dropzone.options.myGlobalDropzone = {
        url: image_dropZone_url,
        maxFiles: 1, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        init: function() {
            this.on("success", function(file, response) { 
                jQuery('#my-global-dropzone').siblings('#global-dropzone-input').val( JSON.parse( response ) );
                console.log('Dropzone');
                //jQuery('#upload_category_image').val( JSON.parse( response ) );
                //console.log(file, response);
                //console.log('store-image');
            });
        }
    }; 
    Dropzone.options.docuploaddropzone = {
        url: image_dropZone_url,
        maxFiles: 1, 
        headers: {
                'X-CSRF-Token': csrfCustomerToken
        },
        init: function() {
            this.on("success", function(file, response) { 
                jQuery('#my-global-dropzone').siblings('#global-dropzone-input').val( JSON.parse( response ) );
                console.log('Dropzone');
                //jQuery('#upload_category_image').val( JSON.parse( response ) );
                //console.log(file, response);
                //console.log('store-image');
            });
        }
    }; 
    </script>
</head>

<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <?= $this->element('header'); ?>
    <?= $this->element('admin_nav'); ?>
    <div id="main" style="padding-left: 0px;background-color: white;">
        <!--<div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= $this->Url->image('breadcrumb-bg.jpg') ?>" class="breadcrumbs-bg-image" style="background-image: url(<?= $this->Url->image('breadcrumb-bg.jpg') ?>);">

                  <!-- Search for small screen
                  <div class="container">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">
                         <?= $this->request->getParam('controller') ?></h5>
                      </div>
  
                    </div>
                  </div>
                </div>
            
        </div>-->
        <div class="row">
            <div class="col s12">
                <?= $this->Flash->render() ?>
            </div>
        </div>
        <div class="container-fluid p-0">
            <?= $this->fetch('content') ?>
        </div> 
    </div>
            
    <?= $this->element('footer'); ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('theme/vendors.min.js') ?>
    <?= $this->Html->script('theme/plugins.js') ?>
    <?= $this->Html->script('product.js') ?>
    <?= $this->Html->script('admin.js') ?>
    
   
  
</body>
</html>
