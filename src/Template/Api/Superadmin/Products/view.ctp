<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Product Type') ?></th>
            <td><?= $product->has('product_type') ? $this->Html->link($product->product_type->name, ['controller' => 'ProductTypes', 'action' => 'view', $product->product_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Product') ?></th>
            <td><?= $product->has('parent_product') ? $this->Html->link($product->parent_product->title, ['controller' => 'Products', 'action' => 'view', $product->parent_product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($product->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($product->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Unit') ?></th>
            <td><?= h($product->_unit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Bar Code') ?></th>
            <td><?= h($product->_bar_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Item Code') ?></th>
            <td><?= h($product->_item_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sku') ?></th>
            <td><?= h($product->_sku) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($product->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Price') ?></th>
            <td><?= $this->Number->format($product->_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sale Price') ?></th>
            <td><?= $this->Number->format($product->_sale_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Weight') ?></th>
            <td><?= $this->Number->format($product->_weight) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Stock') ?></th>
            <td><?= $this->Number->format($product->_stock) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Cgst') ?></th>
            <td><?= $this->Number->format($product->_cgst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Igst') ?></th>
            <td><?= $this->Number->format($product->_igst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Sgst') ?></th>
            <td><?= $this->Number->format($product->_sgst) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= $this->Number->format($product->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Published On') ?></th>
            <td><?= h($product->published_on) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Tax Inclusive') ?></th>
            <td><?= $product->_tax_inclusive ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __(' Is Taxable') ?></th>
            <td><?= $product->_is_taxable ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $product->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    
   
    <div class="related">
        <h4><?= __('Related Product Brands') ?></h4>
        <?php if (!empty($product->product_brands)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Brand Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_brands as $productBrands): ?>
            <tr>
                <td><?= h($productBrands->id) ?></td>
                <td><?= h($productBrands->product_id) ?></td>
                <td><?= h($productBrands->brand_id) ?></td>
                <td><?= h($productBrands->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductBrands', 'action' => 'view', $productBrands->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductBrands', 'action' => 'edit', $productBrands->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductBrands', 'action' => 'delete', $productBrands->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productBrands->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Categories') ?></h4>
        <?php if (!empty($product->product_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_categories as $productCategories): ?>
            <tr>
                <td><?= h($productCategories->id) ?></td>
                <td><?= h($productCategories->product_id) ?></td>
                <td><?= h($productCategories->category_id) ?></td>
                <td><?= h($productCategories->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductCategories', 'action' => 'view', $productCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductCategories', 'action' => 'edit', $productCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductCategories', 'action' => 'delete', $productCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Product Galleries') ?></h4>
        <?php if (!empty($product->product_galleries)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Product Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Url') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($product->product_galleries as $productGalleries): ?>
            <tr>
                <td><?= h($productGalleries->id) ?></td>
                <td><?= h($productGalleries->product_id) ?></td>
                <td><?= h($productGalleries->type) ?></td>
                <td><?= h($productGalleries->url) ?></td>
                <td><?= h($productGalleries->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ProductGalleries', 'action' => 'view', $productGalleries->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ProductGalleries', 'action' => 'edit', $productGalleries->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ProductGalleries', 'action' => 'delete', $productGalleries->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productGalleries->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($product->child_products)): ?>
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
            <?php foreach ($product->child_products as $childProducts): ?>
            <tr>
                <td><?= h($childProducts->id) ?></td>
                <td><?= h($childProducts->product_type_id) ?></td>
                <td><?= h($childProducts->parent_id) ?></td>
                <td><?= h($childProducts->title) ?></td>
                <td><?= h($childProducts->slug) ?></td>
                <td><?= h($childProducts->description) ?></td>
                <td><?= h($childProducts->_price) ?></td>
                <td><?= h($childProducts->_sale_price) ?></td>
                <td><?= h($childProducts->_weight) ?></td>
                <td><?= h($childProducts->_unit) ?></td>
                <td><?= h($childProducts->_stock) ?></td>
                <td><?= h($childProducts->_bar_code) ?></td>
                <td><?= h($childProducts->_item_code) ?></td>
                <td><?= h($childProducts->_sku) ?></td>
                <td><?= h($childProducts->_cgst) ?></td>
                <td><?= h($childProducts->_igst) ?></td>
                <td><?= h($childProducts->_sgst) ?></td>
                <td><?= h($childProducts->_tax_inclusive) ?></td>
                <td><?= h($childProducts->_is_taxable) ?></td>
                <td><?= h($childProducts->author) ?></td>
                <td><?= h($childProducts->status) ?></td>
                <td><?= h($childProducts->published_on) ?></td>
                <td><?= h($childProducts->created) ?></td>
                <td><?= h($childProducts->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $childProducts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $childProducts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Products', 'action' => 'delete', $childProducts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childProducts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
