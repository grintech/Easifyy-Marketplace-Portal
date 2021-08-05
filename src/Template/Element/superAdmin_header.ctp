 <style>
 .notification-badge {
  font-family: 'Muli', sans-serif;
  position: relative;
  top: -13px;
  right: -3px;
  margin: 0 -.8em;
  padding: 2px 5px;
  color: #fff;
  border-radius: 50%;
  background-color: #03a9f4;
  -webkit-box-shadow: 0 0 10px 0 #03a9f4;
  box-shadow: 0 0 10px 0 #03a9f4;
 }
 .notification {
    z-index: 99999999;
    position: absolute;
    top: 8px;
    right: 11px;
}
div#navbarNavAltMarkup {
    height: 52px;
}
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
  
  $unReadOrders =$this->Site->getAllOrderNotification();
  $order_notifications="";$order_notifications_count=0;
  foreach($unReadOrders as $orderId => $invoiveNo) {
    $order_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$orderId."?viewed=true' style='color:#000'> Congratulation new Order Placed on Easiffy with with Invoice No. #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
    $order_notifications_count++;
  }

  $unReadReviews =$this->Site->getReviewNotification();
  $review_notifications="";$review_notifications_count=0;
  foreach($unReadReviews as $orderId => $invoiveNo) {
    $review_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$invoiveNo."?orderCompleted=true' style='color:#000'> PSP Marked order as Completed with the  Order No. # $invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
    $review_notifications_count++;
  }

  $orderNotifications =$this->Site->getOrderNotifications();
  $order_notes_notifications="";$order_notes_notifications_count=0;
  foreach($orderNotifications as $type => $message) {
    if($message->type=="inivation-accepted"){
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$message->order_id."?invitationAccepted=true' style='color:#000'> PSP Accepted the invitation for the  Order No. # $message->order_id   <!--<span class='time'> 1s ago </span>--></a></li>";
      $order_notes_notifications_count++;
    }
    if($message->type=="dues-clear"){
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$message->order_id."?duesClear=true' style='color:#000'>Client Cleared the dues against the   Order No. # $message->order_id   <!--<span class='time'> 1s ago </span>--></a></li>";
      $order_notes_notifications_count++;
    }
    if($message->type=="payment-from-easifyy"){
      $merchant_id= $this->Site->get_merchant_id($message->user_id);
      $order_notes_notifications .= "<li style='border-bottom:1px #fff solid !important;'><a href='https://easifyy.com/superadmin/merchants/notes?merchant_id=".base64_encode($merchant_id)."&order_id=".base64_encode($message->order_id)."&paymentRequest=true' style='color:#000'>PSP Requested the Payment Against the Order No. # $message->order_id <!--<span class='time'> 1s ago </span>--></a></li>";
      $order_notes_notifications_count++;
    }
  }

  $totalNotification = $order_notifications_count +  $review_notifications_count + $order_notes_notifications_count;

 ?>
 <header class="page-topbar" id="header">
  <div> 
   <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light dashboard-nav" style="background-color: #cbc0d3;">
      <!-- <div class="nav-wrapper">
        <div class="header-search-wrapper hide-on-med-and-down my-0 py-0">
        
          <h3 class="mt-0"><a href="<?= $this->Url->build( [ 'controller' => 'Users', 'action' => 'dashboard']) ?>"><?= __('Dashboard') ?></a></h3>
        </div>
      </div>    -->
      <div class="navbar-collapse collapse show" id="navbarNavAltMarkup" style="">
        <ul class="navbar-nav ml-auto">
          <li class="back-btn">
              <a href="#" class="back-button"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</a><!--<script>window.history.back();</script>-->
          </li>
          <li class="nav-item dropdown notification mr-xl-2 mr-0">
            <a class="nav-link dropdown-toggle showNotification" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-bell" aria-hidden="true"></i>
              <span class="notification-badge"><?=$totalNotification?></span>
            </a>
            <ul class="dropdown-menu notificationDiv" aria-labelledby="navbarDropdown" style="right: 0 !important;left:auto;position:absolute !important">
                <?php 
                  //print_r($orderNotifications);
                  if($totalNotification>0){

                    echo $order_notifications;
                    echo $review_notifications;
                    echo $order_notes_notifications;
                    /*foreach($unReadOrders as $orderId => $invoiveNo) {
                      echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$orderId."?viewed=true' style='color:#000'> Congratulation new Order Placed on Easiffy with with Invoice No. #$invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
                    }
                    foreach($unReadReviews as $orderId => $invoiveNo) {
                      echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$invoiveNo."?review=true' style='color:#000'> PSP Marked order as Completed with the  Order No. # $invoiveNo  <!--<span class='time'> 1s ago </span>--></a></li>";
                    }
                    foreach($orderNotifications as $type => $message) {
                      if($message->type=="inivation-accepted"){
                        echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$message->order_id."?view=true' style='color:#000'> PSP Accepted the invitation for the  Order No. # $message->order_id   <!--<span class='time'> 1s ago </span>--></a></li>";
                      }
                      if($message->type=="dues-clear"){
                        echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$message->order_id."?view=true' style='color:#000'>Client Cleared the dues against the   Order No. # $message->order_id   <!--<span class='time'> 1s ago </span>--></a></li>";
                      }
                      if($message->type=="payment-from-easifyy"){
                        echo "<li style='border-bottom:1px #8e43e7 solid !important;'><a href='https://easifyy.com/superadmin/orders/view/".$message->order_id."?view=true' style='color:#000'>PSP Requested the Payment Against the Order No. # $message->order_id   <!--<span class='time'> 1s ago </span>--></a></li>";
                      }
                    }*/
                  }else{
                    echo "<li><a>No new notifications !!!</a></li>";
                  }
                ?>
                <!--<li><a> Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit. <!--<span class="time"> 1s ago </span></a></li>
                <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit. <!--<span class="time"> 1s ago </span></a></li>
                <li><a>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat vel quisquam harum et! Delectus iste culpa id. Nulla suscipit. <!--<span class="time"> 1s ago </span></a></li>-->
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header> 