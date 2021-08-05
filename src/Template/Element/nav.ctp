<style>
  ul.navbar-nav.ml-auto {
    align-items: end !important;
  }
  </style>
  
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-rounded">
  <div class="small-bbutton">
    <button id="small"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <button id="big" style="display:none"><i class="fa fa-th-list" aria-hidden="true"></i></button>
  </div>
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a href="<?php echo BASE_URL; ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/img/logo.png" alt="MindZpro"></a>
    </h1>
  </div>
  <ul style="overflow-y: auto;" class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="accordion">
    <?php
      $active = strtolower($this->request->getParam('controller')) == 'users' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsibleheader waves-effect waves-cyan " href="<?php echo BASE_URL; ?>superadmin/users/dashboard"><i class="material-icons">dashboard</i>
        <span class="menu-title" data-i18n="">Dashboard</span>
      </a>
      
    </li>
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
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="material-icons">person_pin</i><span class="menu-title" data-i18n="">PSP</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All PSP'), [ 'controller' => 'Merchants', 'action' => 'index']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New PSP'), [ 'controller' => 'Merchants', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'products' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-list" aria-hidden="true"></i><span class="menu-title" data-i18n="">Services </span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Services'), [ 'controller' => 'Products', 'action' => 'index']) ?>
          </li>
          <li>
          <li>
              <?= $this->Html->link(__('All Business Support'), [ 'controller' => 'BusinessSupport', 'action' => 'index']) ?>
          </li>
          <li>
            <?= $this->Html->link(__('PSP Services'), [ 'controller' => 'Products', 'action' => 'pspServices']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Services'), [ 'controller' => 'Products', 'action' => 'add']) ?>
          </li>
          <li>
              <?= $this->Html->link(__('New Business Support'), [ 'controller' => 'BusinessSupport', 'action' => 'add']) ?>
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
      $active = strtolower($this->request->getParam('controller')) == 'orders' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>"><a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="menu-title" data-i18n="">Orders</span></a>
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
      $active = strtolower($this->request->getParam('controller')) == 'coupons' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
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
    <li class="bold <?= $active ?>" style="display:none;">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-inr" aria-hidden="true"></i><span class="menu-title" data-i18n="">Pending Payments</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('Pending cleared Payments'), [ 'controller' => 'OrderPayments', 'action' => 'index']) ?>
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


    <?php
      $active = strtolower($this->request->getParam('controller')) == 'Merchantkycs' ? 'active' : '';
    ?>
    <!--<li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-check-square-o" aria-hidden="true"></i><span class="menu-title" data-i18n="">kyc Requests</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Requets'), [ 'controller' => 'Merchantkycs', 'action' => 'index']) ?>
          </li>
        </ul>
      </div>
    </li>-->

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'Blogs' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-comment" aria-hidden="true"></i><span class="menu-title" data-i18n="">Blogs</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Blogs'), [ 'controller' => 'Blogs', 'action' => 'index']) ?>
          </li>
          <li>
            <?= $this->Html->link(__('Guest Blogs'), [ 'controller' => 'Blogs', 'action' => 'guestBlogs']) ?>
          </li>
          <li>
            <?= $this->Html->link(__('Add New'), [ 'controller' => 'Blogs', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'Articles' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-newspaper-o" aria-hidden="true"></i><span class="menu-title" data-i18n="">Articles</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Articles'), [ 'controller' => 'Articles', 'action' => 'index']) ?>
          </li>
          <li>
            <?= $this->Html->link(__('Add New'), [ 'controller' => 'Articles', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'Faq' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-question-circle" aria-hidden="true"></i><span class="menu-title" data-i18n="">Faq</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Faq'), [ 'controller' => 'Faq', 'action' => 'index']) ?>
          </li>
          <li>
            <?= $this->Html->link(__('Add Faq'), [ 'controller' => 'Faq', 'action' => 'add']) ?>
          </li>
        </ul>
      </div>
    </li>

    <?php
      $active = strtolower($this->request->getParam('controller')) == 'ContactUs' ? 'active' : '';
    ?>
    <li class="bold <?= $active ?>">
      <a class="collapsible-header waves-effect waves-cyan " href="javascript:void(0)"><i class="fa fa-address-book"></i></i><span class="menu-title" data-i18n="">Contact-Us</span></a>
      <div class="collapsible-body">
        <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          <li>
            <?= $this->Html->link(__('All Contact-Us'), [ 'controller' => 'ContactUs', 'action' => 'index']) ?>
          </li>
          <li>
            <a href="<?php echo $this->Url->build([ 'controller' => 'ContactUs', 'action' => 'businessPacakge', 'prefix' => "superadmin"]) ?>">
              Business Support Query
            </a>
          </li>
        </ul>
      </div>
    </li>


    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Newsletter', 'action' => 'index', 'prefix' => "superadmin"]) ?>"><i class="fa fa-users" aria-hidden="true"></i><span class="menu-title" data-i18n="">Newsletter Subscribers</span></a>
    </li>

    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'YoutubeVideos', 'action' => 'index', 'prefix' => "superadmin"]) ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i><span class="menu-title" data-i18n="">Help Center Videos </span></a>
    </li>
    
    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'changePassword', 'prefix' => "superadmin"]) ?>"><i class="fa fa-cogs" aria-hidden="true"></i><span class="menu-title" data-i18n="">Change password</span></a>
    </li>
    <li class="bold">
      <a class="waves-effect waves-cyan " href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>"><i class="fa fa-sign-out" aria-hidden="true"></i><span class="menu-title" data-i18n="">Logout</span></a>
    </li>
  </ul>
  <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
<script>
  $("#small").click(function(){
  $(".sidenav-main").addClass("small");
  $(".sidenav-main").removeClass("big");
  $("#big").css("display","block");
  $("#small").css("display","none");
  $("#main").css("padding-left","80px");
});

$("#big").click(function(){
  $(".sidenav-main").removeClass("small");
  $(".sidenav-main").addClass("big");
  $("#small").css("display","block");
  $("#big").css("display","none");
  $("#main").css("padding-left","250px");
});
</script>
</aside>