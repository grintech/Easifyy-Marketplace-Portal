<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction[]|\Cake\Collection\CollectionInterface $merchantTransactions
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transaction Statuses'), ['controller' => 'TransactionStatuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transaction Status'), ['controller' => 'TransactionStatuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['controller' => 'MerchantPayouts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['controller' => 'MerchantPayouts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantTransactions index large-9 medium-8 columns content">
    <h3><?= __('Merchant Transactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_account_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_orders_amount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('admin_coupon_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_coupon_discount') ?></th>
                <th scope="col"><?= $this->Paginator->sort('commission') ?></th>
                <th scope="col"><?= $this->Paginator->sort('amount_payable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transaction_status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantTransactions as $merchantTransaction): ?>
            <tr>
                <td><?= $this->Number->format($merchantTransaction->id) ?></td>
                <td><?= $merchantTransaction->has('merchant') ? $this->Html->link($merchantTransaction->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantTransaction->merchant->id]) : '' ?></td>
                <td><?= $merchantTransaction->has('bank_account') ? $this->Html->link($merchantTransaction->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $merchantTransaction->bank_account->id]) : '' ?></td>
                <td><?= $this->Number->format($merchantTransaction->total_orders_amount) ?></td>
                <td><?= $this->Number->format($merchantTransaction->admin_coupon_discount) ?></td>
                <td><?= $this->Number->format($merchantTransaction->merchant_coupon_discount) ?></td>
                <td><?= $this->Number->format($merchantTransaction->commission) ?></td>
                <td><?= $this->Number->format($merchantTransaction->amount_payable) ?></td>
                <td><?= h($merchantTransaction->notes) ?></td>
                <td><?= $merchantTransaction->has('transaction_status') ? $this->Html->link($merchantTransaction->transaction_status->name, ['controller' => 'TransactionStatuses', 'action' => 'view', $merchantTransaction->transaction_status->id]) : '' ?></td>
                <td><?= h($merchantTransaction->created) ?></td>
                <td><?= h($merchantTransaction->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantTransaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantTransaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantTransaction->id)]) ?>
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
