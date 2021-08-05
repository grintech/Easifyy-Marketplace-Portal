<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suppliers'), ['controller' => 'Suppliers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Supplier'), ['controller' => 'Suppliers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['controller' => 'PurchaseItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['controller' => 'PurchaseItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchases form large-9 medium-8 columns content">
    <?= $this->Form->create($purchase) ?>
    <fieldset>
        <legend><?= __('Add Purchase') ?></legend>
        <?php
            echo $this->Form->control('supplier_id', ['options' => $suppliers]);
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('amount');
            echo $this->Form->control('mode');
            echo $this->Form->control('bank_details');
            echo $this->Form->control('invoice_number');
            echo $this->Form->control('paid');
            echo $this->Form->control('unpaid');
            echo $this->Form->control('invoice_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
