<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderMode $orderMode
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $orderMode->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $orderMode->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Order Modes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderModes form large-9 medium-8 columns content">
    <?= $this->Form->create($orderMode) ?>
    <fieldset>
        <legend><?= __('Edit Order Mode') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
