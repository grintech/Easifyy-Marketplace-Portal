<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CartItem[]|\Cake\Collection\CollectionInterface $cartItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cart Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cartItems index large-9 medium-8 columns content">
    <h3><?= __('Cart Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sessionID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tax_details') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subtotal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $cartItem): ?>
            <tr>
                <td><?= $this->Number->format($cartItem->id) ?></td>
                <td><?= $cartItem->has('merchant') ? $this->Html->link($cartItem->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $cartItem->merchant->id]) : '' ?></td>
                <td><?= $cartItem->has('user') ? $this->Html->link($cartItem->user->id, ['controller' => 'Users', 'action' => 'view', $cartItem->user->id]) : '' ?></td>
                <td><?= $cartItem->has('product') ? $this->Html->link($cartItem->product->title, ['controller' => 'Products', 'action' => 'view', $cartItem->product->id]) : '' ?></td>
                <td><?= h($cartItem->sessionID) ?></td>
                <td><?= h($cartItem->title) ?></td>
                <td><?= $this->Number->format($cartItem->price) ?></td>
                <td><?= $this->Number->format($cartItem->quantity) ?></td>
                <td><?= h($cartItem->tax_details) ?></td>
                <td><?= $this->Number->format($cartItem->subtotal) ?></td>
                <td><?= h($cartItem->created) ?></td>
                <td><?= h($cartItem->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cartItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cartItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cartItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cartItem->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
