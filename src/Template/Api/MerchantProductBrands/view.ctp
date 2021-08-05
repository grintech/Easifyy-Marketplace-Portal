<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBrand $merchantProductBrand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product Brand'), ['action' => 'edit', $merchantProductBrand->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product Brand'), ['action' => 'delete', $merchantProductBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBrand->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Brands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Brand'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantProductBrands view large-9 medium-8 columns content">
    <h3><?= h($merchantProductBrand->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $merchantProductBrand->has('merchant_product') ? $this->Html->link($merchantProductBrand->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductBrand->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand') ?></th>
            <td><?= $merchantProductBrand->has('brand') ? $this->Html->link($merchantProductBrand->brand->name, ['controller' => 'Brands', 'action' => 'view', $merchantProductBrand->brand->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantProductBrand->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProductBrand->created) ?></td>
        </tr>
    </table>
</div>
