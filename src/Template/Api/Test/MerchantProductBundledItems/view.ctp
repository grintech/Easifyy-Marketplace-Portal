<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProductBundledItem $merchantProductBundledItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product Bundled Item'), ['action' => 'edit', $merchantProductBundledItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product Bundled Item'), ['action' => 'delete', $merchantProductBundledItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBundledItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Bundled Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Bundled Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantProductBundledItems view large-9 medium-8 columns content">
    <h3><?= h($merchantProductBundledItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $merchantProductBundledItem->has('merchant_product') ? $this->Html->link($merchantProductBundledItem->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProductBundledItem->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bundled Parent') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->bundled_parent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mrp') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->mrp) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Total Price') ?></th>
            <td><?= $this->Number->format($merchantProductBundledItem->total_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProductBundledItem->created) ?></td>
        </tr>
    </table>
</div>
