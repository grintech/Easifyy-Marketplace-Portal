<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantPayout[]|\Cake\Collection\CollectionInterface $merchantPayouts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantPayouts index large-9 medium-8 columns content">
    <h3><?= __('Merchant Payouts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_transaction_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('order_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_admin_copoun') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantPayouts as $merchantPayout): ?>
            <tr>
                <td><?= $this->Number->format($merchantPayout->id) ?></td>
                <td><?= $merchantPayout->has('merchant_transaction') ? $this->Html->link($merchantPayout->merchant_transaction->id, ['controller' => 'MerchantTransactions', 'action' => 'view', $merchantPayout->merchant_transaction->id]) : '' ?></td>
                <td><?= $merchantPayout->has('merchant') ? $this->Html->link($merchantPayout->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantPayout->merchant->id]) : '' ?></td>
                <td><?= $merchantPayout->has('order') ? $this->Html->link($merchantPayout->order->id, ['controller' => 'Orders', 'action' => 'view', $merchantPayout->order->id]) : '' ?></td>
                <td><?= h($merchantPayout->is_admin_copoun) ?></td>
                <td><?= $this->Number->format($merchantPayout->coupon_discount) ?></td>
                <td><?= h($merchantPayout->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantPayout->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantPayout->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantPayout->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantPayout->id)]) ?>
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
