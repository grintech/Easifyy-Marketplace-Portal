<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductGallery $productGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productGallery->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productGallery->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Galleries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productGalleries form large-9 medium-8 columns content">
    <?= $this->Form->create($productGallery) ?>
    <fieldset>
        <legend><?= __('Edit Product Gallery') ?></legend>
        <?php
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('type');
            echo $this->Form->control('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
