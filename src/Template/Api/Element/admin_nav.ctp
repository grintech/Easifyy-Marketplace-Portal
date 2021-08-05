
<?php
use Cake\Routing\Router;
?>
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
  <div class="brand-sidebar">
    <h1 class="logowrapper"><a class="brand-logo darken-1" href="../../"><span class="logo-text hide-on-med-and-down"><?php echo __('MarketPlace'); ?> </span></a><a class="navbar-toggler" href="#"></a></h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
    
    <!-- <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge pill orange float-right mr-10">3</span></a>
    </li>
 -->

   
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchants' ? 'active' : '';
    ?>
    
    <li class="bold <?= $active ?>">
      <!--<a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n=""><?php echo __('Basic Profile'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?//= $this->Html->link(__('Basic Details'), [ 'controller' => 'Merchants', 'action' => 'storeSettings']) ?>
          </li>
          
        </ul>
      </div>-->
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Merchants', 'action' => 'storeSettings']) ?>">
        <i class="material-icons">face</i><span class="menu-title" data-i18n="">Basic Details</span>
      </a>
    </li>

    
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchants' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <!--<a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n=""><?php echo __('Bank Details'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
              <?//= $this->Html->link(__('Add Bank Info.'), [ 'controller' => 'Merchants', 'action' => 'bankDetails']) ?>
          </li>
        </ul>
      </div>-->
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Merchants', 'action' => 'bankDetails']) ?>">
        <i class="material-icons">face</i><span class="menu-title" data-i18n="">Bank Info.</span>
      </a>
    </li>


    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchants' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <!--<a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n=""><?php echo __('KYC Details'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
              <?//= $this->Html->link(__('Add KYC Info.'), [ 'controller' => 'Merchants', 'action' => 'kyc']) ?>
          </li>
        </ul>
      </div>-->
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Merchants', 'action' => 'kyc']) ?>">
        <i class="material-icons">face</i><span class="menu-title" data-i18n="">KYC Info.</span>
      </a>
    </li>



    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchantproducts' ? 'active' : '';
    ?>
    <!--<li class="bold <?= $active ?> <?= strtolower($this->request->getParam('controller')) ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n=""><?php echo __('Services'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Services'), [ 'controller' => 'MerchantProducts', 'action' => 'index']) ?>
          </li>
          <!--<li>
              <?= $this->Html->link(__('Import Services'), [ 'controller' => 'MerchantProducts', 'action' => 'selectProduct']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('Choose Services'), [ 'controller' => 'MerchantProducts', 'action' => 'addCustomProduct']) ?>
          </li>
        </ul>
      </div>
    </li>-->

    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'MerchantProducts', 'action' => 'index']) ?>"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">All Services</span></a>
    </li>

    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'MerchantProducts', 'action' => 'addCustomProduct']) ?>"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">Choose Services</span></a>
    </li>

    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'MerchantProducts', 'action' => 'customProduct']) ?>"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">Custom Services</span></a>
    </li>

 <?php
      $active = strtolower($this->request->getParam('controller')) == 'orders' ? 'active' : '';
    ?>
    <li style="" class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_mall</i><span class="menu-title" data-i18n=""><?php echo __('Orders'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Orders'), [ 'controller' => 'Orders', 'action' => 'index']) ?>
          </li>
          <!--li>
              <?= $this->Html->link(__('New Order'), [ 'controller' => 'Orders', 'action' => 'add']) ?>
          </li -->
        </ul>
      </div>
    </li>


   
	<?php
      $active = strtolower($this->request->getParam('controller')) == 'coupons' ? 'active' : '';
    ?>
    <li style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">card_giftcard</i><span class="menu-title" data-i18n=""><?php echo __('Coupons'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Coupons'), [ 'controller' => 'Coupons', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Coupon'), [ 'controller' => 'Coupons', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'suppliers' ? 'active' : '';
    ?>
    <li style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_shipping</i><span class="menu-title" data-i18n=""><?php echo __('Suppliers'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All  Suppliers'), [ 'controller' => 'Suppliers', 'action' => 'index']) ?>
          </li>
         <li>
              <?= $this->Html->link(__('New Supplier'), [ 'controller' => 'Suppliers', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'purchases' ? 'active' : '';
    ?>
    <li style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_parking</i><span class="menu-title" data-i18n=""><?php echo __('Purchases'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All  Purchases'), [ 'controller' => 'Purchases', 'action' => 'index']) ?>
          </li>
         <li>
              <?= $this->Html->link(__('New Purchase'), [ 'controller' => 'Purchases', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>


    <?php
      $active = strtolower($this->request->getParam('controller')) == 'reviews' ? 'active' : '';
    ?>
    <li style="" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">star_half</i><span class="menu-title" data-i18n=""><?php echo __('Reviews'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Reviews'), [ 'controller' => 'Reviews', 'action' => 'index']) ?>
          </li>
         <!--  <li>
              <?= $this->Html->link(__('New OrderPayment'), [ 'controller' => 'OrderPayments', 'action' => 'add']) ?>
          </li> -->
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'orderpayments' ? 'active' : '';
    ?>
    <li style="" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">payment</i><span class="menu-title" data-i18n=""><?php echo __('Order Payments'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Order Payments'), [ 'controller' => 'OrderPayments', 'action' => 'index']) ?>
          </li>
         <!--  <li>
              <?= $this->Html->link(__('New OrderPayment'), [ 'controller' => 'OrderPayments', 'action' => 'add']) ?>
          </li> -->
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchanttransactions' ? 'active' : '';
    ?>
    <li style="" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_atm</i><span class="menu-title" data-i18n=""><?php echo __('Merchant Transactions'); ?></span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Merchant Transactions'), [ 'controller' => 'MerchantTransactions', 'action' => 'index']) ?>
          </li>
         <!--  <li>
              <?= $this->Html->link(__('New OrderPayment'), [ 'controller' => 'OrderPayments', 'action' => 'add']) ?>
          </li> -->
        </ul>
      </div>
    </li>

    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Merchants', 'action' => 'guidelines']) ?>"><i class="material-icons">exit_to_app</i><span class="menu-title" data-i18n="">SOP & Mandatory Guidelines</span></a>
    </li>

    
    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>"><i class="material-icons">exit_to_app</i><span class="menu-title" data-i18n=""><?php echo __('Logout') ?></span></a>
     

    </li>
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>