<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderNotification[]|\Cake\Collection\CollectionInterface $orderNotifications
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Notification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderNotifications index large-9 medium-8 columns content">
    <h3><?= __('Order Notifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('link') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderNotifications as $orderNotification): ?>
            <tr>
                <td><?= $this->Number->format($orderNotification->id) ?></td>
                <td><?= $orderNotification->has('user') ? $this->Html->link($orderNotification->user->id, ['controller' => 'Users', 'action' => 'view', $orderNotification->user->id]) : '' ?></td>
                <td><?= $orderNotification->has('order') ? $this->Html->link($orderNotification->order->id, ['controller' => 'Orders', 'action' => 'view', $orderNotification->order->id]) : '' ?></td>
                <td><?= h($orderNotification->type) ?></td>
                <td><?= h($orderNotification->message) ?></td>
                <td><?= h($orderNotification->user_type) ?></td>
                <td><?= h($orderNotification->link) ?></td>
                <td><?= h($orderNotification->status) ?></td>
                <td><?= h($orderNotification->created) ?></td>
                <td><?= h($orderNotification->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderNotification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderNotification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderNotification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderNotification->id)]) ?>
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
