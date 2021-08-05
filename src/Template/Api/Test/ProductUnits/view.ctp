<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductUnit $productUnit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Unit'), ['action' => 'edit', $productUnit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Unit'), ['action' => 'delete', $productUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productUnit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Unit'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productUnits view large-9 medium-8 columns content">
    <h3><?= h($productUnit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productUnit->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productUnit->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productUnit->created) ?></td>
        </tr>
    </table>
</div>
