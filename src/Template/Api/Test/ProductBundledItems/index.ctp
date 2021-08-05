<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBundledItem[]|\Cake\Collection\CollectionInterface $productBundledItems
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Bundled Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBundledItems index large-9 medium-8 columns content">
    <h3><?= __('Product Bundled Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bundled_parent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('total_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productBundledItems as $productBundledItem): ?>
            <tr>
                <td><?= $this->Number->format($productBundledItem->id) ?></td>
                <td><?= $this->Number->format($productBundledItem->bundled_parent) ?></td>
                <td><?= $productBundledItem->has('product') ? $this->Html->link($productBundledItem->product->title, ['controller' => 'Products', 'action' => 'view', $productBundledItem->product->id]) : '' ?></td>
                <td><?= $this->Number->format($productBundledItem->price) ?></td>
                <td><?= $this->Number->format($productBundledItem->quantity) ?></td>
                <td><?= $this->Number->format($productBundledItem->total_price) ?></td>
                <td><?= h($productBundledItem->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBundledItem->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBundledItem->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productBundledItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBundledItem->id)]) ?>
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
