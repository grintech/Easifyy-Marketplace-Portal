<style>
   .dropdown-menu.notificationDiv.show {
      height: 400px !important;
      overflow-x: auto;
      background-color: #7753ea !important;
  }
  .notificationDiv a {
    color: #fff !important;
    padding: 0px 10px 0px 10px !important;
    line-height: 2.0rem !important;
  }
  nav ul a:hover {
      color: #000 !important;
  }
</style>
<?php
// PSP Header 
if ($this->Session->read('Auth.User')){
  $userData=$this->Session->read('Auth.User');
  if($userData['role']=='admin'){
    $userID=$userData['id'];
    $profileStatus=$this->Site->get_user_profile_status($userID);
  }
  if($profileStatus!="100"){
    $unclickable='onclick="alert(\'Please Complete your Profile First\');return false;"';
    $unclickable='onclick="var r=confirm(\'If you click OK , than  you will be redirected to Complete Profile Page\');if (r == true) {window.location.href=\'https://easifyy.com/admin/merchants/profile-setup\';} else {return false;}return false;"';

  }else{
    $clickable='';
  }

                  
  $unReadOrders =$this->Site->getPspOrderNotification($userID);
  $order_notifications="";$order_notifications_count=0;
  foreach($unReadOrders as $orderId => $invoiveNo) {
    $order_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($orderId)."?viewed=true' style='color:#000'> Congratulation you got a new order with Order No. #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
    $order_notifications_count++;
  }

  $unReadNotifications =$this->Site->getPSPNotification($userID);
  $order_notes_notifications="";$order_notes_notifications_count=0;
  foreach($unReadNotifications as $unReadNotification) {
    //echo "<pre>";print_r( $unReadNotification);echo "</pre>";
    if($unReadNotification->type=="inivation-accepted"){
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($unReadNotification->order_id)."?isView=true' style='color:#000'> Thanks for Accepting Order with  the Order Id: #$unReadNotification->order_id  <!--<span class='time'> 1s ago </span>--></a></li>";
      $order_notes_notifications_count++;
    }
    if($unReadNotification->type=="dues-clear"){
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($unReadNotification->order_id)."?duesClear=true' style='color:#000'> Thanks for clearing your dues against the  Order Id: #$unReadNotification->order_id . We dedicated to finish your order ASAP. <!--<span class='time'> 1s ago </span>--></a></li>";
      $order_notes_notifications_count++;
    }
    if($unReadNotification->type=="msg-from-user-to-psp"){
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($unReadNotification->order_id)."?newMessage=true' style='color:#000'> New Message from User against the order #$unReadNotification->order_id</a></li>";
      $order_notes_notifications_count++;
    }
  }
  $totalNotification = $order_notifications_count+ $order_notes_notifications_count;

}
?>
<header class="page-topbar" id="header">
  <div>
    <!-- class="navbar navbar-fixed"  <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light" style="background-color: #cbc0d3;">
      <div class="nav-wrapper">
        <div class="header-search-wrapper hide-on-med-and-down my-0 py-0">
        
          <h3 class="mt-0"><a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']) ?>"><?= __('Dashboard') ?></a></h3>
        </div>
      </div>   
    </nav>-->
    <nav class="navbar navbar-expand-lg navbar-light dashboard-nav" style="background:#ffffff">
      <a class="navbar-brand dashboard-logo" href="https://easifyy.com/"><img src="/img/logo.png" alt="mindzpro"></a>
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <!--<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profile
            </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'profileSetup']) ?>">Create / View/ Edit Profile</a>
              <!--<a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'storeSettings']) ?>">Setting/Edit</a>-->
            <!--<a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'bankDetails']) ?>">Bank Details</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'MerchantKycs', 'action' => 'add']) ?>">kyc</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Reviews', 'action' => 'index']) ?>">Reviews</a>
              <<a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'guidelines']) ?>">SOP & Mandatory Guidelines</a>
            </div>-->
          </li>
          <a href="/admin/users/dashboard" class="nav-link">Dashboard</a>
          <li class="nav-item dropdown">
            <a class="nav-link" href="/users/dashboard" target="_blank">
              Switch to Buying 
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Professional Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'selectService']) ?>">Quick Activate Services</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'activateService']) ?>">Activate Existing Services</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'customService']) ?>">Make Custom Services</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'index']) ?>">Submitted Services</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Order
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'inProgress']) ?>">In-Progress Orders</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'completed']) ?>">Completed Orders</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'refunded']) ?>">Refunded Order</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'history']) ?>">Order History</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Blogs
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'index']) ?>">View All Blogs</a>
              <a class="dropdown-item" <?=$unclickable?> href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'add']) ?>">Add Blog</a>
            </div>
          </li>

          <li class="nav-item dropdown notification mr-xl-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell" aria-hidden="true"></i>
            <span class="notification-badge"><?=$totalNotification?></span>
            </a>
            <ul class="dropdown-menu notificationDiv" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <!--<li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit.</li>
              <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit.</li>
              <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit.</li>-->
              <?php

                //echo "<pre>";print_r( $profileStatus);echo "</pre>";

                if($totalNotification>0){
                  echo $order_notifications;
                  echo $order_notes_notifications;
                  /*foreach($unReadOrders as $orderId => $invoiveNo) {
                    echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($orderId)."?viewed=true' style='color:#000'> Congratulation you got a new order with Invoice No. #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
                  }
                  foreach($unReadNotifications as $unReadNotification) {
                    //echo "<pre>";print_r( $unReadNotification);echo "</pre>";
                    if($unReadNotification->type=="inivation-accepted"){
                      echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($unReadNotification->order_id)."?viewed=true' style='color:#000'> Thanks for Accepting Order with  the Invoice Id: #$unReadNotification->order_id  <!--<span class='time'> 1s ago </span>--></a></li>";
                    }
                    if($unReadNotification->type=="dues-clear"){
                      echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($unReadNotification->order_id)."?viewed=true' style='color:#000'> Thanks for clearing your dues against the  Invoice Id: #$unReadNotification->order_id . We dedicated to finish your order ASAP. <!--<span class='time'> 1s ago </span>--></a></li>";
                    }
                    if($notification->type=="msg-from-user-to-psp"){
                      $order_notes_notifications .= "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/admin/orders/view/".base64_encode($notification->order_id)."&isView=true' style='color:#000'> New Message from User against the order #$notification->order_id</a></li>";
                      $order_notes_notifications_count++;
                    }
                  }*/

                }else{
                  echo "<li><a>No new Notofcations !!!</a></li>";
                }
              ?>
            </ul>
          </li>
          <li class="nav-item dropdown login">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <?php if($profileStatus!="100"){?>
                <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'profileSetup']) ?>">Complete Profile</a>
              <?php }?>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'profileModify']) ?>">Edit Profile</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Merchants', 'action' => 'profilePreview']) ?>">My Profile</a>
              <a class="dropdown-item" href="#">Submit Blogs</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'invoiceSettlements']) ?>">Invoicing & Settlements</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'helpCenter']) ?>">Help</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build([ 'controller' => 'Users', 'action' => 'changePassword']) ?>">Change Password</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'logout', 'prefix' => false]) ?>">Logout</a>

              <!--<a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'OrderPayments', 'action' => 'index']) ?>">Order Payments</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'MerchantTransactions', 'action' => 'index']) ?>">Transactions</a>-->
            </div>
          </li>
          <!--<a class="nav-item nav-link top-admin-nav" href="<?php echo $this->Url->build(['controller' => 'Orders', 'action' => 'index']) ?>">Orders</a>-->
        </ul>
      </div>
    </nav>
  </div>
</header>