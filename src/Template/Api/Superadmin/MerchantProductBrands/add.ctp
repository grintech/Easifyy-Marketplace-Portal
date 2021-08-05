<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBrand $merchantProductBrand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Brands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductBrands form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantProductBrand) ?>
    <fieldset>
        <legend><?= __('Add Merchant Product Brand') ?></legend>
        <?php
            echo $this->Form->control('merchant_product_id', ['options' => $merchantProducts]);
            echo $this->Form->control('brand_id', ['options' => $brands]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
