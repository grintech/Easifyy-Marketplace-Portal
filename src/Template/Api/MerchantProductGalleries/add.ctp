<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductGallery $merchantProductGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProductGalleries form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantProductGallery) ?>
    <fieldset>
        <legend><?= __('Add Merchant Product Gallery') ?></legend>
        <?php
            echo $this->Form->control('merchant_product_id', ['options' => $merchantProducts]);
            echo $this->Form->control('type');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
