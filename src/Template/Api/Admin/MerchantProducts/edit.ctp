<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MerchantProduct $merchantProduct
 */
?>

<div class="merchantProducts form large-9 medium-8 columns content">
    <?= $this->Form->create($merchantProduct) ?>
    <fieldset>
        <legend><?= __('Edit Merchant Product') ?></legend>
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
