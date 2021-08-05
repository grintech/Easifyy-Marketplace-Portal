<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Coupons'), ['controller' => 'Coupons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Coupon'), ['controller' => 'Coupons', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runners'), ['controller' => 'Runners', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner'), ['controller' => 'Runners', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Modes'), ['controller' => 'OrderModes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Mode'), ['controller' => 'OrderModes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Statuses'), ['controller' => 'OrderStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Status'), ['controller' => 'OrderStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['controller' => 'MerchantPayouts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['controller' => 'MerchantPayouts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Notifications'), ['controller' => 'OrderNotifications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Notification'), ['controller' => 'OrderNotifications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Payments'), ['controller' => 'OrderPayments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Payment'), ['controller' => 'OrderPayments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Runner Delivery Requests'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Runner Delivery Request'), ['controller' => 'RunnerDeliveryRequests', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Supports'), ['controller' => 'Supports', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Support'), ['controller' => 'Supports', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orders index large-9 medium-8 columns content">
    <h3><?= __('Orders') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('runner_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_mode_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('igst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cgst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sgst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('shipping') ?></th>
                <th scope="col"><?= $this->Paginator->sort('delivery_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gross_total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->id) ?></td>
                <td><?= $order->has('merchant') ? $this->Html->link($order->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $order->merchant->id]) : '' ?></td>
                <td><?= $order->has('user') ? $this->Html->link($order->user->id, ['controller' => 'Users', 'action' => 'view', $order->user->id]) : '' ?></td>
                <td><?= $order->has('address') ? $this->Html->link($order->address->name, ['controller' => 'Addresses', 'action' => 'view', $order->address->id]) : '' ?></td>
                <td><?= $order->has('coupon') ? $this->Html->link($order->coupon->id, ['controller' => 'Coupons', 'action' => 'view', $order->coupon->id]) : '' ?></td>
                <td><?= $order->has('runner') ? $this->Html->link($order->runner->id, ['controller' => 'Runners', 'action' => 'view', $order->runner->id]) : '' ?></td>
                <td><?= $order->has('order_mode') ? $this->Html->link($order->order_mode->name, ['controller' => 'OrderModes', 'action' => 'view', $order->order_mode->id]) : '' ?></td>
                <td><?= $order->has('order_status') ? $this->Html->link($order->order_status->name, ['controller' => 'OrderStatuses', 'action' => 'view', $order->order_status->id]) : '' ?></td>
                <td><?= $this->Number->format($order->igst) ?></td>
                <td><?= $this->Number->format($order->cgst) ?></td>
                <td><?= $this->Number->format($order->sgst) ?></td>
                <td><?= $this->Number->format($order->shipping) ?></td>
                <td><?= h($order->delivery_time) ?></td>
                <td><?= $this->Number->format($order->gross_total) ?></td>
                <td><?= $this->Number->format($order->total) ?></td>
                <td><?= h($order->order_notes) ?></td>
                <td><?= h($order->created) ?></td>
                <td><?= h($order->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
