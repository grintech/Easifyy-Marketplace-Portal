<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionStatus[]|\Cake\Collection\CollectionInterface $transactionStatuses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Transaction Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transactionStatuses index large-9 medium-8 columns content">
    <h3><?= __('Transaction Statuses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transactionStatuses as $transactionStatus): ?>
            <tr>
                <td><?= $this->Number->format($transactionStatus->id) ?></td>
                <td><?= h($transactionStatus->name) ?></td>
                <td><?= h($transactionStatus->created) ?></td>
                <td><?= h($transactionStatus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $transactionStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transactionStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transactionStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionStatus->id)]) ?>
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
