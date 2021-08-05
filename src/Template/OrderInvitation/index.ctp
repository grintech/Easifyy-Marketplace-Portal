<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderInvitation[]|\Cake\Collection\CollectionInterface $orderInvitation
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Invitation'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderInvitation index large-9 medium-8 columns content">
    <h3><?= __('Order Invitation') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('view_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderInvitation as $orderInvitation): ?>
            <tr>
                <td><?= $this->Number->format($orderInvitation->id) ?></td>
                <td><?= $orderInvitation->has('order') ? $this->Html->link($orderInvitation->order->id, ['controller' => 'Orders', 'action' => 'view', $orderInvitation->order->id]) : '' ?></td>
                <td><?= $orderInvitation->has('user') ? $this->Html->link($orderInvitation->user->id, ['controller' => 'Users', 'action' => 'view', $orderInvitation->user->id]) : '' ?></td>
                <td><?= $this->Number->format($orderInvitation->view_status) ?></td>
                <td><?= h($orderInvitation->updated) ?></td>
                <td><?= h($orderInvitation->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderInvitation->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderInvitation->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderInvitation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderInvitation->id)]) ?>
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
