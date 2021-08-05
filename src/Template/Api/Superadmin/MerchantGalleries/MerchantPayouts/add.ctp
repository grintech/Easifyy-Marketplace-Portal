<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantPayout $merchantPayout
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchant Payouts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Transactions'), ['controller' => 'MerchantTransactions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Transaction'), ['controller' => 'MerchantTransactions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantPayouts form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantPayout) ?>
    <fieldset>
        <legend><?= __('Add Merchant Payout') ?></legend>
        <?php
            echo $this->Form->control('merchant_transaction_id', ['options' => $merchantTransactions]);
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('order_id', ['options' => $orders]);
            echo $this->Form->control('is_admin_copoun');
            echo $this->Form->control('coupon_discount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
