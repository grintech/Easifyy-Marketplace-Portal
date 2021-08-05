 <header class="page-topbar" id="header">
  <div> 
    <!-- class="navbar navbar-fixed"  <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light" style="background-color: #cbc0d3;">
      <div class="nav-wrapper">
        <div class="header-search-wrapper hide-on-med-and-down my-0 py-0">
        
          <h3 class="mt-0"><a href="<?= $this->Url->build( [ 'controller' => 'Users', 'action' => 'dashboard']) ?>"><?= __('Dashboard') ?></a></h3>
        </div>
      </div>   
    </nav>-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin: 0px auto 0 270px;width:80%">
      <a class="navbar-brand" href="<?= $this->Url->build( [ 'controller' => 'Users', 'action' => 'dashboard']) ?>">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="<?php echo $this->Url->build([ 'controller' => 'Merchants', 'action' => 'storeSettings']) ?>">Profile</a>
          <a class="nav-item nav-link" href="<?php echo $this->Url->build([ 'controller' => 'MerchantProducts', 'action' => 'addCustomProduct']) ?>">Choose Services</a>
          <a class="nav-item nav-link" href="<?php echo $this->Url->build([ 'controller' => 'MerchantProducts', 'action' => 'customProduct']) ?>">Custom Service</a>
          <a class="nav-item nav-link" href="<?php echo $this->Url->build([ 'controller' => 'Orders', 'action' => 'index']) ?>">Orders</a>
        </div>
      </div>
    </nav>
  </div>
</header> 