<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount[]|\Cake\Collection\CollectionInterface $bankAccounts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bank Account'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankAccounts index large-9 medium-8 columns content">
    <h3><?= __('Bank Accounts') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('account_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bank_branch') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ifsc_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('micr_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bankAccounts as $bankAccount): ?>
            <tr>
                <td><?= $this->Number->format($bankAccount->id) ?></td>
                <td><?= $bankAccount->has('merchant') ? $this->Html->link($bankAccount->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $bankAccount->merchant->id]) : '' ?></td>
                <td><?= h($bankAccount->account_number) ?></td>
                <td><?= h($bankAccount->account_type) ?></td>
                <td><?= h($bankAccount->bank_name) ?></td>
                <td><?= h($bankAccount->bank_branch) ?></td>
                <td><?= h($bankAccount->ifsc_code) ?></td>
                <td><?= h($bankAccount->micr_code) ?></td>
                <td><?= h($bankAccount->created) ?></td>
                <td><?= h($bankAccount->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bankAccount->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bankAccount->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bankAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id)]) ?>
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
