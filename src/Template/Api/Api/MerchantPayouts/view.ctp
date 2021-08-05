<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantPayout $merchantPayout
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Payout'), ['action' => 'edit', $merchantPayout->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Payout'), ['action' => 'delete', $merchantPayout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantPayout->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantPayouts view large-9 medium-8 columns content">
    <h3><?= h($merchantPayout->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant Transaction') ?></th>
            <td><?= $merchantPayout->has('merchant_transaction') ? $this->Html->link($merchantPayout->merchant_transaction->id, ['controller' => 'MerchantTransactions', 'action' => 'view', $merchantPayout->merchant_transaction->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantPayout->has('merchant') ? $this->Html->link($merchantPayout->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantPayout->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $merchantPayout->has('order') ? $this->Html->link($merchantPayout->order->id, ['controller' => 'Orders', 'action' => 'view', $merchantPayout->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantPayout->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon Discount') ?></th>
            <td><?= $this->Number->format($merchantPayout->coupon_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantPayout->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Admin Copoun') ?></th>
            <td><?= $merchantPayout->is_admin_copoun ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
