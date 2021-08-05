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
        Primco
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('jquery-ui.min.css') ?>
    <?= $this->Html->css('theme/vendors.min.css') ?>
    <?= $this->Html->css('theme/materialize.css') ?>
    <?= $this->Html->css('theme/style.css') ?>
    <?= $this->Html->css('theme/dashboard.css') ?>
    <?= $this->Html->css('theme/custom.css') ?>

    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="text/javascript">
        var csrfCustomerToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
        var customer_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getcustomers' ]) ?>';
        var customer_data_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getcustomersdata' ]) ?>';
        var salesmen_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getsalesmen' ]) ?>';
        var salesmen_data_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getsalesmendata' ]) ?>';
        var item_name_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getitemname' ]) ?>';
        var item_number_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getitemnumber' ]) ?>';
        var product_ajax_url = ' <?= $this->Url->build([ 'controller' => 'Orders', 'action' => 'getproduct' ]) ?>';
    </script>
</head>
<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 2-columns  " data-open="click" data-menu="vertical-dark-menu" data-col="2-columns">

    <?= $this->element('header'); ?>
    <?= $this->element('nav'); ?>

    <div id="main">
        <div class="row">
            <div id="breadcrumbs-wrapper" data-image="<?= $this->Url->image('breadcrumb-bg.jpg') ?>" class="breadcrumbs-bg-image" style="background-image: url(<?= $this->Url->image('breadcrumb-bg.jpg') ?>);">

                  <!-- Search for small screen-->
                  <div class="container">
                    <div class="row">
                      <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><?= $this->request->params['controller'] ?></h5>
                      </div>
                      <!-- <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                          <li class="breadcrumb-item"><a href="index.html">Home</a>
                          </li>
                          <li class="breadcrumb-item"><a href="#">User</a>
                          </li>
                          <li class="breadcrumb-item active">User Profile Page
                          </li>
                        </ol>
                      </div> -->
                    </div>
                  </div>
                </div>
            
        </div>
        <div class="row">
            <div class="col s12">
                <div class="container">
                    <?= $this->Flash->render() ?>
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
            
    <?= $this->element('footer'); ?>

    
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('theme/vendors.min.js') ?>
    <?= $this->Html->script('theme/plugins.js') ?>
    <?= $this->Html->script('theme/custom-script.js') ?>
    <?= $this->Html->script('admin.js') ?>
  
</body>
</html>
