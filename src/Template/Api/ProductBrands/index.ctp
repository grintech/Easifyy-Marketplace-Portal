<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductBrand[]|\Cake\Collection\CollectionInterface $productBrands
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product Brand'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="productBrands index large-9 medium-8 columns content">
    <h3><?= __('Product Brands') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('brand_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productBrands as $productBrand): ?>
            <tr>
                <td><?= $this->Number->format($productBrand->id) ?></td>
                <td><?= $productBrand->has('product') ? $this->Html->link($productBrand->product->title, ['controller' => 'Products', 'action' => 'view', $productBrand->product->id]) : '' ?></td>
                <td><?= $productBrand->has('brand') ? $this->Html->link($productBrand->brand->name, ['controller' => 'Brands', 'action' => 'view', $productBrand->brand->id]) : '' ?></td>
                <td><?= h($productBrand->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $productBrand->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productBrand->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productBrand->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBrand->id)]) ?>
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
