<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct[]|\Cake\Collection\CollectionInterface $merchantProducts
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Brands'), ['controller' => 'MerchantProductBrands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Brand'), ['controller' => 'MerchantProductBrands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Bundled Items'), ['controller' => 'MerchantProductBundledItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Bundled Item'), ['controller' => 'MerchantProductBundledItems', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Categories'), ['controller' => 'MerchantProductCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Category'), ['controller' => 'MerchantProductCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Merchant Product Galleries'), ['controller' => 'MerchantProductGalleries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant Product Gallery'), ['controller' => 'MerchantProductGalleries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['controller' => 'PurchaseItems', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['controller' => 'PurchaseItems', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="merchantProducts index large-9 medium-8 columns content">
    <h3><?= __('Merchant Products') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('merchant_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('product_id') ?></th>
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
                <th scope="col"><?= $this->Paginator->sort('published_on') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchantProducts as $merchantProduct): ?>
            <tr>
                <td><?= $this->Number->format($merchantProduct->id) ?></td>
                <td><?= $merchantProduct->has('merchant') ? $this->Html->link($merchantProduct->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantProduct->merchant->id]) : '' ?></td>
                <td><?= $merchantProduct->has('product') ? $this->Html->link($merchantProduct->product->title, ['controller' => 'Products', 'action' => 'view', $merchantProduct->product->id]) : '' ?></td>
                <td><?= $merchantProduct->has('product_type') ? $this->Html->link($merchantProduct->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $merchantProduct->product_type->id]) : '' ?></td>
                <td><?= $merchantProduct->has('parent_merchant_product') ? $this->Html->link($merchantProduct->parent_merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProduct->parent_merchant_product->id]) : '' ?></td>
                <td><?= h($merchantProduct->title) ?></td>
                <td><?= h($merchantProduct->slug) ?></td>
                <td><?= $this->Number->format($merchantProduct->_price) ?></td>
                <td><?= $this->Number->format($merchantProduct->_sale_price) ?></td>
                <td><?= $this->Number->format($merchantProduct->_weight) ?></td>
                <td><?= h($merchantProduct->_unit) ?></td>
                <td><?= $this->Number->format($merchantProduct->_stock) ?></td>
                <td><?= h($merchantProduct->_bar_code) ?></td>
                <td><?= h($merchantProduct->_item_code) ?></td>
                <td><?= h($merchantProduct->_sku) ?></td>
                <td><?= $this->Number->format($merchantProduct->_cgst) ?></td>
                <td><?= $this->Number->format($merchantProduct->_igst) ?></td>
                <td><?= $this->Number->format($merchantProduct->_sgst) ?></td>
                <td><?= h($merchantProduct->_tax_inclusive) ?></td>
                <td><?= h($merchantProduct->_is_taxable) ?></td>
                <td><?= h($merchantProduct->published_on) ?></td>
                <td><?= h($merchantProduct->status) ?></td>
                <td><?= h($merchantProduct->created) ?></td>
                <td><?= h($merchantProduct->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $merchantProduct->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $merchantProduct->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $merchantProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProduct->id)]) ?>
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
