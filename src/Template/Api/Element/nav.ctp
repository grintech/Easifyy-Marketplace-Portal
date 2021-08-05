<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a href="<?php echo BASE_URL; ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/assets/images/logo.png" alt="MindZpro"></a>
    </h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'users' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">people_outline</i><span class="menu-title" data-i18n="">Customers</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Customers'), [ 'controller' => 'Users', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Customer'), [ 'controller' => 'Users', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'merchants' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">person_pin</i><span class="menu-title" data-i18n="">Sellers</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Sellers'), [ 'controller' => 'Merchants', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Sellers'), [ 'controller' => 'Merchants', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'products' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_grocery_store</i><span class="menu-title" data-i18n="">Services </span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Services'), [ 'controller' => 'Products', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Services'), [ 'controller' => 'Products', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

 <?php
      $active = strtolower($this->request->getParam('controller')) == 'orders' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_mall</i><span class="menu-title" data-i18n="">Orders</span></a>
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
      $active = strtolower($this->request->getParam('controller'))  == 'brands' ? 'active' : '';
    ?>
    <li  style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_shipping</i><span class="menu-title" data-i18n="">Brands</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Brands'), [ 'controller' => 'Brands', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Brand'), [ 'controller' => 'Brands', 'action' => 'add']) ?>
          </li>
          
        </ul>
      </div>
    </li>

    
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'categories' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">view_module</i><span class="menu-title" data-i18n="">Service Categories</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Service Categories'), [ 'controller' => 'Categories', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Service Category'), [ 'controller' => 'Categories', 'action' => 'add']) ?>
          </li>
          
        </ul>
      </div>
    </li>

	
	<?php
      $active = strtolower($this->request->getParam('controller')) == 'coupons' ? 'active' : '';
    ?>
    <li style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Coupons</span></a>
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
      $active = strtolower($this->request->getParam('controller')) == 'orderpayments' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">local_parking</i><span class="menu-title" data-i18n="">Order Payments</span></a>
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
    <li style="display: none;" class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">star_half</i><span class="menu-title" data-i18n="">Merchant Transactions</span></a>
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
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="">Logout</span></a>
     

    </li>
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>