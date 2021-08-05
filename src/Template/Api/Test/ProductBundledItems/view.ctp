<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBundledItem $productBundledItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Bundled Item'), ['action' => 'edit', $productBundledItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Bundled Item'), ['action' => 'delete', $productBundledItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBundledItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Bundled Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Bundled Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productBundledItems view large-9 medium-8 columns content">
    <h3><?= h($productBundledItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productBundledItem->has('product') ? $this->Html->link($productBundledItem->product->title, ['controller' => 'Products', 'action' => 'view', $productBundledItem->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productBundledItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bundled Parent') ?></th>
            <td><?= $this->Number->format($productBundledItem->bundled_parent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($productBundledItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($productBundledItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Price') ?></th>
            <td><?= $this->Number->format($productBundledItem->total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productBundledItem->created) ?></td>
        </tr>
    </table>
</div>
