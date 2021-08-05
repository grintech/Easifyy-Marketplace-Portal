<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?></li>
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
<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Edit Order') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('address_id', ['options' => $addresses, 'empty' => true]);
            echo $this->Form->control('coupon_id', ['options' => $coupons, 'empty' => true]);
            echo $this->Form->control('runner_id', ['options' => $runners, 'empty' => true]);
            echo $this->Form->control('order_mode_id', ['options' => $orderModes, 'empty' => true]);
            echo $this->Form->control('order_status_id', ['options' => $orderStatuses, 'empty' => true]);
            echo $this->Form->control('igst');
            echo $this->Form->control('cgst');
            echo $this->Form->control('sgst');
            echo $this->Form->control('shipping');
            echo $this->Form->control('delivery_time');
            echo $this->Form->control('gross_total');
            echo $this->Form->control('total');
            echo $this->Form->control('order_notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
