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

<!-- Gst Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog py-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="www.google.com" class="pdf-Modal" > </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">Close</button>
        <a  class="btn btn-primary pdf-download mx-2" href="" download>download Pdf</a>
        <button type="button" id="sendInvoicetoUser" data-value="<?php echo $order->id; ?>" class="btn btn-primary mx-2 hide">Send Pdf</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModalGst" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog py-5" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="www.google.com" class="pdf-Modal-gst" > </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">Close</button>
        <a  class="btn btn-primary pdf-download-gst mx-2" href="" download>download Pdf</a>
        <button type="button" id="sendInvoicetoUserGst" data-value="<?php echo $order->id; ?>" class="btn btn-primary mx-2 hide">Send Pdf</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<div class="card card-tabs">
    <div class="card-content">
        <div class="row pb-1">
      <?php
        $this->Breadcrumbs->add(
            'Home',
        );
        $this->Breadcrumbs->add([
            ['title' => 'Dashboard', 'url' => ['controller' => 'users', 'action' => 'dashboard']],
            ['title' => 'In Progress Order', 'url' => ['controller' => 'orders', 'action' => 'inProgress']],
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

    <div class="col-md-9">
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
                <div class="card-text">
                    <div class="text-left pl-md-3">
                        <label class="m-md-0">
                            <h5><?php echo __('Client Information'); ?></h5>
                        </label>
                        <p style="color:#000" class="font-weight-bold">
                            <?= $order->user->first_name ?> <?= $order->user->last_name ?><br>
                            <!--<?= $order->user->username ?>-->
                        </p>

                    </div>
                </div>
                <div class="card-text clear row text-left">
                    <label class="col-md-6">
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
                            <!--<p>
                                <?php echo __('IGST'); ?>: 0.00 <br>
                                <?php echo __('CGST'); ?>: 0.00 <br>
                                <?php echo __('SGST'); ?>: 0.00 <br>
                            </p>-->
                        <?php endif; ?>

                    </div>
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
                        <h5><a href="https://easifyy.com/service-details/<?php echo $order_product->slug; ?>" target="_blank"><?php echo $order_product->title; ?></a></h5>
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
                            <li><i class="fa fa-angle-right about-list-arrows"></i><?= h($incPoint) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Order status</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <!--<label>Order status <span class="badge badge-<?= $order_status_color ?>"><?= $order->order_status->name ?></span></label><br>-->
                    <?= $this->Form->create($order) ?>
                    <?php $this->Form->select('order_status_id', $order_statuses, array('class' => '', 'empty' => 'Select order status', 'label' => false, "placeholder" => "Order status", 'div' => false, 'required')); ?>
                </div>
                <div class="row">
                    <?php if($order->order_status->id==3) { ?>
                        <div class="col-12">
                            <a class="btn btn col-12 p-0" id="beforeCompleteStatus1" data-value="<?= $order->id; ?>" href="https://easifyy.com/admin/orders/review?user=<?= base64_encode(($order->user_id)); ?>&order=<?= base64_encode($order->id); ?>">
                                Order Documents
                            </a>
                        </div>
                    <?php }else{?>
                        <div class="col-12">
                            <a href="https://easifyy.com/admin/orders/summery/?user=<?= base64_encode($order->user_id); ?>&order=<?= base64_encode($order->id); ?>&type=view" class="btn col-12">Create Status</a>
                        </div>
                    <?php }?>
                    <!--<div class="col-12 mt-md-3 mb-md-2">
                        <a href="https://easifyy.com/admin/orders/payment?user=<?= base64_encode($order->user_id); ?>&order=<?= base64_encode($order->id); ?>" class="btn col-12">REQUEST PAYMENT</a>
                    </div>
                    <div class="col-12 mt-md-3 mb-md-2">
                        <a href="https://easifyy.com/admin/orders/review?user=<?= base64_encode($order->user_id); ?>&order=<?= base64_encode($order->id); ?>" class="btn btn col-12 p-0" id="completeStatus" data-value="<?php echo $order->id; ?>">
                            Complete Order 
                        </a>
                    </div>-->
                    <?php if($order->order_status->id==3) { ?>
                        <input type="hidden" value="<?php echo $token; ?>" id="_csrfToken">
                        
                        <?php if($order->order_pdf!=""):?>
                        <div class="download-invoice"></div>
                        <div class="col-12 mt-md-3 mb-md-2">
                            <a style="font-size: .8rem;" class="btn btn col-12" target="_blank" href="https://easifyy.com/pdf/<?=$order->order_pdf ?>">
                            Generate PSP Invoice 
                                </a>
                        </div>    
                        <?php endif; ?>

                        <?php if($order->user_invoice_pdf!=""):?>
                            <div class="col-12 mt-md-3 mb-md-2">
                                <a style="font-size: .8rem;" class="btn btn col-12" target="_blank" href="https://easifyy.com/pdf/<?=$order->user_invoice_pdf ?>">
                                Download User Invoice
                                </a>
                            </div>
                        <?php endif;?>
                        <!-- <div class="download-invoice">
                        </div> -->
                        <!-- <div class="spinner-wrap" style="display: none;">
                            <div class="spinner-border" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                            Genrating Invoice...
                        </div> -->
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="card" style="display: none;">
            <h5 class="card-header m-0">Notes</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <div class="danger">
                        <p><strong>Danger!</strong> Some text...</p>
                    </div>

                    <div class="success">
                        <p><strong>Success!</strong> Some text...</p>
                    </div>

                    <div class="info">
                        <p><strong>Info!</strong> Some text...</p>
                    </div>

                    <div class="warning">
                        <p><strong>Warning!</strong> Some text...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>