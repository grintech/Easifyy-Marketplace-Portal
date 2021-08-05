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
        .container-fluid {
    padding: 0 !important;
}
.disply-flex {
    display: flex;
}
    </style>
    </body>
</html>


