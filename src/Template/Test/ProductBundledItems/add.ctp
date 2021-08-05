<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBundledItem $productBundledItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Bundled Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBundledItems form large-9 medium-8 columns content">
    <?= $this->Form->create($productBundledItem) ?>
    <fieldset>
        <legend><?= __('Add Product Bundled Item') ?></legend>
        <?php
            echo $this->Form->control('bundled_parent');
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('price');
            echo $this->Form->control('quantity');
            echo $this->Form->control('total_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
