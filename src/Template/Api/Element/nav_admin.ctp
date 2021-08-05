
  <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><span class="logo-text hide-on-med-and-down">PRIMCO.CA</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
  </div>
  <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
    
    <!-- <li class="active bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span><span class="badge badge pill orange float-right mr-10">3</span></a>
    </li>
 -->

    <?php
      $active = strtolower($this->request->params['controller']) == 'orders' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Orders</span></a>
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
      $active = strtolower($this->request->params['controller']) == 'customers' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Customer</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Customers'), [ 'controller' => 'Customers', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Customer'), [ 'controller' => 'Customers', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->params['controller']) == 'salesmen' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Salesmen</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Salesmen'), [ 'controller' => 'Salesmen', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Salesman'), [ 'controller' => 'Salesmen', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->params['controller']) == 'products' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Products </span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Products'), [ 'controller' => 'Products', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Product'), [ 'controller' => 'Products', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>


     <?php
      $active = strtolower($this->request->params['controller']) == 'meetings' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Meetings</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Meetings'), [ 'controller' => 'Meetings', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Meeting By Sales Rep'), [ 'controller' => 'Meetings', 'action' => 'add']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Meeting By Customer'), [ 'controller' => 'Meetings', 'action' => 'addcustomer']) ?>
          </li>
        </ul>
      </div>
    </li>

    
    <?php
      $active = strtolower($this->request->params['controller']) == 'events' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Events</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Events'), [ 'controller' => 'Events', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Event'), [ 'controller' => 'Events', 'action' => 'add']) ?>
          </li>
          
        </ul>
      </div>
    </li>

   
   <?php
      $active = strtolower($this->request->params['controller']) == 'credit-applications' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Credit Applications</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Credit Applications'), [ 'controller' => 'CreditApplications', 'action' => 'index']) ?>
          </li>
          <!--li>
              <?= $this->Html->link(__('New Salesman'), [ 'controller' => 'Salesmen', 'action' => 'add']) ?>
          </li -->
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->params['controller']) == 'claims' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="">Claims</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Claims'), [ 'controller' => 'Claims', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Claim'), [ 'controller' => 'Claims', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>


    
    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="">Logout</span></a>
     

    </li>
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>