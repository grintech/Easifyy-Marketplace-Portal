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
  if ($this->Session->read('Auth.User')){
    $userData=$this->Session->read('Auth.User');
    if($userData['role']=='user'){
      $userID=$userData['id'];
    }
  }
  $unReadOrders =$this->Site->getUserOrderNotification($userID);
  $order_notifications="";$order_notifications_count=0;
  foreach($unReadOrders as $orderId => $invoiveNo) {
    $order_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/view/". base64_encode($orderId)."?viewed=true' style='color:#000'> Congratulations Order placed Successfully with Invoice Id: #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
    $order_notifications_count++;
  }

  $ordersNotofications =$this->Site->getUserOrderNotifications($userID);
  $order_notes_notifications="";$order_notes_notifications_count=0;
  foreach($ordersNotofications as $orderNotofications) {
    foreach($orderNotofications['orders'] as $notifications) {
      foreach($notifications['notifications'] as $notification) {
        //echo "<pre>";print_r( $notification->type);echo "</pre>";
        if($notification->viewed_status==0){
          if($notification->type=="inivation-accepted"){
            $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/view/".base64_encode($notification->order_id)."?orderAccepted=true' style='color:#000'> Congratulations  Order Accepted by the PSP with the Invoice Id: #$notification->order_id  <!--<span class='time'> 1s ago </span>--></a></li>";
            $order_notes_notifications_count++;
          }
          if($notification->type=="dues-clear"){
            $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/view/".base64_encode($notification->order_id)."?duesClear=true' style='color:#000'> Thanks for clearing your dues against the  Invoice Id: #$notification->order_id . We dedicated to finish your Order ASAP. <!--<span class='time'> 1s ago </span>--></a></li>";
            $order_notes_notifications_count++;
          }
          if($notification->type=="msg-from-psp-to-user"){
            $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/summery/?order_id=".base64_encode($notification->order_id)."&isView=true' style='color:#000'> New Message from PSP against the Order #$notification->order_id</a></li>";
            $order_notes_notifications_count++;
          }
          if($notification->type=="pending-payment-from-user"){
            $message=$notification->message;
            $pendingAmt=explode("|",$message)[1];
            $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/summery/?order_id=".base64_encode($notification->order_id)."&p=".base64_encode($pendingAmt)."&partPaymentView=true' style='color:#000'> Please clear the dues towards the Order #$notification->order_id</a></li>";
            $order_notes_notifications_count++;  
          }
          if($notification->type=="order-marked-completed-by-psp"){
            $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/order/review?order=".base64_encode($notification->order_id)."&user=".base64_encode($notification->user_id)."&reViewDocs=true' style='color:#000'> PSP marked Order as Completed . Please Review the Documents against the Order #$notification->order_id</a></li>";
            $order_notes_notifications_count++;  
          }
        }
      }
    }
  }

  $totalNotification = $order_notifications_count+ $order_notes_notifications_count;
  //dd($ordersNotofications);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
          <a href="/users/dashboard" class="nav-link">Dashboard</a>
          <?php if($userData['role']=='admin'){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="https://easifyy.com/admin/users/dashboard" target="_blank">
              Switch to PSP 
            </a>
          </li>
          <?php } ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              My Orders
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Order', 'action' => 'inProgress']) ?>">In-Progress Orders</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Order', 'action' => 'completed']) ?>">Completed Orders</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Order', 'action' => 'refunded']) ?>">Refunded Orders</a>
            </div>
          </li>
          <li class="nav-item dropdown notification mr-xl-2">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bell" aria-hidden="true"></i>
              <span class="notification-badge"><?=$totalNotification?></span>
            </a>
            <ul class="dropdown-menu notificationDiv" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <?php 

                
                //echo "<pre>";print_r( $ordersNotofications);echo "</pre>";
                if($totalNotification>0){
                  /*foreach($unReadOrders as $orderId => $invoiveNo) {
                    echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/order/in-progress' style='color:#000'> Congratulations Order placed Successfully with Invoice Id: #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
                  }*/
                  echo $order_notifications;
                  echo $order_notes_notifications;
                  /*foreach($ordersNotofications as $orderNotofications) {
                    foreach($orderNotofications['orders'] as $notifications) {
                      foreach($notifications['notifications'] as $notification) {
                        //echo "<pre>";print_r( $notification->type);echo "</pre>";
                        if($notification->type=="inivation-accepted"){
                          echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/order/in-progress' style='color:#000'> Congratulations  Order Accepted by the PSP with the Invoice Id: #$notification->order_id  <!--<span class='time'> 1s ago </span>--></a></li>";
                        }
                        if($notification->type=="dues-clear"){
                          echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/order/in-progress' style='color:#000'> Thanks for clearing your dues against the  Invoice Id: #$notification->order_id . We dedicated to finish your order ASAP. <!--<span class='time'> 1s ago </span>--></a></li>";
                        }
                        if($notification->type=="msg-from-psp-to-user"){
                          echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/order/summery/?order_id=".base64_encode($notification->order_id)."&isView=true' style='color:#000'> New Message from PSP against the order #$notification->order_id</a></li>";
                        }
                      }
                    }
                  }*/
                }else{
                  echo "<li><a>No new Notifications !!!</a></li>";
                }
              ?>
              <!--<li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit. <span class="time"> 1s ago </span></a></li>
              <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit.<span class="time">10m ago</span></a></li>
              <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit.<span class="time">1h ago</span></a></li>
              -->
            </ul>
          </li>
          <li class="nav-item dropdown login">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto">
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'profile']) ?>">Edit Profile</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'profileView']) ?>">My Profile</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'add']) ?>">Add Blogs</a>
              <a class="dropdown-item" href="<?php echo $this->Url->build(['controller' => 'Blogs', 'action' => 'allBlogs']) ?>">View All Blogs</a>
              <!--<a class="dropdown-item" href="#">Invoicing & Settlements</a>-->
              <a class="dropdown-item" href="https://easifyy.com/users/help-center">Help Center</a>
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