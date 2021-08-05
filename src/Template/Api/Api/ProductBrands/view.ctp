<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBrand $productBrand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Brand'), ['action' => 'edit', $productBrand->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Brand'), ['action' => 'delete', $productBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBrand->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Brands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Brand'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productBrands view large-9 medium-8 columns content">
    <h3><?= h($productBrand->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productBrand->has('product') ? $this->Html->link($productBrand->product->title, ['controller' => 'Products', 'action' => 'view', $productBrand->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand') ?></th>
            <td><?= $productBrand->has('brand') ? $this->Html->link($productBrand->brand->name, ['controller' => 'Brands', 'action' => 'view', $productBrand->brand->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productBrand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productBrand->created) ?></td>
        </tr>
    </table>
</div>
