<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductGallery $productGallery
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Gallery'), ['action' => 'edit', $productGallery->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Gallery'), ['action' => 'delete', $productGallery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productGallery->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Galleries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Gallery'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productGalleries view large-9 medium-8 columns content">
    <h3><?= h($productGallery->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $productGallery->has('product') ? $this->Html->link($productGallery->product->title, ['controller' => 'Products', 'action' => 'view', $productGallery->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($productGallery->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($productGallery->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productGallery->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productGallery->created) ?></td>
        </tr>
    </table>
</div>
