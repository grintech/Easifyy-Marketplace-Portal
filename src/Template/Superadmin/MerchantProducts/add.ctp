<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct $merchantProduct
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Merchant Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Merchants'), ['controller' => 'Merchants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Merchant'), ['controller' => 'Merchants', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product Types'), ['controller' => 'ProductTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product Type'), ['controller' => 'ProductTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Parent Merchant Products'), ['controller' => 'MerchantProducts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Merchant Product'), ['controller' => 'MerchantProducts', 'action' => 'add']) ?></li>
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
<div class="merchantProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantProduct) ?>
    <fieldset>
        <legend><?= __('Add Merchant Product') ?></legend>
        <?php
            echo $this->Form->control('merchant_id', ['options' => $merchants]);
            echo $this->Form->control('product_id', ['options' => $products]);
            echo $this->Form->control('product_type_id', ['options' => $productTypes]);
            echo $this->Form->control('parent_id', ['options' => $parentMerchantProducts, 'empty' => true]);
            echo $this->Form->control('title');
            echo $this->Form->control('slug');
            echo $this->Form->control('description');
            echo $this->Form->control('_price');
            echo $this->Form->control('_sale_price');
            echo $this->Form->control('_weight');
            echo $this->Form->control('_unit');
            echo $this->Form->control('_stock');
            echo $this->Form->control('_bar_code');
            echo $this->Form->control('_item_code');
            echo $this->Form->control('_sku');
            echo $this->Form->control('_cgst');
            echo $this->Form->control('_igst');
            echo $this->Form->control('_sgst');
            echo $this->Form->control('_tax_inclusive');
            echo $this->Form->control('_is_taxable');
            echo $this->Form->control('published_on', ['empty' => true]);
            echo $this->Form->control('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
