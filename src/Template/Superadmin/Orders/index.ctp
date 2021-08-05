<link  href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" >
<link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">
<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<style>
    .filters .input.select {
        max-width: 100% !important;
    }

    .filters {
        float: left;
    }

    .dashorder-table th {
        font-size: 12px;
    }

    td {
        font-size: 12px;
    }

    span.badge.badge-success {
        font-size: 12px;
        font-weight: 100;
    }

    span.badge.badge-warning {
        font-size: 12px;
        font-weight: 100;
    }

    span.badge.badge-secondary {
    font-size: 12px;
    font-weight: 100;
}
span.badge.badge-dark{
    font-size: 12px;
    font-weight: 100;
}
</style>
<div class="card card-tabs" style="z-index: 99;">
    <div class="card-content">
        <div class="row">
            <label>
                <h5><b>PSP Assignment</b></h5>
            </label>
            <input type="hidden" name="token" value="<?= $token; ?>" id="_csrfToken">
            <div class="form-check col-2 mx-3 py-3">
                <input class="form-check-input pspradio" type="radio" name="exampleRadios" id="exampleRadios1" value="automatically" checked style="width: auto;" <?php if ($row['meta_value'] == 'automatically') {                                                                                                                                            } ?>>
                <label class="form-check-label" for="exampleRadios1">
                    Automatically
                </label>
            </div>
            <div class="form-check col-2 mx-3 py-3">
                <input class="form-check-input pspradio" type="radio" name="exampleRadios" id="exampleRadios2" value="manually" style="width: auto;" <?php if ($row['meta_value'] == 'manually') {                                                                                                                            } ?>>
                <label class="form-check-label" for="exampleRadios2">
                    Manually
                </label>
            </div>
        </div>
        <div class="card card-tabs" style="z-index: 99;">
            <div class="card-content">
                <!-- Orders Filters Start -->
                <?php
                $options = array();
                $options['1'] = 'Processing';$options['2'] = 'In Progress'; $options['3'] = 'Completed';$options['5'] = 'Pending';$options['6'] = 'Cancel';$options['7'] = 'Refunded';

                $date_options = array();
                $date_options['asc'] = 'ASC';$date_options['desc'] = 'DESC';

                $order_mode_filter = array();
                $order_mode_filter['asc'] = 'Price Low to High';$order_mode_filter['desc'] = 'Price High to Low';
                ?>
                <?= $this->Form->create() ?>
                    <div class="row">
                        <div class="col-md-4 filters"><?= $this->Form->input('order_status_id', ['options' => $options, 'empty' => true, 'label' => __('Select Order Type')]) ?></div>
                        <div class="col-md-4 filters"><?= $this->Form->input('created', ['options' => $date_options, 'empty' => true, 'label' => __('Sort by Date')]) ?></div>
                        <div class="col-md-4 filters"><?= $this->Form->input('gross_total', ['options' => $order_mode_filter, 'empty' => true, 'label' => __('Price')]) ?></div>
                        <div class="col-md-12 text-right" style="padding-top:24px; padding-right:24px;"><?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?></div>
                    </div>
                <?= $this->Form->end() ?>

            <!-- Orders Filters End -->

            </div>
        </div>
    </div>
</div>

<div class="card card-tabs">
    <div class="card-content dashorder-table">
        <table cellpadding="0" cellspacing="0" class="responsive-table bordered" id="order-datatable" >
            <thead>
                <tr class="row-bg">
                    <th scope="col">S.No.</th>
                    <th width="12%" scope="col">Order ID</th>
                    <th style="width: 39%;" scope="col"><?= $this->Paginator->sort('Service Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Plans') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('PSP Name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Customer') ?></th>
                    <th scope="col" width="9%"><?= $this->Paginator->sort('Total') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Received') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Pending') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('Coupon') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('order_status_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col" class="actions" width="100%"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($orders as $order) : ?>
                    <tr>
                        <?php
                        
                        $merchantName = "Not Assigned";
                        $badge = "badge-secondary";
                        if ($order->merchant['store_name']) {
                            $badge = "badge-success";
                            $merchantName = $order->merchant['store_name'] . ' ' . $order->merchant['last_name'];
                        }
                        $totalAmount =$order->total ;
                        if($order->gst_name!=""){
                            $totalAmount= $totalAmount + round(($order->taxable_amount * 18)/100);
                        }
                        //if($order->gst_name!=$order->gst_name)
                        ?>
                        <td><?= $i; ?>.)</td>
                        <td><?= $order->id; ?></td>
                        <td><a href="<?= BASE_URL . 'service-details/' . $order->product['slug']; ?>" target="_blank"><?= $order->product['title']; ?></a></td>
                        <?php if ($order->order_mode['name'] == 'basic') : ?>
                            <td><span class="badge badge-primary"><?= strtoupper($order->order_mode['name']); ?></span></td>
                        <?php elseif ($order->order_mode['name'] == 'standard') : ?>
                            <td><span class="badge badge-warning"><?= strtoupper($order->order_mode['name']); ?></span></td>
                        <?php else : ?>
                            <td><span class="badge badge-success"><?= strtoupper($order->order_mode['name']); ?></span></td>
                        <?php endif; ?>
                        <td><span class="badge <?= $badge ?>"><?= $merchantName; ?></span></td>
                        <td><?= $order->user['first_name'] . ' ' . $order->user['last_name']; ?></td>
                        <td>₹ <?= $order->gross_total; ?></td>
                        <td>₹ 
							<?php
                            if($order->is_booking != 0) {
                                if($order->booking_amount>0) {
									if($order->is_booking == 0) {
										echo $totalAmount; 
									} else {
										if($order->booking_amount == $order->total) {
											echo $order->booking_amount;
										} else {
											echo $order->gross_total;
										}
									}
							    } else{
                                    echo $totalAmount; 
                                }
                            } else {
                                echo $totalAmount; 
                            }
							
                            ?>
                        </td>
                        <td> ₹ 
                            <?php 
									if($order->is_booking != 0) {
                                        if($order->booking_amount == $order->total) {
											echo $order->gross_total-$order->total;
										} else {
											echo $order->gross_total - $order->gross_total;
										}
                                    } else {
                                        echo $order->gross_total - $order->gross_total;
                                    }
                                        
                                
                            ?>
                        </td>
                         

                        <?php if($order->coupon['coupon_code'] == ''): ?>
                            <td>Not Used</td>
                        <?php else: ?>
                            <td><a href="https://easifyy.com/superadmin/coupons/edit/<?= $order->coupon['id'] ?>"><?= $order->coupon['coupon_code'] ?></a></td>
                        <?php endif; ?> 
                         
                        <td>
                            <?php if ($order->order_status['name'] == 'Processing') : ?>
                                <span class="badge badge-dark"><?= strtoupper($order->order_status['name']); ?></span>
                            <?php elseif ($order->order_status['name'] == 'Refunded') : ?>
                                <span class="badge badge-warning"><b><?= strtoupper($order->order_status['name']); ?></b></span>
                            <?php else : ?>
                                <span class="badge badge-info"><?= strtoupper($order->order_status['name']); ?></span>
                            <?php endif; ?>
                        </td>

                    <td>
                        <?= date_format($order->created, "d/m/Y h:i:A"); ?>
                    </td>
                    <td class="actions text-center">

                        <a title="View" href="<?= $this->Url->build(['action' => 'view', $order->id]) ?>" class="btn">
                            <i class="material-icons">remove_red_eye</i>
                        </a>

                        <a title="Delete" href="<?= $this->Url->build(['action' => 'delete', $order->id]) ?>" class="btn" onclick="return confirm('Are you sure?')">
                            <i class="material-icons">delete</i>
                        </a>

                        <a title="PSP Payments" href="<?= $this->Url->build(['controller' => 'merchants', 'action' => 'notes', 'merchant_id' => base64_encode($order->merchant_id), 'order_id' => base64_encode($order->id)]) ?>" class="btn">
                            <i class="material-icons">view_list</i>
                        </a>

                    </td>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
        <!--<div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
        </div>-->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js "></script>
<script>
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results[1] || 0;
    }

    var table =  $('#order-datatable').DataTable({
            "order": [[ 1, "desc" ]],
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        }
    );
    var serachParameter=$.urlParam('search'); // name
    if(serachParameter!=""){
        table.search( serachParameter ).draw();
        var orderStatus=$.urlParam('status'); // name
        if(orderStatus!=""){
            table.column(4).search( serachParameter).column(10).search( orderStatus ).draw();
        }
    }
</script>