<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $products
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cart Items'), ['controller' => 'CartItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cart Item'), ['controller' => 'CartItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Order Items'), ['controller' => 'OrderItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Brands'), ['controller' => 'ProductBrands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Brand'), ['controller' => 'ProductBrands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Categories'), ['controller' => 'ProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Category'), ['controller' => 'ProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Galleries'), ['controller' => 'ProductGalleries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Gallery'), ['controller' => 'ProductGalleries', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="products index large-9 medium-8 columns content">
    <h3><?= __('Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_sale_price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_unit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_bar_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_item_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_sku') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_cgst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_igst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_sgst') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_tax_inclusive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('_is_taxable') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('published_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
                <td><?= $product->has('parent_product') ? $this->Html->link($product->parent_product->title, ['controller' => 'Products', 'action' => 'view', $product->parent_product->id]) : '' ?></td>
                <td><?= h($product->title) ?></td>
                <td><?= h($product->slug) ?></td>
                <td><?= $this->Number->format($product->_price) ?></td>
                <td><?= $this->Number->format($product->_sale_price) ?></td>
                <td><?= $this->Number->format($product->_weight) ?></td>
                <td><?= h($product->_unit) ?></td>
                <td><?= $this->Number->format($product->_stock) ?></td>
                <td><?= h($product->_bar_code) ?></td>
                <td><?= h($product->_item_code) ?></td>
                <td><?= h($product->_sku) ?></td>
                <td><?= $this->Number->format($product->_cgst) ?></td>
                <td><?= $this->Number->format($product->_igst) ?></td>
                <td><?= $this->Number->format($product->_sgst) ?></td>
                <td><?= h($product->_tax_inclusive) ?></td>
                <td><?= h($product->_is_taxable) ?></td>
                <td><?= $this->Number->format($product->author) ?></td>
                <td><?= h($product->status) ?></td>
                <td><?= h($product->published_on) ?></td>
                <td><?= h($product->created) ?></td>
                <td><?= h($product->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete # {0}?', $product->id)]) ?>
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
