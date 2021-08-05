<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantTransaction $merchantTransaction
 */
?>

<div class="merchantTransactions form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantTransaction) ?>
    <fieldset>
        <legend><?= __('Add Merchant Transaction') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('bank_account_id', ['options' => $bankAccounts]);
            echo $this->Form->control('total_orders_amount');
            echo $this->Form->control('admin_coupon_discount');
            echo $this->Form->control('merchant_coupon_discount');
            echo $this->Form->control('commission');
            echo $this->Form->control('amount_payable');
            echo $this->Form->control('notes');
            echo $this->Form->control('transaction_status_id', ['options' => $transactionStatuses, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
