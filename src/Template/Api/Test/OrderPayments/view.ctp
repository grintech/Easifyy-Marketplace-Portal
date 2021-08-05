<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment $orderPayment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Payment'), ['action' => 'edit', $orderPayment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Payment'), ['action' => 'delete', $orderPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderPayment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderPayments view large-9 medium-8 columns content">
    <h3><?= h($orderPayment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderPayment->has('order') ? $this->Html->link($orderPayment->order->id, ['controller' => 'Orders', 'action' => 'view', $orderPayment->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $orderPayment->has('user') ? $this->Html->link($orderPayment->user->id, ['controller' => 'Users', 'action' => 'view', $orderPayment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $orderPayment->has('merchant') ? $this->Html->link($orderPayment->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $orderPayment->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TransactionId') ?></th>
            <td><?= h($orderPayment->transactionId) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderPayment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount') ?></th>
            <td><?= $this->Number->format($orderPayment->amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Status') ?></th>
            <td><?= $this->Number->format($orderPayment->transaction_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Date') ?></th>
            <td><?= h($orderPayment->transaction_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderPayment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderPayment->modified) ?></td>
        </tr>
    </table>
</div>
