<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderInvitation $orderInvitation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Invitation'), ['action' => 'edit', $orderInvitation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Invitation'), ['action' => 'delete', $orderInvitation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderInvitation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Invitation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Invitation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderInvitation view large-9 medium-8 columns content">
    <h3><?= h($orderInvitation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderInvitation->has('order') ? $this->Html->link($orderInvitation->order->id, ['controller' => 'Orders', 'action' => 'view', $orderInvitation->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $orderInvitation->has('user') ? $this->Html->link($orderInvitation->user->id, ['controller' => 'Users', 'action' => 'view', $orderInvitation->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderInvitation->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('View Status') ?></th>
            <td><?= $this->Number->format($orderInvitation->view_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($orderInvitation->updated) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderInvitation->created) ?></td>
        </tr>
    </table>
</div>
