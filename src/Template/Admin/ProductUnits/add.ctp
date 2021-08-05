<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductUnit $productUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Product Units'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="productUnits form large-9 medium-8 columns content">
    <?= $this->Form->create($productUnit) ?>
    <fieldset>
        <legend><?= __('Add Product Unit') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
