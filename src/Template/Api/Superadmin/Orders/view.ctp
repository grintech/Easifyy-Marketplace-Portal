<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>

<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Seller') ?></th>
            <td><?= $order->has('merchant') ? $this->Html->link($order->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $order->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Name') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->first_name, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= $order->has('address') ? $this->Html->link($order->address->name, ['controller' => 'Addresses', 'action' => 'view', $order->address->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Address') ?></th>
            <td><?= $order->has('delivery_address') ? $this->Html->link($order->delivery_address->name, ['controller' => 'DeliveryAddresses', 'action' => 'view', $order->delivery_address->id]) : '' ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Coupon') ?></th>
            <td><?= $order->has('coupon') ? $this->Html->link($order->coupon->id, ['controller' => 'Coupons', 'action' => 'view', $order->coupon->id]) : '' ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Runner') ?></th>
            <td><?= $order->has('runner') ? $this->Html->link($order->runner->id, ['controller' => 'Runners', 'action' => 'view', $order->runner->id]) : '' ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Order Mode') ?></th>
            <td><?= $order->has('order_mode') ? $this->Html->link($order->order_mode->name, ['controller' => 'OrderModes', 'action' => 'view', $order->order_mode->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Payment Method') ?></th>
            <td><?= $order->has('payment_method') ? $this->Html->link($order->payment_method->name, ['controller' => 'PaymentMethods', 'action' => 'view', $order->payment_method->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Status') ?></th>
            <td><?= $order->has('order_status') ? $this->Html->link($order->order_status->name, ['controller' => 'OrderStatuses', 'action' => 'view', $order->order_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Delivery Time') ?></th>
            <td><?= h($order->delivery_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Notes') ?></th>
            <td><?= h($order->order_notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Igst') ?></th>
            <td><?= $this->Number->format($order->igst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cgst') ?></th>
            <td><?= $this->Number->format($order->cgst) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('GST') ?></th>
            <td><?= $this->Number->format($order->sgst) ?></td>
        </tr>
        <!--<tr>
            <th scope="row"><?= __('Shipping') ?></th>
            <td><?= $this->Number->format($order->shipping) ?></td>
        </tr>-->
        <tr>
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($order->total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gross Total') ?></th>
            <td><?= $this->Number->format($order->gross_total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Coupon Redeems') ?></h4>
        <?php if (!empty($order->coupon_redeems)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Coupon Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Coupon Code') ?></th>
                <th scope="col"><?= __('Usage Count') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->coupon_redeems as $couponRedeems): ?>
            <tr>
                <td><?= h($couponRedeems->id) ?></td>
                <td><?= h($couponRedeems->user_id) ?></td>
                <td><?= h($couponRedeems->coupon_id) ?></td>
                <td><?= h($couponRedeems->order_id) ?></td>
                <td><?= h($couponRedeems->coupon_code) ?></td>
                <td><?= h($couponRedeems->usage_count) ?></td>
                <td><?= h($couponRedeems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CouponRedeems', 'action' => 'view', $couponRedeems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CouponRedeems', 'action' => 'edit', $couponRedeems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CouponRedeems', 'action' => 'delete', $couponRedeems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $couponRedeems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Seller Payouts') ?></h4>
        <?php if (!empty($order->merchant_payouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Transaction Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Is Admin Copoun') ?></th>
                <th scope="col"><?= __('Coupon Discount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->merchant_payouts as $merchantPayouts): ?>
            <tr>
                <td><?= h($merchantPayouts->id) ?></td>
                <td><?= h($merchantPayouts->merchant_transaction_id) ?></td>
                <td><?= h($merchantPayouts->merchant_id) ?></td>
                <td><?= h($merchantPayouts->order_id) ?></td>
                <td><?= h($merchantPayouts->is_admin_copoun) ?></td>
                <td><?= h($merchantPayouts->coupon_discount) ?></td>
                <td><?= h($merchantPayouts->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantPayouts', 'action' => 'view', $merchantPayouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantPayouts', 'action' => 'edit', $merchantPayouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantPayouts', 'action' => 'delete', $merchantPayouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantPayouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Items') ?></h4>
        <?php if (!empty($order->order_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <!--<th scope="col"><?= __('Product Id') ?></th>-->
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <!--<th scope="col"><?= __('Igst') ?></th>
                <th scope="col"><?= __('Cgst') ?></th>-->
                <th scope="col"><?= __('GST') ?></th>
                <th scope="col"><?= __('Subtotal') ?></th>
                <th scope="col"><?= __('Total') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_items as $orderItems): ?>
            <tr>
                <td><?= h($orderItems->id) ?></td>
                <td><?= h($orderItems->order_id) ?></td>
                <!--<td><?= h($orderItems->product_id) ?></td>-->
                <td><?= h($orderItems->merchant_product_id) ?></td>
                <td><?= h($orderItems->quantity) ?></td>
                <td><?= h($orderItems->price) ?></td>
                <!--<td><?= h($orderItems->igst) ?></td>
                <td><?= h($orderItems->cgst) ?></td>-->
                <td><?= h($orderItems->sgst) ?></td>
                <td><?= h($orderItems->subtotal) ?></td>
                <td><?= h($orderItems->total) ?></td>
                <td><?= h($orderItems->notes) ?></td>
                <td><?= h($orderItems->status) ?></td>
                <td><?= h($orderItems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderItems', 'action' => 'view', $orderItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderItems', 'action' => 'edit', $orderItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderItems', 'action' => 'delete', $orderItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Notifications') ?></h4>
        <?php if (!empty($order->order_notifications)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('User Type') ?></th>
                <th scope="col"><?= __('Link') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_notifications as $orderNotifications): ?>
            <tr>
                <td><?= h($orderNotifications->id) ?></td>
                <td><?= h($orderNotifications->user_id) ?></td>
                <td><?= h($orderNotifications->order_id) ?></td>
                <td><?= h($orderNotifications->type) ?></td>
                <td><?= h($orderNotifications->message) ?></td>
                <td><?= h($orderNotifications->user_type) ?></td>
                <td><?= h($orderNotifications->link) ?></td>
                <td><?= h($orderNotifications->status) ?></td>
                <td><?= h($orderNotifications->created) ?></td>
                <td><?= h($orderNotifications->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderNotifications', 'action' => 'view', $orderNotifications->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderNotifications', 'action' => 'edit', $orderNotifications->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderNotifications', 'action' => 'delete', $orderNotifications->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderNotifications->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Order Payments') ?></h4>
        <?php if (!empty($order->order_payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('TransactionId') ?></th>
                <th scope="col"><?= __('Amount') ?></th>
                <th scope="col"><?= __('Transaction Date') ?></th>
                <th scope="col"><?= __('Transaction Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_payments as $orderPayments): ?>
            <tr>
                <td><?= h($orderPayments->id) ?></td>
                <td><?= h($orderPayments->order_id) ?></td>
                <td><?= h($orderPayments->user_id) ?></td>
                <td><?= h($orderPayments->merchant_id) ?></td>
                <td><?= h($orderPayments->transactionId) ?></td>
                <td><?= h($orderPayments->amount) ?></td>
                <td><?= h($orderPayments->transaction_date) ?></td>
                <td><?= h($orderPayments->transaction_status) ?></td>
                <td><?= h($orderPayments->created) ?></td>
                <td><?= h($orderPayments->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderPayments', 'action' => 'view', $orderPayments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderPayments', 'action' => 'edit', $orderPayments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderPayments', 'action' => 'delete', $orderPayments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderPayments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <!--<div class="related">
        <h4><?= __('Related Runner Delivery Requests') ?></h4>
        <?php if (!empty($order->runner_delivery_requests)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Runner Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Request Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->runner_delivery_requests as $runnerDeliveryRequests): ?>
            <tr>
                <td><?= h($runnerDeliveryRequests->id) ?></td>
                <td><?= h($runnerDeliveryRequests->runner_id) ?></td>
                <td><?= h($runnerDeliveryRequests->order_id) ?></td>
                <td><?= h($runnerDeliveryRequests->request_status) ?></td>
                <td><?= h($runnerDeliveryRequests->created) ?></td>
                <td><?= h($runnerDeliveryRequests->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'view', $runnerDeliveryRequests->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'edit', $runnerDeliveryRequests->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'delete', $runnerDeliveryRequests->id], ['confirm' => __('Are you sure you want to delete # {0}?', $runnerDeliveryRequests->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Supports') ?></h4>
        <?php if (!empty($order->supports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Ticket Type') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Reason') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->supports as $supports): ?>
            <tr>
                <td><?= h($supports->id) ?></td>
                <td><?= h($supports->user_id) ?></td>
                <td><?= h($supports->order_id) ?></td>
                <td><?= h($supports->ticket_type) ?></td>
                <td><?= h($supports->subject) ?></td>
                <td><?= h($supports->reason) ?></td>
                <td><?= h($supports->comments) ?></td>
                <td><?= h($supports->status) ?></td>
                <td><?= h($supports->created) ?></td>
                <td><?= h($supports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Supports', 'action' => 'view', $supports->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Supports', 'action' => 'edit', $supports->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Supports', 'action' => 'delete', $supports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $supports->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>-->
</div>
