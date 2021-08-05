<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderNotification $orderNotification
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Notification'), ['action' => 'edit', $orderNotification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Notification'), ['action' => 'delete', $orderNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderNotification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Notification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderNotifications view large-9 medium-8 columns content">
    <h3><?= h($orderNotification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $orderNotification->has('user') ? $this->Html->link($orderNotification->user->id, ['controller' => 'Users', 'action' => 'view', $orderNotification->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
            <td><?= $orderNotification->has('order') ? $this->Html->link($orderNotification->order->id, ['controller' => 'Orders', 'action' => 'view', $orderNotification->order->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($orderNotification->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= h($orderNotification->message) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Type') ?></th>
            <td><?= h($orderNotification->user_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($orderNotification->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($orderNotification->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($orderNotification->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($orderNotification->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $orderNotification->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
