<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CategoriesBp $categoriesBp
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoriesBp->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoriesBp->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categories Bp'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Categories Bp'), ['controller' => 'CategoriesBp', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoriesBp form large-9 medium-8 columns content">
    <?= $this->Form->create($categoriesBp) ?>
    <fieldset>
        <legend><?= __('Edit Categories Bp') ?></legend>
        <?php
            echo $this->Form->control('parent_id', ['options' => $parentCategoriesBp, 'empty' => true]);
            echo $this->Form->control('name');
            echo $this->Form->control('slug');
            echo $this->Form->control('description');
            echo $this->Form->control('image');
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
