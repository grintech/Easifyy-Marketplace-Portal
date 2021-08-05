<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductType $productType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product Type'), ['action' => 'edit', $productType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Type'), ['action' => 'delete', $productType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="productTypes view large-9 medium-8 columns content">
    <h3><?= h($productType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($productType->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($productType->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($productType->created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Merchant Products') ?></h4>
        <?php if (!empty($productType->merchant_products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __(' Price') ?></th>
                <th scope="col"><?= __(' Sale Price') ?></th>
                <th scope="col"><?= __(' Weight') ?></th>
                <th scope="col"><?= __(' Unit') ?></th>
                <th scope="col"><?= __(' Stock') ?></th>
                <th scope="col"><?= __(' Bar Code') ?></th>
                <th scope="col"><?= __(' Item Code') ?></th>
                <th scope="col"><?= __(' Sku') ?></th>
                <th scope="col"><?= __(' Cgst') ?></th>
                <th scope="col"><?= __(' Igst') ?></th>
                <th scope="col"><?= __(' Sgst') ?></th>
                <th scope="col"><?= __(' Tax Inclusive') ?></th>
                <th scope="col"><?= __(' Is Taxable') ?></th>
                <th scope="col"><?= __('Published On') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productType->merchant_products as $merchantProducts): ?>
            <tr>
                <td><?= h($merchantProducts->id) ?></td>
                <td><?= h($merchantProducts->merchant_id) ?></td>
                <td><?= h($merchantProducts->product_id) ?></td>
                <td><?= h($merchantProducts->product_type_id) ?></td>
                <td><?= h($merchantProducts->parent_id) ?></td>
                <td><?= h($merchantProducts->title) ?></td>
                <td><?= h($merchantProducts->slug) ?></td>
                <td><?= h($merchantProducts->description) ?></td>
                <td><?= h($merchantProducts->_price) ?></td>
                <td><?= h($merchantProducts->_sale_price) ?></td>
                <td><?= h($merchantProducts->_weight) ?></td>
                <td><?= h($merchantProducts->_unit) ?></td>
                <td><?= h($merchantProducts->_stock) ?></td>
                <td><?= h($merchantProducts->_bar_code) ?></td>
                <td><?= h($merchantProducts->_item_code) ?></td>
                <td><?= h($merchantProducts->_sku) ?></td>
                <td><?= h($merchantProducts->_cgst) ?></td>
                <td><?= h($merchantProducts->_igst) ?></td>
                <td><?= h($merchantProducts->_sgst) ?></td>
                <td><?= h($merchantProducts->_tax_inclusive) ?></td>
                <td><?= h($merchantProducts->_is_taxable) ?></td>
                <td><?= h($merchantProducts->published_on) ?></td>
                <td><?= h($merchantProducts->status) ?></td>
                <td><?= h($merchantProducts->created) ?></td>
                <td><?= h($merchantProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProducts', 'action' => 'edit', $merchantProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProducts', 'action' => 'delete', $merchantProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($productType->products)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Type Id') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Slug') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __(' Price') ?></th>
                <th scope="col"><?= __(' Sale Price') ?></th>
                <th scope="col"><?= __(' Weight') ?></th>
                <th scope="col"><?= __(' Unit') ?></th>
                <th scope="col"><?= __(' Stock') ?></th>
                <th scope="col"><?= __(' Bar Code') ?></th>
                <th scope="col"><?= __(' Item Code') ?></th>
                <th scope="col"><?= __(' Sku') ?></th>
                <th scope="col"><?= __(' Cgst') ?></th>
                <th scope="col"><?= __(' Igst') ?></th>
                <th scope="col"><?= __(' Sgst') ?></th>
                <th scope="col"><?= __(' Tax Inclusive') ?></th>
                <th scope="col"><?= __(' Is Taxable') ?></th>
                <th scope="col"><?= __('Author') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Published On') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($productType->products as $products): ?>
            <tr>
                <td><?= h($products->id) ?></td>
                <td><?= h($products->product_type_id) ?></td>
                <td><?= h($products->parent_id) ?></td>
                <td><?= h($products->title) ?></td>
                <td><?= h($products->slug) ?></td>
                <td><?= h($products->description) ?></td>
                <td><?= h($products->_price) ?></td>
                <td><?= h($products->_sale_price) ?></td>
                <td><?= h($products->_weight) ?></td>
                <td><?= h($products->_unit) ?></td>
                <td><?= h($products->_stock) ?></td>
                <td><?= h($products->_bar_code) ?></td>
                <td><?= h($products->_item_code) ?></td>
                <td><?= h($products->_sku) ?></td>
                <td><?= h($products->_cgst) ?></td>
                <td><?= h($products->_igst) ?></td>
                <td><?= h($products->_sgst) ?></td>
                <td><?= h($products->_tax_inclusive) ?></td>
                <td><?= h($products->_is_taxable) ?></td>
                <td><?= h($products->author) ?></td>
                <td><?= h($products->status) ?></td>
                <td><?= h($products->published_on) ?></td>
                <td><?= h($products->created) ?></td>
                <td><?= h($products->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
