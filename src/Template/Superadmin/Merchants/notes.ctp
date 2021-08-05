<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Merchant[]|\Cake\Collection\CollectionInterface $merchants
 */
?>
<style>
.breadcrumbs-trail li {
   float: left;
   padding-left: 10px;
   font-size: 15px;
}
</style>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
      <?php
        $this->Breadcrumbs->add(
            'Home',
        );
        $this->Breadcrumbs->add([
            ['title' => 'All Order', 'url' => ['controller' => 'orders', 'action' => 'index']],
            ['title' => 'Current Viewed Order', 'url' => ['controller' => 'orders', 'action' => 'view',base64_decode($_GET['order_id'])]]
        ]);

        $this->Breadcrumbs->add(
            'Payments',
        );
        echo $this->Breadcrumbs->render(
            ['class' => 'breadcrumbs-trail'],
            ['separator' => '<i class="fa fa-angle-right"></i>']
        );
      ?>
    </div>
  </div>
</div> 

<div class="card card-tabs">
    <div class="card-content">
        <h5>Accept/Reject Payment to Merchant Against Order #<a href=""><?php echo base64_decode($_GET['order_id']); ?></a></h5>
        <br>
        <br>
        <table  class="bordered">
            <thead>
                <tr class="row-bg">
                    <th>SNo.</th>
                    <th>Payment Reason</th>
                    <th>Amount</th>
                    <th>Created Date</th>
                    <th>Comment</th>
                    <th>Approved/Declined On</th>
                    <th>Action</th>
                </tr>
            </thead>
          
            <tbody>
                <?php $i=1; foreach ($OrderNotifications as $OrderNotification) {
                        $data=unserialize($OrderNotification->message); ?>
                        <tr>
                               <td>#<?= $i; ?></td> 
                               <td><?= $data['prefix']; ?></td> 
                               <td>₹<?= $data['amount']; ?></td> 
                               <td><?= date_format($OrderNotification->created, "d/m/Y h:i:A"); ?></td>
                                <td>
                                    <?php if($OrderNotification->payment_status==""){?>
                                        <input type="text" class="PaymentReply-<?=$OrderNotification->id?>" />
                                    <?php }else{?>
                                        <span><?=$OrderNotification->payment_reply?></span>
                                    <?php }?>
                                </td> 
                                <td>
                                    <?php if($OrderNotification->payment_status==""){?>
                                        -
                                    <?php }else{?>
                                        <span><?= date_format($OrderNotification->modified, "d/m/Y h:i:A"); ?></span>
                                    <?php }?>
                                </td> 
                               <td>
                                  <?php if($OrderNotification->payment_status==""){?>
                                    <button type="button" class="btn release-payment" id="accept" data-id="<?= $OrderNotification->id; ?>">Accept</button>
                                    &nbsp;&nbsp;&nbsp;<br>
                                    <button type="button" class="btn release-payment" id="reject" data-id="<?= $OrderNotification->id; ?>">Reject&nbsp;</button>
                                    <img id="submitloader<?= $OrderNotification->id; ?>" src="https://easifyy.com/images/loader-orange.gif" style="display:none;" width="50" height="50">
                                    <?php }else{?>
                                    <?php if($OrderNotification->payment_status==1): ?>
                                        <span class="badge badge-success">Accepted</span>
                                    <?php elseif($OrderNotification->payment_status==0):?>
                                        <span class="badge badge-danger">Rejected</span>
                                    <?php endif; ?> 
                                    <?php }?>
                               </td>
                               
                        </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
        
    </div>
    
</div>
