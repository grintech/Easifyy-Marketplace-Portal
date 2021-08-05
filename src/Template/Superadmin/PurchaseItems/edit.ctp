<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem $purchaseItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchaseItem->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseItems form large-9 medium-8 columns content">
    <?= $this->Form->create($purchaseItem) ?>
    <fieldset>
        <legend><?= __('Edit Purchase Item') ?></legend>
        <?php
            echo $this->Form->control('purchase_id', ['options' => $purchases]);
            echo $this->Form->control('merchant_product_id', ['options' => $merchantProducts]);
            echo $this->Form->control('quantity');
            echo $this->Form->control('purchase_price');
            echo $this->Form->control('price');
            echo $this->Form->control('sale_price');
            echo $this->Form->control('expiry', ['empty' => true]);
            echo $this->Form->control('margin');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
