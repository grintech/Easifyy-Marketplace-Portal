<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct $merchantProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Merchant Product'), ['action' => 'edit', $merchantProduct->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Merchant Product'), ['action' => 'delete', $merchantProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProduct->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Brands'), ['controller' => 'MerchantProductBrands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Brand'), ['controller' => 'MerchantProductBrands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Bundled Items'), ['controller' => 'MerchantProductBundledItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Bundled Item'), ['controller' => 'MerchantProductBundledItems', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Categories'), ['controller' => 'MerchantProductCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Category'), ['controller' => 'MerchantProductCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Merchant Product Galleries'), ['controller' => 'MerchantProductGalleries', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Merchant Product Gallery'), ['controller' => 'MerchantProductGalleries', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Purchase Items'), ['controller' => 'PurchaseItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchase Item'), ['controller' => 'PurchaseItems', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="merchantProducts view large-9 medium-8 columns content">
    <h3><?= h($merchantProduct->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Merchant') ?></th>
            <td><?= $merchantProduct->has('merchant') ? $this->Html->link($merchantProduct->merchant->id, ['controller' => 'Merchants', 'action' => 'view', $merchantProduct->merchant->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $merchantProduct->has('product') ? $this->Html->link($merchantProduct->product->title, ['controller' => 'Products', 'action' => 'view', $merchantProduct->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $merchantProduct->has('product_type') ? $this->Html->link($merchantProduct->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $merchantProduct->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Merchant Product') ?></th>
            <td><?= $merchantProduct->has('parent_merchant_product') ? $this->Html->link($merchantProduct->parent_merchant_product->title, ['controller' => 'MerchantProducts', 'action' => 'view', $merchantProduct->parent_merchant_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($merchantProduct->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($merchantProduct->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Unit') ?></th>
            <td><?= h($merchantProduct->_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Bar Code') ?></th>
            <td><?= h($merchantProduct->_bar_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Item Code') ?></th>
            <td><?= h($merchantProduct->_item_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sku') ?></th>
            <td><?= h($merchantProduct->_sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($merchantProduct->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Price') ?></th>
            <td><?= $this->Number->format($merchantProduct->_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sale Price') ?></th>
            <td><?= $this->Number->format($merchantProduct->_sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Weight') ?></th>
            <td><?= $this->Number->format($merchantProduct->_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Stock') ?></th>
            <td><?= $this->Number->format($merchantProduct->_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Cgst') ?></th>
            <td><?= $this->Number->format($merchantProduct->_cgst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Igst') ?></th>
            <td><?= $this->Number->format($merchantProduct->_igst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sgst') ?></th>
            <td><?= $this->Number->format($merchantProduct->_sgst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published On') ?></th>
            <td><?= h($merchantProduct->published_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($merchantProduct->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($merchantProduct->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Tax Inclusive') ?></th>
            <td><?= $merchantProduct->_tax_inclusive ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Is Taxable') ?></th>
            <td><?= $merchantProduct->_is_taxable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $merchantProduct->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($merchantProduct->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Product Brands') ?></h4>
        <?php if (!empty($merchantProduct->merchant_product_brands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Brand Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantProduct->merchant_product_brands as $merchantProductBrands): ?>
            <tr>
                <td><?= h($merchantProductBrands->id) ?></td>
                <td><?= h($merchantProductBrands->merchant_product_id) ?></td>
                <td><?= h($merchantProductBrands->brand_id) ?></td>
                <td><?= h($merchantProductBrands->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProductBrands', 'action' => 'view', $merchantProductBrands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProductBrands', 'action' => 'edit', $merchantProductBrands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProductBrands', 'action' => 'delete', $merchantProductBrands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBrands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Product Bundled Items') ?></h4>
        <?php if (!empty($merchantProduct->merchant_product_bundled_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bundled Parent') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Total Price') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantProduct->merchant_product_bundled_items as $merchantProductBundledItems): ?>
            <tr>
                <td><?= h($merchantProductBundledItems->id) ?></td>
                <td><?= h($merchantProductBundledItems->bundled_parent) ?></td>
                <td><?= h($merchantProductBundledItems->merchant_product_id) ?></td>
                <td><?= h($merchantProductBundledItems->price) ?></td>
                <td><?= h($merchantProductBundledItems->quantity) ?></td>
                <td><?= h($merchantProductBundledItems->total_price) ?></td>
                <td><?= h($merchantProductBundledItems->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProductBundledItems', 'action' => 'view', $merchantProductBundledItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProductBundledItems', 'action' => 'edit', $merchantProductBundledItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProductBundledItems', 'action' => 'delete', $merchantProductBundledItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductBundledItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Product Categories') ?></h4>
        <?php if (!empty($merchantProduct->merchant_product_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantProduct->merchant_product_categories as $merchantProductCategories): ?>
            <tr>
                <td><?= h($merchantProductCategories->id) ?></td>
                <td><?= h($merchantProductCategories->merchant_product_id) ?></td>
                <td><?= h($merchantProductCategories->category_id) ?></td>
                <td><?= h($merchantProductCategories->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProductCategories', 'action' => 'view', $merchantProductCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProductCategories', 'action' => 'edit', $merchantProductCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProductCategories', 'action' => 'delete', $merchantProductCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Product Galleries') ?></h4>
        <?php if (!empty($merchantProduct->merchant_product_galleries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantProduct->merchant_product_galleries as $merchantProductGalleries): ?>
            <tr>
                <td><?= h($merchantProductGalleries->id) ?></td>
                <td><?= h($merchantProductGalleries->merchant_product_id) ?></td>
                <td><?= h($merchantProductGalleries->type) ?></td>
                <td><?= h($merchantProductGalleries->url) ?></td>
                <td><?= h($merchantProductGalleries->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProductGalleries', 'action' => 'view', $merchantProductGalleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProductGalleries', 'action' => 'edit', $merchantProductGalleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProductGalleries', 'action' => 'delete', $merchantProductGalleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $merchantProductGalleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Merchant Products') ?></h4>
        <?php if (!empty($merchantProduct->child_merchant_products)): ?>
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
            <?php foreach ($merchantProduct->child_merchant_products as $childMerchantProducts): ?>
            <tr>
                <td><?= h($childMerchantProducts->id) ?></td>
                <td><?= h($childMerchantProducts->merchant_id) ?></td>
                <td><?= h($childMerchantProducts->product_id) ?></td>
                <td><?= h($childMerchantProducts->product_type_id) ?></td>
                <td><?= h($childMerchantProducts->parent_id) ?></td>
                <td><?= h($childMerchantProducts->title) ?></td>
                <td><?= h($childMerchantProducts->slug) ?></td>
                <td><?= h($childMerchantProducts->description) ?></td>
                <td><?= h($childMerchantProducts->_price) ?></td>
                <td><?= h($childMerchantProducts->_sale_price) ?></td>
                <td><?= h($childMerchantProducts->_weight) ?></td>
                <td><?= h($childMerchantProducts->_unit) ?></td>
                <td><?= h($childMerchantProducts->_stock) ?></td>
                <td><?= h($childMerchantProducts->_bar_code) ?></td>
                <td><?= h($childMerchantProducts->_item_code) ?></td>
                <td><?= h($childMerchantProducts->_sku) ?></td>
                <td><?= h($childMerchantProducts->_cgst) ?></td>
                <td><?= h($childMerchantProducts->_igst) ?></td>
                <td><?= h($childMerchantProducts->_sgst) ?></td>
                <td><?= h($childMerchantProducts->_tax_inclusive) ?></td>
                <td><?= h($childMerchantProducts->_is_taxable) ?></td>
                <td><?= h($childMerchantProducts->published_on) ?></td>
                <td><?= h($childMerchantProducts->status) ?></td>
                <td><?= h($childMerchantProducts->created) ?></td>
                <td><?= h($childMerchantProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MerchantProducts', 'action' => 'view', $childMerchantProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'MerchantProducts', 'action' => 'edit', $childMerchantProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MerchantProducts', 'action' => 'delete', $childMerchantProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childMerchantProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Purchase Items') ?></h4>
        <?php if (!empty($merchantProduct->purchase_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Purchase Id') ?></th>
                <th scope="col"><?= __('Merchant Product Id') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Purchase Price') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Sale Price') ?></th>
                <th scope="col"><?= __('Expiry') ?></th>
                <th scope="col"><?= __('Margin') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($merchantProduct->purchase_items as $purchaseItems): ?>
            <tr>
                <td><?= h($purchaseItems->id) ?></td>
                <td><?= h($purchaseItems->purchase_id) ?></td>
                <td><?= h($purchaseItems->merchant_product_id) ?></td>
                <td><?= h($purchaseItems->quantity) ?></td>
                <td><?= h($purchaseItems->purchase_price) ?></td>
                <td><?= h($purchaseItems->price) ?></td>
                <td><?= h($purchaseItems->sale_price) ?></td>
                <td><?= h($purchaseItems->expiry) ?></td>
                <td><?= h($purchaseItems->margin) ?></td>
                <td><?= h($purchaseItems->status) ?></td>
                <td><?= h($purchaseItems->created) ?></td>
                <td><?= h($purchaseItems->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PurchaseItems', 'action' => 'view', $purchaseItems->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PurchaseItems', 'action' => 'edit', $purchaseItems->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchaseItems', 'action' => 'delete', $purchaseItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseItems->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
