<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<div class="row">
    <input type="hidden" id="counter" value="1"> 

    <div class="col-md-9">
        <div class="card">
            <h5 class="card-header m-0">
                <?php echo __('Order'); ?> #<?= h($order->id) ?> <?php echo __('details'); ?>
                <?php 
                $order_status_color = "secondary";
                if( strtolower($order->order_status->name) == 'processing' ) {
                    $order_status_color = "warning";
                } else if( strtolower($order->order_status->name) == 'accepted' ) {
                    $order_status_color = "primary";
                } else if( strtolower($order->order_status->name) == 'on the way' ) {
                    $order_status_color = "info";
                } else if( strtolower($order->order_status->name) == 'pending' ) {
                    $order_status_color = "light";
                } else if( strtolower($order->order_status->name) == 'completed' ) {
                    $order_status_color = "success";
                } else if( strtolower($order->order_status->name) == 'cancel' ) {
                    $order_status_color = "danger";
                } 
                ?>
                <span class="badge badge-<?= $order_status_color ?>"><?= $order->order_status->name ?></span>
            </h5>
            <div class="card-body">
                <div class="card-text">
                    <label>
                        Payment via <?= $order->payment_method->name ?>. 

                        <?php if( strtolower($order->payment_method->name) != 'cod' ): ?>
                            Txn id <?= $order->order_payment->transactionId ?>.  
                            <?php echo __('Paid on'); ?> <?= date('d M Y h:i a', strtotime($order->order_payment->created) ) ?>.
                        <?php endif; ?>
                    </label>
                </div>
                <div class="card-text">
                    
                    <div class="float-left w-50">
                        <label><?php echo __('Delivery Address'); ?></label>
                        <p>
                            <?= $order->address->name ?><br>
                            <?= $order->address->address_line_1 ?>, 
                            <?= $order->address->address_line_2 ?><br>
                            <?= $order->address->city->name ?>, 
                            <?= $order->address->state->name ?>, 
                            <?= $order->address->zip_code ?><br>
                            
                            <?= $order->address->phone_1 ?>    
                        </p>
                        

                    </div>
                    <div class="float-left w-50">
                        <label><?php echo __('Customer Information'); ?></label>
                        <p>
                            <?= $order->user->first_name ?> <?= $order->user->last_name ?><br>
                            <?= $order->user->username ?>
                        </p>
                        
                    </div>
                </div>
                <div class="card-text clear">
                    <label><?php echo __('Tax and Payment details'); ?>:</label><br>

                    <div class="float-left w-50">
                        <label><?php echo __('Taxes'); ?></label>
                        <p>
                            <?php echo __('IGST'); ?>: <?= $this->Number->currency($order->igst, 'INR') ?>, 
                            <?php echo __('CGST'); ?>: <?= $this->Number->currency($order->cgst, 'INR') ?>, 
                            <?php echo __('SGST'); ?>: <?= $this->Number->currency($order->sgst, 'INR') ?><br>
                        </p>
                        
                    </div>
                    <div class="float-left w-50">
                        <label><?php echo __('Other details'); ?></label>
                        <p>
                            <?php echo __('Coupon'); ?> 
                            (<?= $order->has('coupon') ? $this->Html->link($order->coupon->coupon_code, ['controller' => 'Coupons', 'action' => 'view', $order->coupon->id]) : '' ?>): 
                            <?= $this->Number->currency($order->coupon_discount, 'INR') ?><br>
                            
                            <?php echo __('Shipping'); ?>: <?= $this->Number->currency($order->shipping, 'INR') ?><br>
                            <?php echo __('Gross Total'); ?>: <?= $this->Number->currency($order->gross_total, 'INR') ?><br>
                            <?php echo __('Total'); ?>: <?= $this->Number->currency($order->total, 'INR') ?>
                        </p>
                        
                    </div>
                    
                </div>

                <div class="card-text clear">
                    <label><?php echo __('Date and Time'); ?></label><br>
                    <?php echo __('Order time'); ?>: <?= date( 'd M Y h:i a', strtotime($order->created) ) ?><br>
                    <?php echo __('Last modified'); ?>: <?= date( 'd M Y h:i a', strtotime($order->modified) ) ?><br>
                    
                    
                </div>
                
            </div>
            
        </div>

        <div class="card">
            <h5 class="card-header m-0"><?php echo __('Items'); ?></h5>
            <div class="card-body">
                <div class="card-text">
                    <?php if (!empty($order->order_items)): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th><p><?php echo __('Name'); ?></p></th>
                                    <th><p><?php echo __('Quantity'); ?></p></th>
                                    <th><p><?php echo __('Sale Price'); ?></p></th>
                                    <th><p><?php echo __('MRP'); ?></p></th>
                                    <th><p><?php echo __('Total'); ?></p></th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($order->order_items as $orderItems): ?>
                                    <tr>
                                        <td>
                                            <?php 
                                            $product_id = $orderItems->merchant_product->id;
                                            if( $orderItems->merchant_product->product_type->name == 'variation' ){
                                                $product_id = $orderItems->merchant_product->parent_id;
                                            } ?>
                                            <a href="<?= $this->Url->build(['controller' => 'MerchantProducts', 'action' => 'edit', base64_encode($product_id)]) ?>">
                                                
                                            
                                                <?= h($orderItems->merchant_product->title) ?>
                                                <?= h($orderItems->merchant_product->_weight) ?>
                                                <?= h($orderItems->merchant_product->product_unit->name) ?>
                                            </a>
                                            <div>
                                                <small>
                                                    <?php echo __('igst'); ?>: <?= $this->Number->currency($orderItems->igst, 'INR') ?>
                                                    <?php echo __('cgst'); ?>: <?= $this->Number->currency($orderItems->cgst, 'INR') ?>
                                                    <?php echo __('igst'); ?>: <?= $this->Number->currency($orderItems->sgst, 'INR') ?>
                                                </small>
                                            </div>    
                                        </td>
                                        <td><?= h($orderItems->quantity) ?></td>
                                        <td><?= $this->Number->currency($orderItems->price, 'INR') ?></td>
                                        <td><?= $this->Number->currency($orderItems->subtotal, 'INR') ?></td>
                                        <td><?= $this->Number->currency($orderItems->total, 'INR') ?></td>    
                                    </tr>
                                    
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                
            </div>

            
            
        </div>
    </div>

    <div class="col-md-3">
        <div class="card">
            <h5 class="card-header m-0">Status</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <label>Order status <span class="badge badge-<?= $order_status_color ?>"><?= $order->order_status->name ?></span></label><br>
                    <?= $this->Form->create($order) ?>
                    <?php echo $this->Form->select('order_status_id', $order_statuses , array( 'class' => '', 'empty' => 'Select order status', 'label' => false, "placeholder" => "Order status", 'div' => false , 'required')); ?>
                    <br>
                    <?php echo $this->Form->submit('Update order', array( 'class' => 'btn btn-primary' ) ); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

        <div class="card">
            <h5 class="card-header m-0">Notes</h5>
            <div class="card-body mt-2">
                <div class="card-text">
                    <?= h($order->order_notes) ?>
                </div>
            </div>
        </div>
    </div>
</div>