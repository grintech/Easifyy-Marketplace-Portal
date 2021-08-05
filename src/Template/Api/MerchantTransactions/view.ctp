<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction $merchantTransaction
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Transaction'), ['action' => 'edit', $merchantTransaction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Transaction'), ['action' => 'delete', $merchantTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantTransaction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['controller' => 'BankAccounts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['controller' => 'BankAccounts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transaction Statuses'), ['controller' => 'TransactionStatuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transaction Status'), ['controller' => 'TransactionStatuses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['controller' => 'MerchantPayouts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Payout'), ['controller' => 'MerchantPayouts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantTransactions view large-9 medium-8 columns content">
    <h3><?= h($merchantTransaction->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantTransaction->has('merchant') ? $this->Html->link($merchantTransaction->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantTransaction->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Account') ?></th>
            <td><?= $merchantTransaction->has('bank_account') ? $this->Html->link($merchantTransaction->bank_account->id, ['controller' => 'BankAccounts', 'action' => 'view', $merchantTransaction->bank_account->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notes') ?></th>
            <td><?= h($merchantTransaction->notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transaction Status') ?></th>
            <td><?= $merchantTransaction->has('transaction_status') ? $this->Html->link($merchantTransaction->transaction_status->name, ['controller' => 'TransactionStatuses', 'action' => 'view', $merchantTransaction->transaction_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantTransaction->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Orders Amount') ?></th>
            <td><?= $this->Number->format($merchantTransaction->total_orders_amount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Admin Coupon Discount') ?></th>
            <td><?= $this->Number->format($merchantTransaction->admin_coupon_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Coupon Discount') ?></th>
            <td><?= $this->Number->format($merchantTransaction->merchant_coupon_discount) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Commission') ?></th>
            <td><?= $this->Number->format($merchantTransaction->commission) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Amount Payable') ?></th>
            <td><?= $this->Number->format($merchantTransaction->amount_payable) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantTransaction->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($merchantTransaction->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Merchant Payouts') ?></h4>
        <?php if (!empty($merchantTransaction->merchant_payouts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Transaction Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Order Id') ?></th>
                <th scope="col"><?= __('Is Admin Copoun') ?></th>
                <th scope="col"><?= __('Coupon Discount') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantTransaction->merchant_payouts as $merchantPayouts): ?>
            <tr>
                <td><?= h($merchantPayouts->id) ?></td>
                <td><?= h($merchantPayouts->merchant_transaction_id) ?></td>
                <td><?= h($merchantPayouts->merchant_id) ?></td>
                <td><?= h($merchantPayouts->order_id) ?></td>
                <td><?= h($merchantPayouts->is_admin_copoun) ?></td>
                <td><?= h($merchantPayouts->coupon_discount) ?></td>
                <td><?= h($merchantPayouts->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantPayouts', 'action' => 'view', $merchantPayouts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantPayouts', 'action' => 'edit', $merchantPayouts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantPayouts', 'action' => 'delete', $merchantPayouts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantPayouts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
