<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductStatus $productStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Product Statuses'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productStatuses form large-9 medium-8 columns content">
    <?= $this->Form->create($productStatus) ?>
    <fieldset>
        <legend><?= __('Edit Product Status') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
