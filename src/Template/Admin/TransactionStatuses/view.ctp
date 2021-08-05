<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionStatus $transactionStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Transaction Status'), ['action' => 'edit', $transactionStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Transaction Status'), ['action' => 'delete', $transactionStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Transaction Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction Status'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="transactionStatuses view large-9 medium-8 columns content">
    <h3><?= h($transactionStatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($transactionStatus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($transactionStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($transactionStatus->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($transactionStatus->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Merchant Transactions') ?></h4>
        <?php if (!empty($transactionStatus->merchant_transactions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Bank Account Id') ?></th>
                <th scope="col"><?= __('Total Orders Amount') ?></th>
                <th scope="col"><?= __('Admin Coupon Discount') ?></th>
                <th scope="col"><?= __('Merchant Coupon Discount') ?></th>
                <th scope="col"><?= __('Commission') ?></th>
                <th scope="col"><?= __('Amount Payable') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Transaction Status Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($transactionStatus->merchant_transactions as $merchantTransactions): ?>
            <tr>
                <td><?= h($merchantTransactions->id) ?></td>
                <td><?= h($merchantTransactions->merchant_id) ?></td>
                <td><?= h($merchantTransactions->bank_account_id) ?></td>
                <td><?= h($merchantTransactions->total_orders_amount) ?></td>
                <td><?= h($merchantTransactions->admin_coupon_discount) ?></td>
                <td><?= h($merchantTransactions->merchant_coupon_discount) ?></td>
                <td><?= h($merchantTransactions->commission) ?></td>
                <td><?= h($merchantTransactions->amount_payable) ?></td>
                <td><?= h($merchantTransactions->notes) ?></td>
                <td><?= h($merchantTransactions->transaction_status_id) ?></td>
                <td><?= h($merchantTransactions->created) ?></td>
                <td><?= h($merchantTransactions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantTransactions', 'action' => 'view', $merchantTransactions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantTransactions', 'action' => 'edit', $merchantTransactions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantTransactions', 'action' => 'delete', $merchantTransactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantTransactions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
