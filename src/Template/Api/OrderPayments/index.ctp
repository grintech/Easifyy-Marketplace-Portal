<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderPayment[]|\Cake\Collection\CollectionInterface $orderPayments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Payment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderPayments index large-9 medium-8 columns content">
    <h3><?= __('Order Payments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transactionId') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderPayments as $orderPayment): ?>
            <tr>
                <td><?= $this->Number->format($orderPayment->id) ?></td>
                <td><?= $orderPayment->has('order') ? $this->Html->link($orderPayment->order->id, ['controller' => 'Orders', 'action' => 'view', $orderPayment->order->id]) : '' ?></td>
                <td><?= $orderPayment->has('user') ? $this->Html->link($orderPayment->user->id, ['controller' => 'Users', 'action' => 'view', $orderPayment->user->id]) : '' ?></td>
                <td><?= $orderPayment->has('merchant') ? $this->Html->link($orderPayment->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $orderPayment->merchant->id]) : '' ?></td>
                <td><?= h($orderPayment->transactionId) ?></td>
                <td><?= $this->Number->format($orderPayment->amount) ?></td>
                <td><?= h($orderPayment->transaction_date) ?></td>
                <td><?= $this->Number->format($orderPayment->transaction_status) ?></td>
                <td><?= h($orderPayment->created) ?></td>
                <td><?= h($orderPayment->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderPayment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderPayment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderPayment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderPayment->id)]) ?>
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
