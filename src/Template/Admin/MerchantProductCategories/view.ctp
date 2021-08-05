<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductCategory $merchantProductCategory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product Category'), ['action' => 'edit', $merchantProductCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product Category'), ['action' => 'delete', $merchantProductCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductCategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantProductCategories view large-9 medium-8 columns content">
    <h3><?= h($merchantProductCategory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $merchantProductCategory->has('merchant_product') ? $this->Html->link($merchantProductCategory->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductCategory->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $merchantProductCategory->has('category') ? $this->Html->link($merchantProductCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $merchantProductCategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantProductCategory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProductCategory->created) ?></td>
        </tr>
    </table>
</div>
