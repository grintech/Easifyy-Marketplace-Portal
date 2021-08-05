<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBundledItem $merchantProductBundledItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Bundled Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductBundledItems form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantProductBundledItem) ?>
    <fieldset>
        <legend><?= __('Add Merchant Product Bundled Item') ?></legend>
        <?php
            echo $this->Form->control('bundled_parent');
            echo $this->Form->control('merchant_product_id', ['options' => $merchantProducts]);
            echo $this->Form->control('price');
            echo $this->Form->control('quantity');
            echo $this->Form->control('total_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
