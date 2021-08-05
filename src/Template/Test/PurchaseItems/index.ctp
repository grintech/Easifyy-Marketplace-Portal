<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchaseItem[]|\Cake\Collection\CollectionInterface $purchaseItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchaseItems index large-9 medium-8 columns content">
    <h3><?= __('Purchase Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('purchase_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('expiry') ?></th>
                <th scope="col"><?= $this->Paginator->sort('margin') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchaseItems as $purchaseItem): ?>
            <tr>
                <td><?= $this->Number->format($purchaseItem->id) ?></td>
                <td><?= $purchaseItem->has('purchase') ? $this->Html->link($purchaseItem->purchase->id, ['controller' => 'Purchases', 'action' => 'view', $purchaseItem->purchase->id]) : '' ?></td>
                <td><?= $purchaseItem->has('merchant_product') ? $this->Html->link($purchaseItem->merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $purchaseItem->merchant_product->id]) : '' ?></td>
                <td><?= $this->Number->format($purchaseItem->quantity) ?></td>
                <td><?= $this->Number->format($purchaseItem->purchase_price) ?></td>
                <td><?= $this->Number->format($purchaseItem->price) ?></td>
                <td><?= $this->Number->format($purchaseItem->sale_price) ?></td>
                <td><?= h($purchaseItem->expiry) ?></td>
                <td><?= $this->Number->format($purchaseItem->margin) ?></td>
                <td><?= $this->Number->format($purchaseItem->status) ?></td>
                <td><?= h($purchaseItem->created) ?></td>
                <td><?= h($purchaseItem->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItem->id)]) ?>
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
