<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem $purchaseItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchase Item'), ['action' => 'edit', $purchaseItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchase Item'), ['action' => 'delete', $purchaseItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchaseItems view large-9 medium-8 columns content">
    <h3><?= h($purchaseItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Purchase') ?></th>
            <td><?= $purchaseItem->has('purchase') ? $this->Html->link($purchaseItem->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseItem->purchase->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $purchaseItem->has('merchant_product') ? $this->Html->link($purchaseItem->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $purchaseItem->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchaseItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($purchaseItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Purchase Price') ?></th>
            <td><?= $this->Number->format($purchaseItem->purchase_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($purchaseItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sale Price') ?></th>
            <td><?= $this->Number->format($purchaseItem->sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Margin') ?></th>
            <td><?= $this->Number->format($purchaseItem->margin) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($purchaseItem->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Expiry') ?></th>
            <td><?= h($purchaseItem->expiry) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($purchaseItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($purchaseItem->updated) ?></td>
        </tr>
    </table>
</div>
