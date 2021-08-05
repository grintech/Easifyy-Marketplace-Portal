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
        Easifyy
    </title>
    <?= $this->Html->meta('icon') ?>

    
    
    <?= $this->Html->css('theme/vendors.min.css') ?>
    <?= $this->Html->css('theme/materialize.css') ?>
    <?= $this->Html->css('theme/style.css') ?>
    <?= $this->Html->css('theme/login.css') ?>
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
<body class="vertical-layout page-header-light vertical-menu-collapsible vertical-dark-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-dark-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
            
            <?= $this->fetch('content') ?>
        </div>
      </div>
    </div>
</div>

    <!--div class="body-wrapper">
        <div class="application-from p-0 m-0">
            <?php //$this->Flash->render() ?>
            <div class="container">
                <?php // $this->fetch('content') ?>
            </div>
        </div>
    </div -->
    <footer>
    </footer>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('theme/vendors.min.js') ?>
    <?= $this->Html->script('theme/plugins.js') ?>
    <?= $this->Html->script('theme/custom-script.js') ?>
  
    

</body>
</html>
