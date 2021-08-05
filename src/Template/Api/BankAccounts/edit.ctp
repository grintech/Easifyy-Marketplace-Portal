<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BankAccount $bankAccount
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bankAccount->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bankAccount->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bank Accounts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bankAccounts form large-9 medium-8 columns content">
    <?= $this->Form->create($bankAccount) ?>
    <fieldset>
        <legend><?= __('Edit Bank Account') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('account_number');
            echo $this->Form->control('account_type');
            echo $this->Form->control('bank_name');
            echo $this->Form->control('bank_branch');
            echo $this->Form->control('ifsc_code');
            echo $this->Form->control('micr_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
