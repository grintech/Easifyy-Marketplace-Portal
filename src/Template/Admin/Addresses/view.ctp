<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bank Account'), ['action' => 'edit', $bankAccount->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bank Account'), ['action' => 'delete', $bankAccount->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bank Account'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bankAccounts view large-9 medium-8 columns content">
    <h3><?= h($bankAccount->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $bankAccount->has('merchant') ? $this->Html->link($bankAccount->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $bankAccount->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Number') ?></th>
            <td><?= h($bankAccount->account_number) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Account Type') ?></th>
            <td><?= h($bankAccount->account_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Name') ?></th>
            <td><?= h($bankAccount->bank_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bank Branch') ?></th>
            <td><?= h($bankAccount->bank_branch) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ifsc Code') ?></th>
            <td><?= h($bankAccount->ifsc_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Micr Code') ?></th>
            <td><?= h($bankAccount->micr_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bankAccount->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bankAccount->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bankAccount->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Merchant Transactions') ?></h4>
        <?php if (!empty($bankAccount->merchant_transactions)): ?>
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
            <?php foreach ($bankAccount->merchant_transactions as $merchantTransactions): ?>
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
