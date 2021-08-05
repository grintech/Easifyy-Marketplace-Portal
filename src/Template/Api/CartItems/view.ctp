<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem $cartItem
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cart Item'), ['action' => 'edit', $cartItem->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart Item'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cart Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cartItems view large-9 medium-8 columns content">
    <h3><?= h($cartItem->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $cartItem->has('merchant') ? $this->Html->link($cartItem->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $cartItem->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $cartItem->has('user') ? $this->Html->link($cartItem->user->id, ['controller' => 'Users', 'action' => 'view', $cartItem->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Merchant Product') ?></th>
            <td><?= $cartItem->has('merchant_product') ? $this->Html->link($cartItem->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $cartItem->merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('SessionID') ?></th>
            <td><?= h($cartItem->sessionID) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($cartItem->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tax Details') ?></th>
            <td><?= h($cartItem->tax_details) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cartItem->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($cartItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($cartItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subtotal') ?></th>
            <td><?= $this->Number->format($cartItem->subtotal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($cartItem->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($cartItem->modified) ?></td>
        </tr>
    </table>
</div>
