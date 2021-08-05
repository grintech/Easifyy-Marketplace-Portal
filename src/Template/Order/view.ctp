<?php
// echo '<pre>';
//     print_r($order); 
// echo '</pre>';
// die();
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<style type="text/css">
    .dashboard-nav {
        position: inherit !important;
    }
    .breadcrumbs-trail li {
      float: left;
      padding-left: 10px;
      font-size: 15px;
    }
</style>
<br><br>
<?php
    // echo '<pre>'; print_r($order); echo '</pre>';
    // die();
?>
<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
      <?php
        $this->Breadcrumbs->add(
            'Home',
        );
        $this->Breadcrumbs->add([
            ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
            ['title' => 'In Progress Order', 'url' => ['controller' => 'order', 'action' => 'inProgress']],
            //['title' => 'Order', 'url' => ['controller' => 'orders', 'action' => 'view', $_GET['order']]]
        ]);
        $this->Breadcrumbs->add(
            'View',
        );
        echo $this->Breadcrumbs->render(
            ['class' => 'breadcrumbs-trail'],
            ['separator' => '<i class="fa fa-angle-right"></i>']
        );
      ?>
    </div>
  </div>
</div>  
<div class="row">
    <input type="hidden" id="counter" value="1">

    <div class="col-md-10 mx-auto">
        <div class="card">
            <h5 class="card-header m-0">
                <?php echo __('Order'); ?> #<?= h($order->id) ?> <?php echo __('details'); ?>
                <?php
                $order_status_color = "secondary";
                if (strtolower($order->order_status->name) == 'processing') {
                    $order_status_color = "warning";
                } else if (strtolower($order->order_status->name) == 'accepted') {
                    $order_status_color = "primary";
                } else if (strtolower($order->order_status->name) == 'on the way') {
                    $order_status_color = "info";
                } else if (strtolower($order->order_status->name) == 'pending') {
                    $order_status_color = "light";
                } else if (strtolower($order->order_status->name) == 'completed') {
                    $order_status_color = "success";
                } else if (strtolower($order->order_status->name) == 'cancel') {
                    $order_status_color = "danger";
                }
                ?>
                <span class="badge badge-<?= $order_status_color ?>" style="color:#000"><?= $order->order_status->name ?></span>
            </h5>
            <div class="card-body">
                <!-- <div class="row ">
                    <span class="px-3">
                        <h5><?php echo __('Invoice No'); ?></h5>
                    </span>
                    <p style="color:#000" class="font-weight-bold py-3 my-0">
                        <?= h($order->invoice_id) ?>
                    </p>
                </div> -->
                <!--<div class="card-text">
                    <div class="text-left pl-md-3">
                        <label class="m-md-0">
                            <h5><?php echo __('Client Information'); ?></h5>
                        </label>
                        <p style="color:#000" class="font-weight-bold">
                            <?= $order->user->first_name ?> <?= $order->user->last_name ?><br>
                            <?= $order->user->username ?>
                        </p>

                    </div>
                </div>-->
                <div class="card-text clear row text-left">
                    <!--<label class="col-md-6">
                        <h5><?php echo __('Tax and Payment details'); ?>:</h5>
                    </label>
                    <?php if($order->gst_no!=""){?>
                        <label class="col-md-12 py-3">
                            <h6>Customer GST Details</h6>
                            <label><?=$order->gst_no?></label>,
                            <label><?=$order->gst_name?></label>,
                            <label><?=$order->gst_address?></label>,
                            <label><?=$order->gst_state?></label>
                        </label>
                    <?php }?>
                    <br>
                    <div class="col-md-4 text-left">
                        <label>
                            <h5><?php echo __('Taxes'); ?></h5>
                        </label>
                        <?php if(!empty($order->gst_name)): ?>
                            <p>
                                <?php echo __('IGST'); ?>: <?= $this->Number->currency($iGst, 'INR') ?><br>
                                <?php echo __('CGST'); ?>: <?= $this->Number->currency($cGst, 'INR') ?><br>
                                <?php echo __('SGST'); ?>: <?= $this->Number->currency($sGst, 'INR') ?><br>
                            </p>
                        <?php else: ?>
                            <p>
                                <?php echo __('IGST'); ?>: 0.00 <br>
                                <?php echo __('CGST'); ?>: 0.00 <br>
                                <?php echo __('SGST'); ?>: 0.00 <br>
                            </p>
                        <?php endif; ?>
                    </div>-->
                    <div class="col-md-4 text-left">
                        <label>
                            <h5><?php echo __('Other details'); ?></h5>
                        </label>
                        <p>
                            <?php echo __('Gross Total'); ?>:
                            <?= $this->Number->currency($order->gross_total, 'INR') ?><br>
                            
                        </p>
                    </div>
                    <div class="col-md-4 text-left">
                        <label>
                            <h5><?php echo __('Date and Time'); ?></h5>
                        </label><br>
                        <?php echo __('Order time'); ?>: <?= date('d M Y h:i a', strtotime($order->created)) ?><br>
                        <?php echo __('Last modified'); ?>: <?= date('d M Y h:i a', strtotime($order->modified)) ?><br>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Service details'); ?></h5>
            <div class="card-body">
                <div class="card-text" style="text-align: left;">
                    <div class="float-left w-100">
                        <span style="float: right;"><b>Plan Name: </b><span class="badge badge-success"><?php echo strtoupper($order->order_mode['name']); ?></span></span>
                        <h5><a class="p-color" href="https://easifyy.com/service-details/<?php echo $order_product->slug; ?>" target="_blank"><?php echo $order_product->title; ?></a></h5>
                    </div>
                    <div class="float-left w-100">
                        <h5>Services Inclusions</h5>
                        <!--<p><?php echo $order_product->service_coverd; ?></p>-->
                        <ul class="list-checkmarks">
                            <?php $incPoints = explode("\n", trim($order_product->service_coverd));
                                foreach ($incPoints as $incPoint): ?>
                                <li><i class="fa fa-angle-right about-list-arrows"></i> <?= $incPoint ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <h5>Who Should take Services</h5>
                        <!--<p><?php echo $order_product->service_target; ?></p>-->
                        <ul class="list-checkmarks">
                            <?php $incPoints = explode("\n", trim($order_product->service_target));
                                foreach ($incPoints as $incPoint): ?>
                            <li><i class="fa fa-angle-right about-list-arrows"></i> <?= $incPoint ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <h5>How It's Works</h5>
                        <!--<p><?php echo $order_product->service_process; ?></p>-->
                        <ul class="list-checkmarks">
                            <?php $incPoints = explode("\n", trim($order_product->service_process));
                                foreach ($incPoints as $incPoint): ?>
                                <li><i class="fa fa-angle-right about-list-arrows"></i> <?= $incPoint ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <h5>Information Guide</h5>
                        <!--<p><?php echo $order_product->service_guide; ?></p>-->
                        <ul class="list-numbers list-checkmarks">
                            <?php $incPoints = explode("\n", trim($order_product->service_guide));
                                foreach ($incPoints as $incPoint): ?>
                            <li><i class="fa fa-angle-right about-list-arrows"></i> <?= h($incPoint) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>