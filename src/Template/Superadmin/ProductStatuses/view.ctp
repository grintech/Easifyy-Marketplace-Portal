<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductStatus $productStatus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Status'), ['action' => 'edit', $productStatus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Status'), ['action' => 'delete', $productStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productStatus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Statuses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Status'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productStatuses view large-9 medium-8 columns content">
    <h3><?= h($productStatus->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productStatus->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productStatus->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productStatus->created) ?></td>
        </tr>
    </table>
</div>
